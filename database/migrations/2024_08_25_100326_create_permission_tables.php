<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();       // For MyISAM use string('guard_name', 25);
            $table->string('name');
            $table->timestamps();     // For MyISAM use string('guard_name', 25);

        });

        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // For MyISAM use string('guard_name', 25);
            $table->foreignId('role_id')->nullable();
            $table->foreign('role_id')
                ->references('id') // id
                ->on('roles')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('roles');
        Schema::drop('permissions');
    }
};
