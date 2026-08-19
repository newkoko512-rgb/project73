<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('StfWd', function (Blueprint $table) {
            $table->string('StfWd_No')->primary();
            $table->string('Stf_No');
            $table->string('Wd_No', 10);
            $table->date('Date');
            $table->enum('Shift', ['Morning', 'Evening', 'Night']);

            $table->foreign('Stf_No')->references('Stf_No')->on('Stf')->onDelete('cascade');
            $table->foreign('Wd_No')->references('Wd_No')->on('Wd')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('StfWd');
    }
};
