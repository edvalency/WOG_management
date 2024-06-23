<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->uuid('mask');
            $table->string('profileImg')->nullable();
            $table->string('fullname');
            $table->string('dob')->nullable();
            $table->string('contact')->nullable();
            $table->string('gender')->nullable();
            $table->string('hometown')->nullable();
            $table->string('region')->nullable();
            $table->string('marital')->nullable();
            $table->string('residence')->nullable();
            $table->string('email')->nullable();
            $table->string('fathersname')->nullable();
            $table->string('fatherstat')->nullable();
            $table->string('mothersname')->nullable();
            $table->string('motherstat')->nullable();
            $table->string('next_of_kin')->nullable();
            $table->string('next_of_kin_contact')->nullable();
            $table->string('relation_to_nok')->nullable();
            $table->string('email_of_nok')->nullable();
            $table->string('dept')->nullable();
            $table->string('baptism_stat')->nullable();
            $table->string('date_baptised')->nullable();
            $table->string('yom')->nullable();
            $table->string('profession')->nullable();
            $table->string('present_occupation')->nullable();
            $table->string('name_of_company')->nullable();
            $table->string('employment_stat')->nullable();
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
        Schema::dropIfExists('members');
    }
}
