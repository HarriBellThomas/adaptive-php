<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
      'review', 'stars'
    ];

    protected $guarded = [
      'id'
    ];

    public function user()
    {
      return $this->belongsTo('App\User', 'user_id');
    }

    public function style()
    {
      return $this->belongsTo('App\Style', 'style_id');
    }


}
