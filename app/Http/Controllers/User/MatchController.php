<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Match;
use App\Category;

class MatchController extends Controller
{
    public function matchInDay()
    {
        $match = Match::all();
        $categories = Category::all();
        return view('user.match.match_in_day')->with([
            'categories' => $categories,
            'match' => $match,
        ]);
    }
}
