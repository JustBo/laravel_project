<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
    //column that can be stored to database
    protected $fillable = [
      'title',
      'body',
      'published_at'
    ];
    protected $dates = ['published_at'];
    //filter articles when fetch data   Article::published($value)
    public function scopePublished( $query ){
      $query->where('published_at', '<=', Carbon::now());
    }
    //set date when persist to database
    public function setPublishedAtAttribute( $date ){
      $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
    }
    public function getPublishedAtAttribute( $date ){
      return Carbon::parse( $date )->format('Y-m-d');
    }
    //return lists of ids for the current article
    public function getCategoriesListAttribute( ){
      return $this->categories->lists('id')->all();
    }

    public function user(){
      return $this->belongsTo('App\User');
    }

    public function categories(){
      return $this->belongsToMany('App\Category')->withTimestamps();
    }

}
