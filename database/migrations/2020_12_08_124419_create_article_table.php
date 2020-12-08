<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTable extends Migration
{
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('text');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('article');
    }
}
