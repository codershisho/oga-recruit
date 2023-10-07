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
        Schema::create('t_entry_phases', function (Blueprint $table) {
            $table->id()->comment('エントリーフェーズID');
            $table->unsignedBigInteger('entry_id')->comment('エントリーID');
            $table->unsignedBigInteger('phase_id')->comment('フェーズID');
            $table->date('next_action_day')->nullable()->comment('次フェーズの実施日');
            $table->text('message')->nullable()->comment('メッセージ（メモ的な）');
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
        Schema::dropIfExists('t_entry_phases');
    }
};
