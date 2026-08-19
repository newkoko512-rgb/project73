<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // อ่านไฟล์ .sql จาก database/sql/hospital.sql
        $sqlPath = database_path('sql/hospital.sql');

        // เช็คก่อนว่าไฟล์มีอยู่จริง
        if (! file_exists($sqlPath)) {
            throw new Exception('ไม่พบไฟล์ hospital.sql ใน database/sql/');
        }

        // อ่านเนื้อหาไฟล์
        $sql = file_get_contents($sqlPath);

        // รัน SQL ทั้งหมดในไฟล์
        DB::unprepared($sql);
    }

    public function down(): void
    {
        // ลบตารางเมื่อ rollback
        // ต้องลบตามลำดับ — ลบตารางที่มี foreign key ก่อน
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        Schema::dropIfExists('staffs');
        Schema::dropIfExists('beds');
        Schema::dropIfExists('wards');
        // เพิ่มตารางอื่นๆ ที่มีใน .sql ด้วย

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
};
