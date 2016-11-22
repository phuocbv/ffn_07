<?php

namespace App;

use App\Comment;
use App\Category;
use App\Country;
use Illuminate\Database\Eloquent\Model;
use App\BaseModel;

class News extends BaseModel
{
    protected $table = 'news';

    public function rules($ruleName)
    {
        if ($ruleName == 'updateRule') {
            $titleRules = 'required|max:100|unique:news,title,' . $this->id;
        } else {
            $titleRules = 'required|max:100|unique:news,title';
        }
        return [
            'title' => $titleRules,
            'description' => 'required|max:200|min:10',
            'content' => 'required|min:10',
            'country_id' => 'required|exists:countries,id',
            'cate_id' => 'required|exists:categories,id',
        ];
    }

    protected $fillable = [
        'title',
        'description',
        'content',
        'cate_id',
        'country_id',
    ];

    public function scopeGetNews($query, $take = 1, $column = 'created_at', $sort = 'desc', $skip = 0)
    {
        return $query->orderBy($column, $sort)->skip($skip)->take($take);
    }

    public function scopeGetNewsByCategory($query, $idCategory, $take = null, $column = 'created_at', $sort = 'desc')
    {
        return $take ? $query->where('cate_id', $idCategory)->orderBy($column, $sort)->take($take) :
            $query->where('cate_id', $idCategory)->orderBy($column, $sort);
    }

    public function scopeGetNewsIsTitle($query, $idCategory, $take, $hot, $column = 'created_at', $sort = 'desc')
    {
        return $query->where('cate_id', $idCategory)
            ->where('hot', $hot)->orderBy($column, $sort)->take($take); 
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'cate_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
