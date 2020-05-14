<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('loginID')->unique();
            $table->string('password');
            $table->integer('superUser')->length(1)->nullable()->default(null);;
            $table->string('bank', 50)->nullable()->default(null);
            $table->string('bank_branch', 50)->nullable()->default(null);
            $table->integer('bank_type')->length(1)->nullable()->default(null);;
            $table->integer('bank_number')->length(10)->nullable()->default(null);;
            $table->string('contract_type', 20)->nullable()->default(null);
            $table->text('licence')->nullable()->default(null);;
            $table->string('tel', 15)->nullable()->default(null);;
            $table->string('msby_mail', 20)->nullable()->default(null);
            $table->string('original_mail', 20)->nullable()->default(null);
            $table->string('lineID', 50)->nullable()->default(null);
            $table->date('birthday')->nullable()->default(null);
            $table->string('zipcode', 12)->nullable()->default(null);
            $table->string('address', 50)->nullable()->default(null);
            $table->string('mansion_name', 50)->nullable()->default(null);
            $table->string('r_zipcode', 12)->nullable()->default(null);
            $table->string('resident_card', 50)->nullable()->default(null);
            $table->string('r_mansion_name', 50)->nullable()->default(null);
            $table->date('hire')->nullable()->default(null);
            $table->string('emergency', 15)->nullable()->default(null);;
            $table->string('relationship', 20)->nullable()->default(null);
            $table->string('e_zipcode', 12)->nullable()->default(null);
            $table->string('emergency_address', 50)->nullable()->default(null);
            $table->string('e_mansion_name', 50)->nullable()->default(null);
            $table->date('legal_hire')->nullable()->default(null);
            $table->string('employee_number',20)->nullable()->default(null);;
            $table->date('leaving')->nullable()->default(null);
            $table->timestamps();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
