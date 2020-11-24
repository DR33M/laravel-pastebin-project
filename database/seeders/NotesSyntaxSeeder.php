<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotesSyntaxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modes = config('ace-editor.modes');
        $insert = [];

        foreach ($modes as $name => $mode) {
            $insert[] = ['name' => $name, 'mode_name' => $mode];
        }

        DB::table('notes_syntax')->insert($insert);
    }
}
