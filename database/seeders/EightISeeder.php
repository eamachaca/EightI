<?php

namespace Database\Seeders;

use App\Consumer\GutendexConsumer;
use App\Models\Book;
use App\Models\Copyright;
use App\Models\Format;
use App\Models\FormatBook;
use App\Models\MediaType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EightISeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($page = 1; $page < config('eight_i.quantity', 20); $page++) {
            $consumer = new GutendexConsumer($page);
            foreach ($consumer->getResults() as $result) {
                try {
                    DB::beginTransaction();
                    $book = Book::create(['title' => $result->title]);
                    $copyright = Copyright::firstOrCreate(['copy' => json_encode($result->copyright)], ['copy' => json_encode($result->copyright)]);
                    $mediaType = MediaType::firstOrCreate(['type' => $result->media_type], ['type' => $result->media_type]);
                    $book->information()->create(['copyright_id' => $copyright->id, 'media_type_id' => $mediaType->id, 'download_count' => $result->download_count]);
                    foreach ($result->authors as $author) {
                        $book->authors()->firstOrCreate(['name' => $author->name, 'birth_year' => $author->birth_year, 'death_year' => $author->death_year]);
                    }
                    foreach ($result->subjects as $subject) {
                        $book->subjects()->firstOrCreate(['subject' => $subject]);
                    }
                    foreach ($result->languages as $language) {
                        $book->languages()->firstOrCreate(['name' => $language]);
                    }
                    foreach ($result->bookshelves as $bookshelf) {
                        $book->languages()->firstOrCreate(['name' => $bookshelf]);
                    }
                    foreach ($result->formats as $format => $url) {
                        $format = Format::firstOrCreate(['name' => $format]);
                        FormatBook::create(['book_id' => $book->id, 'format_id' => $format->id, 'url' => $url]);
                    }
                    DB::commit();
                } catch (\Exception $exception) {
                    Log::error($exception);
                    DB::rollBack();
                }
            }
        }
    }
}
