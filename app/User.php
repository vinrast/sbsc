<?php

namespace App;

use App\Http\Traits\Translator;
use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Department;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable, ShinobiTrait, Translator;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = ['admission'];

    protected $dates = ['created_at', 'updated_at'];

    public function getAdmissionAttribute()
    {
      return $this->monthTranslator($this->created_at->format('n')).", ".$this->created_at->format('Y');
    }

    public function department()
    {
      return $this->belongsTo(Department::class);
    }
}
