<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTypeColInNewsToText extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tblnews', function (Blueprint $table) {
            $table->text('news_title')->change();
            $table->text('news_slug')->change();
            $table->text('news_metatile')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news_to_text', function (Blueprint $table) {
            //
        });
    }
}
