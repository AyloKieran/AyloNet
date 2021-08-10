<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDecisionMakerSavedListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('decision_maker_saved_lists', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name');
            $table->longtext('list');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('decision_maker_saved_lists');
    }
}
