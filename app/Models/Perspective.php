<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Indicator;

class Perspective extends Model
{
    protected $table = 'perspectives';

    protected $fillable = [
      'name', 'description'
    ];

    public function indicators()
    {
      return $this->hasMany(Indicator::class);
    }
}
