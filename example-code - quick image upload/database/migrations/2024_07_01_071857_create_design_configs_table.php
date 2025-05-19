<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('design_configs', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('generated_key')->nullable();
            $table->string('design_name')->nullable();
            $table->string('design_email')->nullable();
            $table->string('select_size')->nullable();
            
            
            $table->text('canvasTop')->nullable();
            $table->text('canvasRight')->nullable();
            $table->text('canvasBottom')->nullable();
            $table->text('canvasLeft')->nullable();
            $table->text('canvas')->nullable();
            $table->text('canvasTopBlack')->nullable();
            $table->text('canvasRightBlack')->nullable();
            $table->text('canvasBottomBlack')->nullable();
            $table->text('canvasLeftBlack')->nullable();
            $table->text('canvasLeftWall')->nullable();
            $table->text('canvasRightWall')->nullable();
            $table->text('canvasBackWall')->nullable();
            $table->text('tableTop')->nullable();
            $table->text('tableRight')->nullable();
            $table->text('tableBottom')->nullable();
            $table->text('tableLeft')->nullable();
            $table->text('tableCentre')->nullable();
            $table->text('flatLeft')->nullable();
            $table->text('flatRight')->nullable();
            $table->string('mainColor1')->nullable();
            $table->string('mainColor2')->nullable();
            $table->string('lefWallStatus')->nullable();
            $table->string('leftWallHeight')->nullable();
            $table->string('rightWallStatus')->nullable();
            $table->string('rightWallHeight')->nullable();
            $table->string('backWallStatus')->nullable();
            $table->text('table_box')->nullable();
            $table->string('leftFlag')->nullable();
            $table->string('rightFlag')->nullable();
            $table->text('canvasBottomBase64')->nullable();
            $table->text('canvasBottomBlackBase64')->nullable();
            $table->text('canvasRight3x4Base64')->nullable();
            $table->text('canvasRightBlack3x4Base64')->nullable();
            $table->text('canvasBottom3x4Base64')->nullable();
            $table->text('canvasBottomBlack3x4Base64')->nullable();
            $table->text('canvasRight3x6Base64')->nullable();
            $table->text('canvasRightBlack3x6Base64')->nullable();
            $table->text('canvasBottom3x6Base64')->nullable();
            $table->text('canvasBottomBlack3x6Base64')->nullable();
            $table->text('tableTopBase64')->nullable();
            $table->text('tableRightBase64')->nullable();
            $table->text('tableCenterBase64')->nullable();
            $table->text('tableLeftBase64')->nullable();
            $table->text('tableBottomBase64')->nullable();
            $table->text('flagLeftBase64')->nullable();
            $table->text('flagRightBase64')->nullable();
            $table->text('canvasLeftHalfWallBase64')->nullable();
            $table->text('canvasLeftFullWallBase64')->nullable();
            $table->text('canvasRightHalfWallBase64')->nullable();
            $table->text('canvasRightFullWallBase64')->nullable();
            $table->text('canvasBackWall3x3Base64')->nullable();
            $table->text('canvasBackWall3x4Base64')->nullable();
            $table->text('canvasBackWall3x6Base64')->nullable();
            $table->longtext('canvasDataValues')->nullable();
            $table->string('leftwall_switch')->nullable();
            $table->string('rightwall_switch')->nullable();
            $table->string('rightWallHeight2')->nullable();
            $table->string('leftWallHeight2')->nullable();
            $table->string('table_boxValue')->nullable();
            $table->string('left_flagValue')->nullable();
            $table->string('right_flagValue')->nullable();
            
            
            $table->longText('configuration_code')->nullable();
            $table->longText('configuration_url')->nullable();
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
        Schema::dropIfExists('design_configs');
    }
}
