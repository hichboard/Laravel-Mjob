<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOfferSectorAndOfferCityToOffersEmployersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('offers_employers', function (Blueprint $table) {
            $table->string('offer_sector',50);
            $table->string('offer_city',50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('offers_employers', function (Blueprint $table) {
            $table->dropColumn('offer_sector');
            $table->dropColumn('offer_city');
        });
    }
}
