<?php

namespace CATIA;

use jorenvanhocht\Blogify\Traits\BlogifyUserTrait;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

use Authenticatable, CanResetPassword, BlogifyUserTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
