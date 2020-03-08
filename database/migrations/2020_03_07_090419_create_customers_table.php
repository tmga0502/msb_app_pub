<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id' )->length(11)->nullable()->default(null);
            $table->string('c_name',50)->nullable()->default(null);
            $table->string('c_kana',50)->nullable()->default(null);
            $table->string('type',25)->nullable()->default(null);
            $table->string('statues',25)->nullable()->default(null);
            $table->string('accuracy',5)->nullable()->default(null);
            $table->date('i_month')->nullable()->default(null);
            $table->date('plannedApply')->nullable()->default(null);
            $table->string('i_type', 25)->nullable()->default(null);
            $table->string('i_name',50)->nullable()->default(null);
            $table->string('i_kana',50)->nullable()->default(null);
            $table->string('i_who', 25)->nullable()->default(null);
            $table->string('i_relation',50)->nullable()->default(null);
            $table->string('phone',20)->nullable()->default(null);
            $table->string('mail',100)->nullable()->default(null);
            $table->string('fb',100)->nullable()->default(null);
            $table->string('messe',100)->nullable()->default(null);
            $table->string('line',100)->nullable()->default(null);
            $table->date('birthday')->nullable()->default(null);
            $table->string('structure',25)->nullable()->default(null);
            $table->string('job',50)->nullable()->default(null);
            $table->string('company_name',100)->nullable()->default(null);
            $table->text('progress')->nullable()->default(null);
            $table->text('remark')->nullable()->default(null);
            $table->string('actualResident',50)->nullable()->default(null);
            $table->string('contacter',50)->nullable()->default(null);
            $table->string('contacter_relation',50)->nullable()->default(null);
            $table->integer('plannedSales' )->length(11)->nullable()->default(null);
            $table->date('expectedPayment')->nullable()->default(null);
            $table->integer('bf' )->length(11)->nullable()->default(null);
            $table->date('bfDate')->nullable()->default(null);
            $table->integer('ad' )->length(11)->nullable()->default(null);
            $table->date('adDate')->nullable()->default(null);
            $table->integer('disBF' )->length(11)->nullable()->default(null);
            $table->integer('disAD' )->length(11)->nullable()->default(null);
            $table->string('useType',50)->nullable()->default(null);
            $table->integer('zipcode' )->length(7)->nullable()->default(null);
            $table->string('address',50)->nullable()->default(null);
            $table->string('mansion_name',50)->nullable()->default(null);
            $table->string('rent',50)->nullable()->default(null);
            $table->date('contractDate')->nullable()->default(null);
            $table->date('startDate')->nullable()->default(null);
            $table->date('endDate')->nullable()->default(null);
            $table->string('period',20)->nullable()->default(null);
            $table->integer('notice' )->length(2)->nullable()->default(null);
            $table->string('renewalType',5)->nullable()->default(null);
            $table->integer('renewalFee' )->length(11)->nullable()->default(null);
            $table->date('settlementDate')->nullable()->default(null);
            $table->date('deliveryDate')->nullable()->default(null);
            $table->string('mcName',50)->nullable()->default(null);
            $table->string('mcPerson',50)->nullable()->default(null);
            $table->string('mcTel',20)->nullable()->default(null);
            $table->string('mcFax',20)->nullable()->default(null);
            $table->string('acting',50)->nullable()->default(null);
            $table->string('actingPerson',50)->nullable()->default(null);
            $table->string('actingKana',50)->nullable()->default(null);
            $table->string('loan',50)->nullable()->default(null);
            $table->string('distinationName',50)->nullable()->default(null);
            $table->integer('d_zipcode' )->length(7)->nullable()->default(null);
            $table->string('d_address',50)->nullable()->default(null);
            $table->string('d_mansion_name',50)->nullable()->default(null);
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
        Schema::dropIfExists('customers');
    }
}
