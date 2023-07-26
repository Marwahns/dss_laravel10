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

            # Alternatif 3
            [
                'alternatif_id' => '3',
                'criteria_id'   => '1',
                'nilai'         => '3.35'
            ],
            [
                'alternatif_id' => '3',
                'criteria_id'   => '2',
                'nilai'         => '6'
            ],
            [
                'alternatif_id' => '3',
                'criteria_id'   => '3',
                'nilai'         => '450'
            ],
            [
                'alternatif_id' => '3',
                'criteria_id'   => '4',
                'nilai'         => '848822'
            ],

            # Alternatif 4
            [
                'alternatif_id' => '4',
                'criteria_id'   => '1',
                'nilai'         => '3.50'
            ],
            [
                'alternatif_id' => '4',
                'criteria_id'   => '2',
                'nilai'         => '4'
            ],
            [
                'alternatif_id' => '4',
                'criteria_id'   => '3',
                'nilai'         => '2200'
            ],
            [
                'alternatif_id' => '4',
                'criteria_id'   => '4',
                'nilai'         => '554362'
            ],

            # Alternatif 5
            [
                'alternatif_id' => '5',
                'criteria_id'   => '1',
                'nilai'         => '2.57'
            ],
            [
                'alternatif_id' => '5',
                'criteria_id'   => '2',
                'nilai'         => '2'
            ],
            [
                'alternatif_id' => '5',
                'criteria_id'   => '3',
                'nilai'         => '900'
            ],
            [
                'alternatif_id' => '5',
                'criteria_id'   => '4',
                'nilai'         => '623750'
            ],

            # Alternatif 6
            [
                'alternatif_id' => '6',
                'criteria_id'   => '1',
                'nilai'         => '3.93'
            ],
            [
                'alternatif_id' => '6',
                'criteria_id'   => '2',
                'nilai'         => '4'
            ],
            [
                'alternatif_id' => '6',
                'criteria_id'   => '3',
                'nilai'         => '450'
            ],
            [
                'alternatif_id' => '6',
                'criteria_id'   => '4',
                'nilai'         => '214587'
            ],

            # Alternatif 7
            [
                'alternatif_id' => '7',
                'criteria_id'   => '1',
                'nilai'         => '3.37'
            ],
            [
                'alternatif_id' => '7',
                'criteria_id'   => '2',
                'nilai'         => '6'
            ],
            [
                'alternatif_id' => '7',
                'criteria_id'   => '3',
                'nilai'         => '2200'
            ],
            [
                'alternatif_id' => '7',
                'criteria_id'   => '4',
                'nilai'         => '926205'
            ],

            # Alternatif 8
            [
                'alternatif_id' => '8',
                'criteria_id'   => '1',
                'nilai'         => '2.62'
            ],
            [
                'alternatif_id' => '8',
                'criteria_id'   => '2',
                'nilai'         => '3'
            ],
            [
                'alternatif_id' => '8',
                'criteria_id'   => '3',
                'nilai'         => '2200'
            ],
            [
                'alternatif_id' => '8',
                'criteria_id'   => '4',
                'nilai'         => '969932'
            ],

            # Alternatif 9
            [
                'alternatif_id' => '9',
                'criteria_id'   => '1',
                'nilai'         => '2.86'
            ],
            [
                'alternatif_id' => '9',
                'criteria_id'   => '2',
                'nilai'         => '7'
            ],
            [
                'alternatif_id' => '9',
                'criteria_id'   => '3',
                'nilai'         => '450'
            ],
            [
                'alternatif_id' => '9',
                'criteria_id'   => '4',
                'nilai'         => '727256'
            ],

            # Alternatif 10
            [
                'alternatif_id' => '10',
                'criteria_id'   => '1',
                'nilai'         => '3.81'
            ],
            [
                'alternatif_id' => '10',
                'criteria_id'   => '2',
                'nilai'         => '6'
            ],
            [
                'alternatif_id' => '10',
                'criteria_id'   => '3',
                'nilai'         => '1300'
            ],
            [
                'alternatif_id' => '10',
                'criteria_id'   => '4',
                'nilai'         => '585881'
            ],
        ];

        foreach ($data as $row) {
            Sample::create($row);
        }
    }
}
