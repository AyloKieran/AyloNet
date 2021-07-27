<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadsTable extends Migration
{
    public function up()
    {
        Schema::create('uploads', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->longtext('uploadUrl');
            $table->uuid('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('uploads');
    }
}
