<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesAndPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('lable');
            $table->timestamps();
        });
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('lable');
            $table->timestamps();
        });
        Schema::create('permission_role', function (Blueprint $table) {
            $table->unsignedInteger('role_id')->index();
            $table->foreign('role_id')
                ->references('id')
                ->on('roles')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedInteger('permission_id')->index();
            $table->foreign('permission_id')
                            ->references('id')
                            ->on('permissions')->onDelete('cascade')->onUpdate('cascade');
            $table->primary(['role_id','permission_id']);
        });
        Schema::create('role_user', function (Blueprint $table) {
            $table->unsignedInteger('role_id')->index();
            $table->unsignedInteger('user_id')->index();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('role_id')
                ->references('id')
                ->on('roles')->onDelete('cascade')->onUpdate('cascade');
            $table->primary(['role_id','user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('permission_role');
        Schema::dropIfExists('role_user');
    }
}
