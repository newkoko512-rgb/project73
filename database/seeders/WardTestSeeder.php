<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WardTestSeeder extends Seeder
{
    public function run(): void
    {
        $wards = [
            ['Wd_No' => 'Ward 1', 'Wd_Name' => 'Orthopaedic', 'Location' => 'E Block', 'TotalBeds' => 20, 'TelExtension' => '7701'],
            ['Wd_No' => 'Ward 2', 'Wd_Name' => 'General Medicine', 'Location' => 'A Block', 'TotalBeds' => 20, 'TelExtension' => '7702'],
            ['Wd_No' => 'Ward 3', 'Wd_Name' => 'Orthopaedic', 'Location' => 'E Block', 'TotalBeds' => 20, 'TelExtension' => '7703'],
            ['Wd_No' => 'Ward 4', 'Wd_Name' => 'Orthopaedic', 'Location' => 'E Block', 'TotalBeds' => 20, 'TelExtension' => '7704'],
            ['Wd_No' => 'Ward 5', 'Wd_Name' => 'Orthopaedic', 'Location' => 'E Block', 'TotalBeds' => 20, 'TelExtension' => '7705'],
            ['Wd_No' => 'Ward 6', 'Wd_Name' => 'Orthopaedic', 'Location' => 'E Block', 'TotalBeds' => 20, 'TelExtension' => '7705'],
            ['Wd_No' => 'Ward 7', 'Wd_Name' => 'Orthopaedic', 'Location' => 'E Block', 'TotalBeds' => 20, 'TelExtension' => '7705'],
            ['Wd_No' => 'Ward 8', 'Wd_Name' => 'Orthopaedic', 'Location' => 'E Block', 'TotalBeds' => 20, 'TelExtension' => '7705'],
            ['Wd_No' => 'Ward 9', 'Wd_Name' => 'Orthopaedic', 'Location' => 'E Block', 'TotalBeds' => 20, 'TelExtension' => '7705'],
            ['Wd_No' => 'Ward 10', 'Wd_Name' => 'Orthopaedic', 'Location' => 'E Block', 'TotalBeds' => 20, 'TelExtension' => '7705'],
            ['Wd_No' => 'Ward 11', 'Wd_Name' => 'Orthopaedic', 'Location' => 'E Block', 'TotalBeds' => 20, 'TelExtension' => '7705'],
            ['Wd_No' => 'Ward 12', 'Wd_Name' => 'Orthopaedic', 'Location' => 'E Block', 'TotalBeds' => 20, 'TelExtension' => '7705'],
            ['Wd_No' => 'Ward OPD', 'Wd_Name' => 'Outpatient Clinic', 'Location' => 'Ground Floor', 'TotalBeds' => 20, 'TelExtension' => '7700'],
        ];

        DB::table('Wd')->insert($wards);

        foreach ($wards as $ward) {
            
            // แปลงชื่อย่อ เช่น 'Ward 10' -> 'W10', 'Ward OPD' -> 'WOPD'
            $shortPrefix = str_replace('Ward ', 'W', $ward['Wd_No']);

            for ($i = 1; $i <= $ward['TotalBeds']; $i++) {
                
                $isOccupied = ($ward['Wd_No'] === 'Ward 2' && $i <= 7)
                           || ($ward['Wd_No'] === 'Ward 3' && $i <= 15)
                           || ($ward['Wd_No'] === 'Ward 5' && $i <= 20)
                           || ($ward['Wd_No'] === 'Ward 9' && $i <= 10)
                           || ($ward['Wd_No'] === 'Ward 10' && $i <= 20);

                DB::table('Bed')->insert([
                    // ผลลัพธ์: W10-B1, W10-B20 (ยาวเพียง 6-7 ตัวอักษร ไม่เกิน Limit แน่นอน)
                    'Bed_No'    => $shortPrefix . '-B' . $i, 
                    'Wd_No'     => $ward['Wd_No'],
                    'BedStatus' => $isOccupied ? 'Occupied' : 'Empty',
                ]);
            }
        }
    }
}