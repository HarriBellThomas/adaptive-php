<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
  protected $fillable = ['style', 'name'];
  protected $guarded = ['id'];

  public function user()
  {
    return $this->belongsTo('App\User', 'user_id');
  }

  public function tags()
  {
    return $this->belongsToMany('App\Tag', 'tags_styles', 'style_id', 'tag_id');
  }

  public function reviews()
  {
    return $this->hasMany('App\Review');
  }
}
