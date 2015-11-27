<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntryUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entry_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('phone', 11);
            $table->string('password', 60);
            $table->tinyInteger('gender');
            $table->text('profile');
            $table->text('prov_city');
            $table->string('class_grade');
            $table->string('dormitory');
            $table->tinyInteger('adjustable');
            $table->string('qq');
            $table->string('email')->unique();
            $table->string('department');
            $table->text('options');
            $table->text('resume');
            $table->text('reason');

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();      // 软删除
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('entry_users');
    }
}
