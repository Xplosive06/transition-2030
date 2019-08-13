<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCityNameLongitudeLatitudeToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('address_city')->nullable()->after('username');
            $table->double('address_latitude')->nullable()->after('address_city');
            $table->double('address_longitude')->nullable()->after('address_latitude');
            $table->string('avatar')->default('user.jpg');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('address_city', 'address_latitude', 'address_longitude', 'avatar');
        });
    }
}
