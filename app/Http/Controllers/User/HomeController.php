<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Category;
use App\News;
use App\Country;
use App\League;
use App\LeagueSeason;
use App\Team;
use App\Rank;
use App\Match;
use Lang;

class HomeController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        $leagues = League::lists('name', 'id')->all();
        $league_seasons = LeagueSeason::lists('year', 'id')->all();
        $teams = Team::all();
        $team = Team::teamWithRank();
        return view('user.home')->with([
            'countries' => $countries,
            'leagues' => $leagues,
            'teams' => $teams,
            'leaguesList' => League::all(),
            'league_seasons' => $league_seasons,
            'categories' => Category::newsInCategory(config('view.count_news_in_one_category')),
            'hotNews' => News::getNews(config('view.count_hot_news'))->get(),
            'titleNews' => News::getNews(config('view.count_news_is_title'), 'created_at',
                'desc', config('view.offset_of_news_is_title'))->get(),
            'readestNews' => News::getNews(config('view.count_readest_news'), 'view_number')->get(),
            'otherNews' => News::getNews(config('view.count_other_news'), 'created_at',
                'desc', config('view.offset_of_news_is_other'))->get(),
        ]);
    }

    public function showMatch($id)
    {
        $countries = Country::all();
        $categories = Category::all();
        $leagues = League::all();
        $matchs = Match::matchNotPlay($id)->get();
        $otherNews = News::getNews(config('view.count_other_news'), 'created_at', 'desc')->get();
        $readestNews = News::getNews(config('view.count_readest_news'), 'view_number')->get();
        return view('user.match.match')->with([
            'countries' => $countries,
            'leaguesList' => $leagues,
            'categories' => $categories,
            'ortherNews' => $otherNews,
            'readestNews' => $readestNews,
            'matchs' => $matchs,
        ]);
    }

    public function showCharts($id)
    {
        $countries = Country::all();
        $categories = Category::all();
        $leagues = League::all();
        $ranks = Rank::filterRank($id);
        $otherNews = News::getNews(config('view.count_other_news'), 'created_at', 'desc')->get();
        $readestNews = News::getNews(config('view.count_readest_news'), 'view_number')->get();
        return view('user.chart.chart')->with([
            'countries' => $countries,
            'leaguesList' => $leagues,
            'categories' => $categories,
            'ranks' => $ranks,
            'ortherNews' => $otherNews,
            'readestNews' => $readestNews,
        ]);
    }

    public function showMatchResult($id)
    {
        $countries = Country::all();
        $categories = Category::all();
        $leagues = League::all();
        $matchs = Match::matchResult($id)->get();
        $otherNews = News::getNews(config('view.count_other_news'), 'created_at', 'desc')->get();
        $readestNews = News::getNews(config('view.count_readest_news'), 'view_number')->get();
        return view('user.match.result-match')->with([
            'countries' => $countries,
            'leaguesList' => $leagues,
            'categories' => $categories,
            'ortherNews' => $otherNews,
            'readestNews' => $readestNews,
            'matchs' => $matchs,
        ]);
    }

    public function searchLeagueSeason(Request $request)
    {
        $data = $request->only('league_id', 'league_season_id');
        if ($data['league_id'] == '') {
            $league_seasons = LeagueSeason::all();
        } else {
            $league_seasons = LeagueSeason::searchByLeagueId($data['league_id'])->get();
        }
        return response()->json($league_seasons);
    }

    public function searchTeam(Request $request)
    {
        $data = $request->only('league_id', 'league_season_id');
        if ($data['league_season_id'] == '') {
            $teams = Team::all();
        } else {
            $ranks = Rank::searchByLeagueSeasonId($data['league_season_id'])->get();
            $teams = [];
            foreach ($ranks as $key => $value) {
                array_push($teams, $value->team);
            }
        }
        return response()->json($teams);
    }
}
