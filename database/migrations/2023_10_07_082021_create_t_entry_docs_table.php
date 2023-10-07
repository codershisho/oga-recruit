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
        Schema::create('t_entry_docs', function (Blueprint $table) {
            $table->id()->comment('書類ID');
            $table->unsignedBigInteger('entry_id')->comment('エントリーID');
            $table->string('resume_path')->nullable()->comment('履歴書パス');
            $table->string('cv_path')->nullable()->comment('職務経歴書パス');
            $table->string('analysis_link')->nullable()->comment('適性検査リンク');
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
        Schema::dropIfExists('t_entry_docs');
    }
};
