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
        Schema::create('t_entry_discussions', function (Blueprint $table) {
            $table->id()->comment('ディスカッションID');
            $table->unsignedBigInteger('entry_id')->comment('エントリーID');
            $table->unsignedBigInteger('user_id')->comment('ユーザーID');
            $table->text('message')->nullable()->comment('メッセージ');
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
        Schema::dropIfExists('t_entry_discussions');
    }
};
