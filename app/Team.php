<?php

namespace App;

use App\Country;
use App\Rank;
use App\Player;
use App\Match;
use App\TeamAchievement;
use App\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Team extends BaseModel
{
    protected $table = 'teams';

    public function rules($ruleName)
    {
        if ($ruleName == 'updateRule') {
            $nameRules = 'required|max:100|unique:teams,name,' . $this->id;
        } else {
            $nameRules = 'required|max:100|unique:teams,name';
        }
        return [
            'name' => $nameRules,
            'introduction' => 'required|min:10',
            'country_id' => 'required|exists:countries,id',
        ];
    }

    protected $fillable = [
        'name',
        'introduction',
        'country_id',
        'logo',
    ];

    public function scopeSearchByName($query, $name)
    {
        return $query->where('name', 'like', '%' . $name . '%');
    }

    public function scopeTeamWithRank($query)
    {
        return Team::with('ranks')->get()->map(function($team) {
            $team->ranks = $team->ranks->where('league_season_id', 1);
            return $team;
        });
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function ranks()
    {
        return $this->hasMany(Rank::class);
    }

    public function players()
    {
        return $this->hasMany(Player::class);
    }

    public function matchs()
    {
        return $this->hasMany(Match::class);
    }

    public function teamAchievements()
    {
        return $this->hasMany(TeamAchievement::class);
    }
}
