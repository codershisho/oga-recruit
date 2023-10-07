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
        Schema::create('m_phases', function (Blueprint $table) {
            $table->id()->comment('フェーズID');
            $table->string('name')->nullable()->comment('フェーズ名');
            $table->integer('sort_order')->nullable()->comment('並び順');
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
        Schema::dropIfExists('m_phases');
    }
};
