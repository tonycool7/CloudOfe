<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFolderInFolderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('folder_in_folder')) {

            Schema::create('folder_in_folder', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('parent_folder_id');
                $table->integer('child_folder_id');
                $table->timestamps();
                $table->engine = 'InnoDB';
            });

            Schema::table('folder_in_folder', function (Blueprint $table) {

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
        Schema::dropIfExists('folder_in_folder');
    }
}
