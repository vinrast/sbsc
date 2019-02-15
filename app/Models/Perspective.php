<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perspective extends Model
{
    protected $table = 'perspectives';

    protected $fillable = [
      'name', 'description'
    ];

    public function indicators()
    {
      return $this->hasMany(App\Models\Indicator::class);
    }
}
