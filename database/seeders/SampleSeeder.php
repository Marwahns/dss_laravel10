<?php

namespace Database\Seeders;

use App\Models\Sample;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            # Alternatif 1
            [
                'alternatif_id' => '1',
                'criteria_id'   => '1',
                'nilai'         => '3.56'
            ],
            [
                'alternatif_id' => '1',
                'criteria_id'   => '2',
                'nilai'         => '6'
            ],
            [
                'alternatif_id' => '1',
                'criteria_id'   => '3',
                'nilai'         => '900'
            ],
            [
                'alternatif_id' => '1',
                'criteria_id'   => '4',
                'nilai'         => '982910'
            ],

            # Alternatif 2
            [
                'alternatif_id' => '2',
                'criteria_id'   => '1',
                'nilai'         => '2.66'
            ],
            [
                'alternatif_id' => '2',
                'criteria_id'   => '2',
                'nilai'         => '3'
            ],
            [
                'alternatif_id' => '2',
                'criteria_id'   => '3',
                'nilai'         => '1300'
            ],
            [
                'alternatif_id' => '2',
                'criteria_id'   => '4',
                'nilai'         => '385347'
            ],
        ];

        foreach ($data as $row) {
            Sample::create($row);
        }
    }
}
