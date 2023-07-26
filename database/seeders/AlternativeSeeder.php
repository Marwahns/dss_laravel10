<?php

namespace Database\Seeders;

use App\Models\Alternative;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlternativeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_alternative'  => 'T. Alfian',
                'kode_alternative'  => 'A001'
            ],
            [
                'nama_alternative'  => 'N. Firza ',
                'kode_alternative'  => 'A002'
            ],
            [
                'nama_alternative'  => 'Gatot',
                'kode_alternative'  => 'A003'
            ],
            [
                'nama_alternative'  => 'T. Usman',
                'kode_alternative'  => 'A004'
            ],
            [
                'nama_alternative'  => 'Hilmi',
                'kode_alternative'  => 'A005'
            ],
            [
                'nama_alternative'  => 'Vicky R ',
                'kode_alternative'  => 'A006'
            ],
            [
                'nama_alternative'  => 'Kevin',
                'kode_alternative'  => 'A007'
            ],
            [
                'nama_alternative'  => 'Zaki P',
                'kode_alternative'  => 'A008'
            ],
            [
                'nama_alternative'  => 'H. James',
                'kode_alternative'  => 'A009'
            ],
            [
                'nama_alternative'  => 'N. Reza',
                'kode_alternative'  => 'A010'
            ],
        ];

        foreach ($data as $row) {
            Alternative::create($row);
        }
    }
}
