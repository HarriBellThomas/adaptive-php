<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name'
    ];

    protected $guarded = ['id'];

    public function styles()
    {
      return $this->hasMany('App\Style');
    }

    public function default_style()
    {
      // The actual one-to-one nature of this relationship
      // is enforced by the schema
      return $this->belongsToMany('App\Style', 'users_styles', 'user_id', 'style_id');
    }


}
