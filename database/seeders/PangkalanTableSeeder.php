<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pangkalan;

class PangkalanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pangkalan = [
            [
                'nama' => 'CIPUTRA',
                'alamat' => 'Payakumbuh, Padang',
                'nohp' => '085474263',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'SEJAHTERA',
                'alamat' => 'Bukit Tinggi, Padang',
                'nohp' => '08547434',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ];

        Pangkalan::insert($pangkalan);
    }
}
