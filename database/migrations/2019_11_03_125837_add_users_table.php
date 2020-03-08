<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
             $table->string('bank', 50)->default('');
             $table->string('bank_branch', 50)->default('');
             $table->integer('bank_type')->length(1)->default(0);
             $table->integer('bank_number')->length(10)->default(0);
             $table->string('contract_type', 20)->default('');
             $table->text('licence');
             $table->integer('tel')->length(10)->default(0);
             $table->string('msby_mail', 20)->default('');
             $table->string('original_mail', 20)->default('');
             $table->string('lineID', 50)->default('');
             $table->date('birthday')->nullable()->default(null);
             $table->string('address', 50)->default('');
             $table->string('resident_card', 50)->default('');
             $table->date('hire')->nullable()->default(null);
             $table->integer('emergency')->length(10)->default(0);
             $table->string('relationship', 20)->default('');
             $table->string('emergency_address', 50)->default('');
             $table->string('virus_soft', 20)->default('');
             $table->date('legal_hire')->nullable()->default(null);
             $table->integer('employee_number')->length(10)->default(0);
             $table->date('leaving')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
