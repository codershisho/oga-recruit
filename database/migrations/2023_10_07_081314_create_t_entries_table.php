<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_entries', function (Blueprint $table) {
            $table->id()->comment('エントリーID');
            $table->string('first_name')->comment('姓');
            $table->string('last_name')->comment('名');
            $table->string('first_name_kana')->comment('姓かな');
            $table->string('last_name_kana')->comment('名かな');
            $table->unsignedBigInteger('phase_id')->comment('フェーズID');
            $table->unsignedBigInteger('status_id')->comment('ステータスID');
            $table->string('mail')->nullable()->comment('メールアドレス');
            $table->date('birth_day')->nullable()->comment('生年月日');
            $table->string('post_code')->nullable()->comment('郵便番号');
            $table->string('address')->nullable()->comment('住所');
            $table->string('phone')->nullable()->comment('電話番号');
            $table->string('positions')->nullable()->comment('希望部署（カンマ区切り）');
            $table->integer('final_position')->nullable()->comment('最終的な希望部署');
            $table->date('join_day')->nullable()->comment('入社希望日');
            $table->unsignedBigInteger('source_id')->comment('応募情報源ID');
            $table->text('free_message')->nullable()->comment('フリーメッセージ');
            $table->string('image')->nullable()->comment('イメージ');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_entries');
    }
};
