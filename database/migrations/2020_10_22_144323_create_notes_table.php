<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('body');
            $table->string('token')->nullable(false);
            $table->bigInteger('owner_id')->unsigned();
            $table->bigInteger('syntax_id')->unsigned();
            $table->bigInteger('status_id')->unsigned();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));

            $table
                ->foreign('owner_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table
                ->foreign('status_id')
                ->references('id')
                ->on('notes_status')
                ->onDelete('cascade');

            $table
                ->foreign('syntax_id')
                ->references('id')
                ->on('notes_syntax')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
}
