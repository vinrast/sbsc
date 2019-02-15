<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Department extends Model
{
  protected $table = 'departments';

  protected $fillable = [
    'name', 'description'
  ];

  public function users()
  {
    return $this->hasMany(User::class);
  }
}
