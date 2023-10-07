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
        Schema::create('m_sources', function (Blueprint $table) {
            $table->id()->comment('応募情報源ID');
            $table->string('name')->nullable()->comment('応募情報源名');
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
        Schema::dropIfExists('m_sources');
    }
};
