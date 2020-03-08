<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->date('payday');//給与支払日
            $table->integer('advanceExpenses');//会社立替経費
            $table->integer('salary');//固定給
            $table->integer('remuneration');//役員報酬
            $table->integer('bonus');//賞与
            $table->integer('commission');//歩合
            $table->integer('allowance');//手当
            $table->integer('consignment');//事務委託
            $table->integer('rent');//社宅
            $table->integer('transport');//非課税交通費
            $table->integer('HealthInsurance');//健康保険
            $table->integer('CareInsurance');//介護保険
            $table->integer('WelfarePension');//厚生年金
            $table->integer('EmploInsurance');//雇用保険
            $table->integer('incomeTax');//所得税
            $table->integer('residentTax');//住民税
            $table->integer('adjustment');//年末調整
            $table->integer('rent10%');//社宅10%
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
        Schema::dropIfExists('payrolls');
    }
}
