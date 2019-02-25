<?php

use Illuminate\Database\Seeder;

class PrecosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = [
            [
                'dia' => '0', // domingo feira
                'valor_diaria' => 150,
                'valor_garagem' => 20,
            ],
            [
                'dia' => '1', // segunda feira
                'valor_diaria' => 120,
                'valor_garagem' => 15,
            ],
            [
                'dia' => '2',// terça feira
                'valor_diaria' => 120,
                'valor_garagem' => 15,
            ],
            [
                'dia' => '3', // quarta feira
                'valor_diaria' => 120,
                'valor_garagem' => 15,
            ],
            [
                'dia' => '4', // quinta feira
                'valor_diaria' => 120,
                'valor_garagem' => 15,
            ],
            [
                'dia' =>'5', // sexta feira
                'valor_diaria' => 120,
                'valor_garagem' => 15,
            ],
            [
                'dia' => '6', // sábado
                'valor_diaria' => 150,
                'valor_garagem' => 20,
            ]
        ];

        foreach ($values as $data) {
            DB::table('preco')->insert($data);
        }
    }
}
