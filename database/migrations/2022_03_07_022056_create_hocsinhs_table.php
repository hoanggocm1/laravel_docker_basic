<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHocsinhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hocsinhs', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('lop',100);
            $table->integer('dtb');
            $table->string('phone',10);
            $table->interger('active');
            $table->timestamps();
        });

        Schema::table('hocsinhs', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('lop',100);
            $table->integer('dtb');
            $table->string('phone',10);
            $table->interger('active');
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
        Schema::dropIfExists('hocsinhs');
    }
}
