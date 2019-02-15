<?php

namespace App\Models;

use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Database\Eloquent\Model;

class SidebarLink extends Model
{
    protected $table = 'sidebar_links';

    protected $fillable = [
      'name', 'url', 'icon', 'family', 'parent', 'permission_id'
    ];

    public function permission()
    {
      return $this->belongsTo(Permission::class);
    }
}
