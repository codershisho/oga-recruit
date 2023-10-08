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
        Schema::create('t_entry_discussion_reads', function (Blueprint $table) {
            $table->id()->comment('既読ID');
            $table->unsignedBigInteger('discussion_id')->comment('ディスカッションID');
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
        Schema::dropIfExists('t_entry_discussion_reads');
    }
};
