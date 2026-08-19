<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Wd', function (Blueprint $table) {
            $table->string('Wd_No', 10)->primary();
            $table->string('Wd_Name', 50);
            $table->string('Location', 50);
            $table->integer('TotalBeds');
            $table->string('TelExtension', 10);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Wd');
    }
};
