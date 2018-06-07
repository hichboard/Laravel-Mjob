<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersEmployersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers_employers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('offer_title',70);
            $table->string('offer_contract_type',10);
            $table->string('offer_required_training')->default('Non spécifié');
            $table->string('offer_qualities')->default('Non spécifié');
            $table->string('offer_missions')->default('Non spécifié');
            $table->string('offer_languages')->default('Non spécifié');
            $table->integer('offer_salary')->nullable();
            $table->string('offer_pic')->nullable();
            $table->softDeletes('deleted_at');
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
        Schema::dropIfExists('offers_employers');
        Schema::drop('offers_employers', function (Blueprint $table){
            $table->dropForeign('offers_employers_user_id_foreign');
        });
    }
}
