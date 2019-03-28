<?php

namespace App;

use App\Http\Traits\Translator;
use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Department;
use Caffeinated\Shinobi\Models\Role;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable, ShinobiTrait, Translator;

    protected $fillable = [
        'name', 'email', 'password','department_id','avatar'
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

    public function roles()
    {
      return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }
    
    public function scopeSearch($query,$data){
      return $query->where('name','like','%'.$data.'%')
                   ->orwhere('email','like','%'.$data.'%')
                   ->orderBy('id','DES');
    }
}
