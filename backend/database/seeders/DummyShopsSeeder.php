<?php

namespace Database\Seeders;

use App\Models\Shop;
use Illuminate\Database\Seeder;

class DummyShopsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'サンプル太郎',
                'age' => 25,
                'gender_id' => 1
            ],
            [
                'name' => 'サンプル花子',
                'age' => 30,
                'gender_id' => 2
            ],
            [
                'name' => 'サンプル二郎',
                'age' => 20,
                'gender_id' => 1
            ],
        ];

        (new Shop())->query()->insert($data);
    }
}
