<?php

namespace Database\Seeders;

use App\Models\Criteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'criteria'  => 'Indeks Prestasi',
                'type'      => 'benefit',
                'weight'    => '0.45'
            ],
            [
                'criteria'  => 'Semester Prestasi',
                'type'      => 'cost',
                'weight'    => '0.25'
            ],
            [
                'criteria'  => 'Daya listrik',
                'type'      => 'cost',
                'weight'    => '0.09'
            ],
            [
                'criteria'  => 'Jumlah tagihan listrik',
                'type'      => 'cost',
                'weight'    => '0.2'
            ],
        ];

        foreach ($data as $row) {
            Criteria::create($row);
        }
    }
}
