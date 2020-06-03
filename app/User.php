<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class  User extends Authenticatable
{
  use Notifiable;

  protected $fillable = [
    'name','email', 'password','lastname','numIndentificate','mobile',
    'userReferide','roleId'
  ];

  protected $hidden = [
      'password', 'remember_token',
  ];

  protected $casts = [
      'email_verified_at' => 'datetime',
  ];

  public function role()
  {
    return $this->belongsTo(User::class);
  }

  public function cartClient()
  {
    return $this->hasMany(ClientCard::class,'userId');
  }

  public function buysClientGeneral()
  {
    return $this->hasMany(BuysGeneral::class,'userId');
  }
}
