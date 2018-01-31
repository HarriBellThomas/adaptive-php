<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

// Schema for the default style relationship

class CreateUsersStylesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_styles', function (Blueprint $table) {
          $table->integer('user_id')->unsigned();
          $table->primary('user_id');
          $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('restrict');

          $table->integer('style_id')->unsigned();
          $table->foreign('style_id')
                ->references('id')->on('styles')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_styles');
    }
}
