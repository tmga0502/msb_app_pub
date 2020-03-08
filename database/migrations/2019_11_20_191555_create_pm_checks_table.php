<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePmChecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pm_checks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pms_id');//foreignKye
            $table->integer('payYear')->lengrh(4);
            $table->integer('payMonth')->lengrh(2);
            $table->date('person_check');//担当チェック
            $table->date('clerk_check');//事務チェック
            $table->date('transfer_date');//送金日
            $table->text('remark');//備考
            $table->timestamps();

            $table
              ->foreign('pms_id')
              ->references('id')
              ->on('pms')
              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pm_checks');
    }
}
