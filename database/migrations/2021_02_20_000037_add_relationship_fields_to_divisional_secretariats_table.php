<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDivisionalSecretariatsTable extends Migration
{
    public function up()
    {
        Schema::table('divisional_secretariats', function (Blueprint $table) {
            $table->unsignedBigInteger('district_id');
            $table->foreign('district_id', 'district_fk_3233403')->references('id')->on('districts');
        });
    }
}
