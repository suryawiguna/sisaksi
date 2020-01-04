<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saksi', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedSmallInteger('user_id');
            $table->unsignedSmallInteger('koor_id');
            $table->unsignedTinyInteger('partai_id');
            $table->string('tps', 2);
            $table->string('nama', 100);
            $table->enum('gender', ['L', 'P']);
            $table->string('alamat', 100);
            $table->string('no_hp', 20);
            $table->string('foto_ktp');
            $table->string('foto_diri');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();

            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->foreign('koor_id')
                    ->references('id')->on('koor')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->foreign('partai_id')
                    ->references('id')->on('partai')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saksi');
    }
}
