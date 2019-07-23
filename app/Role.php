<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function permissions(){
        return $this->belongsToMany(Permision::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function givePermissonTo(Permision $permision){
        return $this->permissions()->save($permision);
    }
}
