<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NavigationItem extends Model
{
    protected $table = 'navigation';

    public $timestamps = false;

    public function children()
    {
        return $this->hasMany('App\NavigationItem', 'parent_id');
    }
}
