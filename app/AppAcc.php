<?php

namespace CATIA;

use Illuminate\Database\Eloquent\Model;

class AppAcc extends Model
{
  protected $table = 'appacc';

  protected $fillable = ['manpower_id','username','password','timelogin','timelogout'];

  protected $hidden = ['password'];

  public function manpower_profiles()
  {
      return $this->belongsTo('CATIA\manpower_profile');
  }
}
