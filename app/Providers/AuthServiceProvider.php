<?php

namespace App\Providers;

use App\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Note' => 'App\Policies\NotePolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
//        Gate::define('edite-note',function($user , $note){
//            return $user->id == $note->user_id;
//        });
        //
        foreach ($this->getPermissions() as $permission) {
            Gate::define($permission->name,function($user) use ($permission) {
                return $user->hasRole($permission->roles());
            });
        }
    }

    public function getPermissions(){
        return Permission::with('roles')->get();
    }
}
