<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemDistribusisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_distribusis', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('distribusi_id');
            $table->foreign('distribusi_id')->references('id')->on('lpg_distribusis')->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->unsignedBigInteger('pangkalan_id');
            $table->foreign('pangkalan_id')->references('id')->on('pangkalans')->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->integer('qty');
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
        Schema::dropIfExists('item_distribusis');
    }
}
