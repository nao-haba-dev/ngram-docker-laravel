<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('店ID');
            $table->string('name', 255)->comment('従業員');
            $table->unsignedInteger('age')->comment('年齢');
            $table->smallInteger('gender_id')->comment('性別');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
        DB::statement("ALTER TABLE shops ADD free_word TEXT as (concat(IFNULL(age, ''), ' ',IFNULL(name, ''), ' ',(case gender_id when 1 then '男性' when 2 then '女性' else '' end), ' ')) STORED");
        DB::statement("ALTER TABLE shops ADD FULLTEXT index ftx_free_word (free_word) with parser ngram");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
