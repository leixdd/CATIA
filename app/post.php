<?php

namespace CATIA;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
  protected $table = "post";

  protected $fillable = ['id', 'post_title', 'post_content', 'post_author' , 'post_thumb' , 'is_main'];

  protected $hidden = [];
  
}
