<?php

namespace App\Http\Controllers\Auth;

use App\User; 
use Auth;
use Socialite;
use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use DB;
use Lang;
use Hash;
use App\Helpers\MyFuncs;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'remember_token' => Hash::make($data['email']),
            'password' => bcrypt($data['password'])
        ]);
    }

    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
 
    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
            $authUser = $this->findOrCreateUser($provider, $user);
            Auth::login($authUser, true);
        } catch (Exception $e) {
            return redirect('auth/' . $provider);
        }
 
        return redirect('/home');
    }
 
    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $facebookUser
     * @return User
     */
    private function findOrCreateUser($provider, $user)
    {   
        $data = $user->email ? $user->email : $user->id;

        $authUser = User::findUser($data)->first();

        if ($authUser) {
            return $authUser;
        }

        $facebookId = null;
        $googleId = null;

        switch ($provider) {
            case 'facebook':
                $facebookId = $user->id;
                break;
            case 'google':
                $googleId = $user->id;
                break;
            default:
                break;
        }

        return User::create([
            'name' => $user->name,
            'email' => $user->email,
            'avatar' => $user->avatar,
            'is_active' => true,
            'facebook_id' => $facebookId,
            'google_id' => $googleId
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function login(Request $request)
    {
        $user = new User;

        $data = $request->only('email', 'password');

        $user->validate($data, 'login');

        if (auth()->attempt([
            'email' => $request->input('email'), 
            'password' => $request->input('password')
        ])) {
            if (!auth()->user()->is_active) {
                $this->logout();
                return back()->with('warning', Lang::get('login.please.active'));
            }
            if (auth()->user()->is_admin) {
                return redirect('/admin/player');
            }
            return redirect()->to('home');
        }
        return back()->with('warning', Lang::get('login.login.wrong'));
    }

    /**
     * Register new user
     *
     * @param  array  $data
     * @return User
     */
    public function register(Request $request)
    {
        $input = $request->only('name', 'email', 'password', 'password_confirmation');
        $validator = $this->validator($input);

        if ($validator->passes()) {
            $user = $this->create($input)->toArray();
            $user['link'] = $this->createToken($user);
            MyFuncs::sendEmail([
                'view' => 'auth.emails.activation',
                'data' => $user,
                'email' => $user['email'],
                'subject' => Lang::get('login.mail.subject')
            ]);

            return redirect()->to('login')->with('success', Lang::get('login.please.check.mail'));
        }
        return back()->with('errors', $validator->errors());
    }

    /**
     * userActivation for user Activation Code
     *
     * @param  array  $data
     * @return User
     */
    public function userActivation($id, $token)
    {
        $user = User::findUser($id)->first();
        if ($user && $this->createToken($user) == $token) {
            if ($user->is_active) {
                return redirect()->to('login')->with('success', Lang::get('login.already.actived'));
            }
            $user->update(['is_active' => true]);
            return redirect()->to('login')->with('success', Lang::get('login.success.actived'));       
        }
        return redirect()->to('login')->with('warning', Lang::get('login.invalid.token'));
    }

    public function createToken($data)
    {
        return md5($data['email'] . $data['name'] . $data['remember_token']);
    }
}
