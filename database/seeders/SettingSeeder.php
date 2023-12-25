<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            [
                'key' => 'name',
                'value' => 'STIE Wijaya Mulya',
                'created_at' => now()
            ],
            [
                'key' => 'tagline',
                'value' => 'We Create Better Future',
                'created_at' => now()
            ],
            [
                'key' => 'description',
                'value' => '-',
                'created_at' => now()
            ],
            [
                'key' => 'icon',
                'value' => 'files/icon-1616473603.png',
                'created_at' => now()
            ],
            [
                'key' => 'logo',
                'value' => 'files/logo-1616473603.png',
                'created_at' => now()
            ],
            [
                'key' => 'address',
                'value' => 'Jl. Kutai Raya, Sumber, Banjarsari, Surakarta',
                'created_at' => now()
            ],
            [
                'key' => 'phone',
                'value' => '(0271) 716277',
                'created_at' => now()
            ],
            [
                'key' => 'email',
                'value' => 'stie.wijayamulya.solo@gmail.com',
                'created_at' => now()
            ],
            [
                'key' => 'map',
                'value' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d4050206.038797744!2d110.802644!3d-7.544486!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6a09f772f1d8d076!2sSTIE%20Wijaya%20Mulya%20Surakarta!5e0!3m2!1sen!2sus!4v1616486188372!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
                'created_at' => now()
            ],
            [
                'key' => 'direction',
                'value' => 'https://www.google.com/maps/dir//STIE+Wijaya+Mulya+Surakarta,+Telp%2FFax+:+0271-716277,+Jl.+Kutai+Raya,+Sumber,+Banjarsari,+Surakarta+City,+Central+Java+57138,+Indonesia/@-7.544486,110.802644,10z/data=!4m8!4m7!1m0!1m5!1m1!1s0x2e7a141ebc8b7449:0x6a09f772f1d8d076!2m2!1d110.802644!2d-7.544486?hl=en-US',
                'created_at' => now()
            ],
        ]);
    }
}
