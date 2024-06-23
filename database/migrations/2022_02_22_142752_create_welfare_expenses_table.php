<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWelfareExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('welfare_expenses', function (Blueprint $table) {
            $table->id();
            $table->uuid('member_id')->constrained('members','mask')->onDelete('cascade');
            $table->double('amount')->default(0);
            $table->string('reason');
            $table->foreignUuid('recorded_by')->nullable();
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
        Schema::dropIfExists('welfare_expenses');
    }
}
