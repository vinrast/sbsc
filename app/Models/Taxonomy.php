<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Indicator;

class Taxonomy extends Model
{
    protected $table = 'taxonomies';

    protected $fillable = [
      'name', 'family'
    ];

    public function indicators()
    {
      return belongsToMany(Indicator::class);
    }

    public function scopePerspectives($query){
        return $query->where('family', 1)->get();
    }
}
