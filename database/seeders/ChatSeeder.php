<?php

namespace Database\Seeders;

use App\Models\Chat;
use App\Models\ChatMessage;
use App\Models\ChatMessageImage;
use Faker\Factory as Faker;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Chat::truncate();
        ChatMessage::truncate();
        ChatMessageImage::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = Faker::create('id_ID');

        for ($i=0; $i < 30; $i++) {
            $user = rand(5,7);
            $dokter = rand(2,4);
            $chat = Chat::query()->create([
                'replied' => true,
                'title' => $faker->words($nb = 5, $asText = true),
                'category' =>  $faker->randomElement(['Dinas', 'Kucing', 'Sapi', 'Kambing']),
                'created_by' => $user
            ]);
            for ($j = 0; $j < 5; $j++) {
                if ($j % 2 == 0) {
                    $id = $user;
                } else {
                    $id = $dokter;
                }
                $chat->messages()->create([
                    'chat_id' => $chat->id,
                    'user_id' => $id,
                    'message' => $faker->words($nb = 9, $asText = true),
                ]);
            }
        }
        for ($i=0; $i < 10; $i++) {
            $user = rand(5,7);
            $chat = Chat::query()->create([
                'replied' => false,
                'title' => $faker->words($nb = 5, $asText = true),
                'category' =>  $faker->randomElement(['Dinas', 'Kucing', 'Sapi', 'Kambing']),
                'created_by' => $user
            ]);
            $chat->messages()->create([
                'chat_id' => $chat->id,
                'user_id' => $user,
                'message' => $faker->words($nb = 9, $asText = true),
            ]);
        }
    }
}
