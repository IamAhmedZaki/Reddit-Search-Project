<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('design_configs', function (Blueprint $table) {
            $table->longText('canvasBottomBase64')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('design_configs', function (Blueprint $table) {
            $table->text('canvasBottomBase64')->nullable()->change(); // Revert if needed
        });
    }
};
