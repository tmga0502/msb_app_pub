<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->date('date');
            $table->integer('party')->length(11);
            $table->integer('times')->length(11);
            $table->integer('c_cost')->length(11);
            $table->integer('atbb')->length(11);
            $table->integer('atbb_customer')->length(11);
            $table->integer('regular')->length(11);
            $table->integer('other1')->length(11);
            $table->string('other1_remark', 50);
            $table->integer('other2')->length(11);
            $table->string('other2_remark', 50);
            $table->integer('other3')->length(11);
            $table->string('other3_remark', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}
