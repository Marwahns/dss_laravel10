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
                'nama_alternative'  => 'Annisa Marfadilla',
                'kode_alternative'      => 'A001'
            ],
            [
                'nama_alternative'  => 'Marwah Nur Shafira ',
                'kode_alternative'      => 'A002'
            ],
            [
                'nama_alternative'  => 'Michael Natanael',
                'kode_alternative'      => 'A003'
            ],
            [
                'nama_alternative'  => 'Cut Azimah Noor Hanifah',
                'kode_alternative'      => 'A004'
            ],
        ];

        foreach ($data as $row) {
            Alternative::create($row);
        }
    }
}
