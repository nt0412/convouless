<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Grammars\ChangeColumn;
use Illuminate\Support\Facades\Schema;

class ChangeTypeColNewsSummanyToText extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("tblnews", function(Blueprint $table) {
            $table->text("news_summary")->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('text', function (Blueprint $table) {
            //
        });
    }
}
