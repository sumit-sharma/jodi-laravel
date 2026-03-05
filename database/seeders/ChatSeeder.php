<?php

namespace Database\Seeders;

use App\Models\Chat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        echo nl2br("start chat import\n");

        $batchSize = 1000;
        $bulkInsert = [];
        $count = 0;

        DB::table('old_jodi.chat')
            ->orderBy('sno')
            ->cursor()
            ->each(function ($chat) use (&$bulkInsert, &$count, $batchSize) {

                $sender = (int) substr($chat->msgfrom, strpos($chat->msgfrom, '(') + 1, -1);
                $receiver = (int) substr($chat->msgto, strpos($chat->msgto, '(') + 1, -1);

                $bulkInsert[] = [
                    // '_id'   => $chat->sno,
                    'sender'    => $sender,
                    'receiver'    => $receiver,
                    'msgfrom'    => $chat->msgfrom,
                    'msgto'    => $chat->msgto,
                    'message'    => $chat->message,
                    'createdAt'    => $chat->dated . ' ' . $chat->time,
                    'read'    => true,
                ];

                $count++;

                if (count($bulkInsert) === $batchSize) {
                    Chat::insert($bulkInsert);

                    $bulkInsert = [];
                    echo "Inserted: {$count}\n";
                }
            });

        // Insert remaining
        if (!empty($bulkInsert)) {
            Chat::insert($bulkInsert);
        }

        echo nl2br("Migration completed. Total: {$count}\n");
    }
}
