<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Asset;

class CreateMaterialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $material = [
            [
                'materials'=>'Brass ball value w/ locking (Stop cock)',
                'unit_price'=>'423',
                'unit_cost_lbc'=>'30',
            ],
            [
                'materials'=>'Brass Coupling 1/2 (20mm)',
                'unit_price'=>'258',
                'unit_cost_lbc'=>'30',
            ],
            [
                'materials'=>'Plastic union coupling 1/2 (Compression)',
                'unit_price'=>'125',
                'unit_cost_lbc'=>'30',
             ],
             [
                'materials'=>'Plastic tee 1/2 (Compression tee)',
                'unit_price'=>'187',
                'unit_cost_lbc'=>'30',
             ],
        ];
  
        foreach ($material as $key => $value) {
            Asset::create($value);
        }
    }
}
