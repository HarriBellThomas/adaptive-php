<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['tag_name', 'description'];
    protected $guarded = ['id'];

    public function styles ()
    {
      return $this->belongsToMany('App\Style', 'tags_styles', 'tag_id', 'style_id');
    }
}
