<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
    protected $table = 'audit';

    protected $fillable = [
    'action_id', 'place_id', 'user', 'register', 'update_values'
    ];
    
    protected $dates = ['created_at', 'updated_at'];

    public function action()
    {
      return $this->belongsTo(Taxonomy::class);
    }

    public function place()
    {
      return $this->belongsTo(Taxonomy::class);
    }
}
