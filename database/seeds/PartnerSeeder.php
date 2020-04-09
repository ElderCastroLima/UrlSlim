<?php

use App\Partners;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Partners::query()->truncate();
        Partners::create([
            'partner' => 'Partner 1',
            'secret_key' => Hash::make('3fcG*KD4yT3C2EdU^*SzBdk3')
        ]);

        Partners::create([
            'partner' => 'Partner 2',
            'secret_key' => Hash::make('SkfSXaT$0!DiTdt#KYJOH5%i')
        ]);
    }
}
