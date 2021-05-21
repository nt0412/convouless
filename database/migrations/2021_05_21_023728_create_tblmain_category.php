<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblmainCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblmain_category', function (Blueprint $table) {
            $table->integer('main_cate_id')->autoIncrement();
            $table->text('main_cate_name')->charset('utf8');
            $table->text('main_cate_slug');
            $table->text('main_cate_description')->charset('utf8');
            $table->integer('main_cate_status');

        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblmain_category');
    }
}
