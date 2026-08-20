<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Wd', function (Blueprint $table) {
            $table->string('Wd_No', 10)->primary();
            $table->string('Wd_Name', 50)->nullable();
            $table->string('Location', 50)->nullable();
            $table->integer('TotalBeds')->default(20);
            $table->string('TelExtension', 10)->nullable();
        });

        Schema::create('Bed', function (Blueprint $table) {
            $table->string('Bed_No', 10)->primary();
            $table->string('Wd_No', 10);
            $table->string('BedStatus', 15)->default('Empty'); // 'Empty' หรือ 'Occupied'

            $table->foreign('Wd_No')->references('Wd_No')->on('Wd')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Bed');
        Schema::dropIfExists('Wd');
    }
};
