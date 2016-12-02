<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\News;
use App\Comment;
use App\User;
use App\Category;
use App\Country;
use App\League;
use Auth;

class NewsController extends Controller
{
    public function show($id)
    {
        $categories = Category::all();
        $news = News::findOrFail($id);
        $countries = Country::all();
        $leagues = League::all();
        $comments = $news->comments()->orderBy('created_at', 'desc')->get();
        $ortherNews = News::getNews(config('view.other_news'))->get();
        $readestNews = News::getNews(config('view.readest_news'), 'view_number')->get();
        $news->view_number = $news->view_number + 1;
        $news->update();
        return view('user.news.news-detail')->with([
            'categories' => $categories,
            'news' => $news,
            'leaguesList' => $leagues,
            'countries' => $countries,
            'comments' => $comments,
            'ortherNews' => $ortherNews,
            'readestNews' => $readestNews,
        ]);
    }

    public function addComment(Request $request)
    {
        $comment = new Comment();
        $data = $request->only('content', 'news_id', 'user_id');
        if (Auth::check() && $comment->validate($data, 'storeRule')) {
            Comment::create($data);
            return response()->json(['result' => 'success']);
        }
        return response()->json(['result' => 'error']);
    }
}
