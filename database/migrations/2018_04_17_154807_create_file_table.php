<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('file')) {

            Schema::create('file', function (Blueprint $table) {
                $table->increments('id');
                $table->text('name');
                $table->integer('folder_id');
                $table->string('type');
                $table->string('extension');
                $table->string('size');
                $table->timestamps();
                $table->engine = 'InnoDB';
            });

            Schema::table('file', function (Blueprint $table) {
                $table->unique('folder_id');

                $table->foreign('folder_id')->references('id')->on('folder')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file');
    }
}
