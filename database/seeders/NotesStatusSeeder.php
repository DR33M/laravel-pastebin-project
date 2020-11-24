<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotesStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notes_status')->insert([
            ['name' => 'public'],
            ['name' => 'unlisted'],
            ['name' => 'private']
        ]);
    }
}
