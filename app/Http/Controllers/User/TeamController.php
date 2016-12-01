<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Category;
use App\Country;
use App\Team;
use App\News;
use Auth;

class TeamController extends Controller
{
    public function show($id)
    {
        $categories = Category::all();
        $country = Country::all();
        $team = Team::findOrFail($id);
        $otherNews = News::getNews(config('view.count_other_news'), 'created_at', 'desc')->get();
        $readestNews = News::getNews(config('view.count_readest_news'), 'view_number')->get();
        return view('user.team.team-info')->with([
            'categories' => $categories,
            'country' => $country,
            'team' => $team,
            'ortherNews' => $otherNews,
            'readestNews' => $readestNews,
        ]);
    }
}
