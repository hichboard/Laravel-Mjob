<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersCandidatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_candidats', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('id_fb',100)->nullable();
            $table->string('picture_fb',100)->nullable();
            $table->date('birthday');
            $table->string('pic_profile',100)->nullable();
            $table->softDeletes('deleted_at');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_candidats');
        Schema::drop('users_candidats', function (Blueprint $table){
            $table->dropForeign('users_candidats_user_id_foreign');
        });

    }
}
