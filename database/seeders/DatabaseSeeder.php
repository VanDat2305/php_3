<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $dataStudentSeed = array();
        for ($i=0; $i < 100; $i++) { 
            $dataStudentSeed[] = [
                'ten_sinh_vien'=>"Nguyễn Văn ". $i,
                'ngay_nhap_hoc'=>"2020-10-1",
                'dia_chi'=>"Trịnh Văn Bô ". $i,
                'created_at'=>date("Y-m-d H:i:s"),
                'updated_at'=>date("Y-m-d H:i:s")
            ];
            
        }
        // $dataStudentSeed = [
        //     [
        //         'ten_sinh_vien'=>"Nguyễn Văn A",
        //         'ngay_nhap_hoc'=>"2020-10-1",
        //         'dia_chi'=>"Trịnh Văn Bô",
        //         'created_at'=>date("Y-m-d H:i:s"),
        //         'updated_at'=>date("Y-m-d H:i:s"),
                
        //     ],
        //     [
        //         'ten_sinh_vien'=>"Nguyễn Văn B",
        //         'ngay_nhap_hoc'=>"2020-10-2",
        //         'dia_chi'=>"Trịnh Văn Bô",
        //         'created_at'=>date("Y-m-d H:i:s"),
        //         'updated_at'=>date("Y-m-d H:i:s"),
                
        //     ],
        //     [
        //         'ten_sinh_vien'=>"Nguyễn Văn C",
        //         'ngay_nhap_hoc'=>"2020-10-5",
        //         'dia_chi'=>"Trịnh Văn Bô",
        //         'created_at'=>date("Y-m-d H:i:s"),
        //         'updated_at'=>date("Y-m-d H:i:s"),
                
        //     ]
        // ];
        DB::table("students")->insert($dataStudentSeed);
    }
}
