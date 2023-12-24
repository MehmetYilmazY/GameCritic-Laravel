<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('games')->insert([
            'title' => 'Grand Theft Auto VI',
            'studio' => 'Rockstar Games',
            'platform' => 'pc',
            'genre' => 'action',
            'releasedate' => now(),
            'image_url' => 'https://cdn1.ntv.com.tr/gorsel/DkzQiBiDJUihjZvXpZtKQQ.jpg',
            'short_description' => 'Grand Theft Auto VI is an action-adventure game being developed by Rockstar Games. It will be the eighth main Grand Theft Auto game, following Grand Theft Auto V, and the sixteenth game overall.',
            // Diğer sütunları da ekleyebilirsiniz
        ]);
        DB::table('games')->insert([
            'title' => 'Elden Ring',
            'studio' => 'FromSoftware',
            'platform' => 'pc',
            'genre' => 'roleplay',
            'releasedate' => now(),
            'image_url' => 'https://images.2game.com/boxshotcu/66033_A1uHveft_full.jpg',
            'short_description' => 'Elden Ring is a new action-role-playing game developed by FromSoftware and published by Bandai Namco Entertainment.',
        ]);
        DB::table('games')->insert([
            'title' => 'Red Dead Redemption 2',
            'studio' => 'Rockstar Games',
            'platform' => 'pc',
            'genre' => 'action',
            'releasedate' => now(),
            'image_url' => 'https://cdn.akamai.steamstatic.com/steam/apps/1174180/header.jpg?t=1695140956',
            'short_description' => 'The story takes place in 1899 in a fictional representation of the Western, Midwestern, and Southern United States.',
        ]);
        // İsterseniz daha fazla oyun ekleyebilirsiniz.
        DB::table('games')->insert([
            'title' => 'The Witcher 3: Wild Hunt - Game of the Year Edition',
            'studio' => 'CD Projekt RED',
            'platform' => 'pc',
            'genre' => 'roleplay',
            'releasedate' => now(),
            'image_url' => 'https://cdn.akamai.steamstatic.com/steam/apps/292030/header.jpg?t=1693590732',
            'short_description' => 'Geralt has to fight monsters and deal with people of all sorts in order to solve complex problems and settle contentious disputes, each ranging from the personal to the world-changing.',
        ]);
        
        DB::table('games')->insert([
            'title' => 'Grand Theft Auto V',
            'studio' => 'Rockstar Games',
            'platform' => 'pc',
            'genre' => 'action',
            'releasedate' => now(),
            'image_url' => 'https://cdn.akamai.steamstatic.com/steam/apps/271590/header.jpg?t=1695060909',
            'short_description' => 'Grand Theft Auto V is a vast open world game set in Los Santos, a sprawling sun-soaked metropolis struggling to stay afloat in an era of economic uncertainty and cheap reality TV.',
        ]);
        DB::table('games')->insert([
            'title' => 'Minecraft',
            'studio' => 'Mojang Studios',
            'platform' => 'pc',
            'genre' => 'action',
            'releasedate' => now(),
            'image_url' => 'https://cdn2.steamgriddb.com/grid/e353b610e9ce20f963b4cca5da565605.jpg',
            'short_description' => 'Minecraft focuses on allowing the player to explore, interact with, and modify a dynamically-generated map made of one-cubic-meter-sized blocks. ',
        ]);
        DB::table('games')->insert([
            'title' => 'Minecraft Dungeons',
            'studio' => 'Mojang Studios',
            'platform' => 'pc',
            'genre' => 'action',
            'releasedate' => now(),
            'image_url' => 'https://cdn.akamai.steamstatic.com/steam/apps/1672970/header.jpg?t=1666102880',
            'short_description' => 'Minecraft focuses on allowing the player to explore, interact with, and modify a dynamically-generated map made of one-cubic-meter-sized blocks. ',
        ]);
        // Seeder çalıştığında konsola mesaj gönderiyoruz
        $this->command->info('GameSeeder çalıştırıldı, oyunlar eklendi.');
    }
}
