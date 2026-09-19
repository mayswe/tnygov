<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteStatisticsTable extends Migration
{
    public function up()
    {
        Schema::create('site_statistics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key')->unique();
            $table->unsignedBigInteger('value')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('site_statistics');
    }
}
