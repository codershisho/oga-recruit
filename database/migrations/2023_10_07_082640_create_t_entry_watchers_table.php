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
        Schema::create('t_entry_watchers', function (Blueprint $table) {
            $table->id()->comment('watcherID');
            $table->unsignedBigInteger('entry_id')->comment('エントリーID');
            $table->unsignedBigInteger('user_id')->comment('ユーザーID');
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
        Schema::dropIfExists('t_entry_watchers');
    }
};
