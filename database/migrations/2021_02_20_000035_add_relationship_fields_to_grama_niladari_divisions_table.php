<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToGramaNiladariDivisionsTable extends Migration
{
    public function up()
    {
        Schema::table('grama_niladari_divisions', function (Blueprint $table) {
            $table->unsignedBigInteger('divisional_secretariat_id');
            $table->foreign('divisional_secretariat_id', 'divisional_secretariat_fk_3233517')->references('id')->on('divisional_secretariats');
        });
    }
}
