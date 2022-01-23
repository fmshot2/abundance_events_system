<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->text('details');
            $table->string('phone_1');
            $table->string('phone_2');
            $table->string('phone_3');
            $table->string('email_1');
            $table->string('email_2');
            $table->string('email_3');
            $table->string('address');
            $table->string('facebook');
            $table->string('linkedin');
            $table->string('twitter');
            $table->string('youtube');
            $table->string('instagram');
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
        Schema::dropIfExists('details');
    }
}
