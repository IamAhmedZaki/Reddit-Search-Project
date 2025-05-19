<?php

namespace App\Http\Controllers;

use App\Models\Font;
use Illuminate\Support\Str;
use App\Models\DesignConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class DesignConfigController extends Controller
{
    private function generateCode($length = 20)
    {
        return substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / 62))), 0, $length);
    }
    private function generateUniqueCode($table, $column, $length = 20)
    {
        do {
            $code = $this->generateCode($length);
        } while (DB::table($table)->where($column, $code)->exists());

        return $code;
    }

    public function copy_url_clipboard(Request $request)
    {
        $table = 'design_configs';
        $column = 'configuration_code';
        $uniqueCode = $this->generateUniqueCode($table, $column);

        $store = new DesignConfig();
        $store->user_id = auth()->id();
        $store->configuration_code = $uniqueCode;
        $store->configuration_url = $request->query_string;
        $store->save();

        $configurationUrl = url('/') . "?" . $uniqueCode;
        return ["status" => true, "configurationUrl" => $configurationUrl];
    }


    public function user_config()
    {
        $size = Session::get('size');
        $color1 = Session::get('color1');
        $color2 = Session::get('color2');
        if (Session::has('user_id_get')) {
            $randomValue = Str::random(10);
            $generated_key = Session::get('random_value');
            if (empty($generated_key)) {
                $get_user_id = Session::get('user_id_get');
                Session::put('random_value', $randomValue);
                $design = new DesignConfig();
                $design->user_id = $get_user_id;
                $design->generated_key = $randomValue;
                $design->select_size = $size;
                $design->save();
            } else {
                $generated_key = Session::get('random_value');
                $design = DesignConfig::where('generated_key', $generated_key)->first();
                if ($design) {

                    $columns = [
                        'canvasTop',
                        'canvasRight',
                        'canvasBottom',
                        'canvasLeft',
                        'canvasTopBlack',
                        'canvasRightBlack',
                        'canvasBottomBlack',
                        'canvasLeftBlack',
                        'canvasLeftWall',
                        'canvasRightWall',
                        'canvasBackWall',
                        'tableTop',
                        'tableRight',
                        'tableBottom',
                        'tableLeft',
                        'tableCenter',
                        'flatLeft',
                        'flatRight'
                    ];

                    $emptyColumns = [];
                    foreach ($columns as $column) {
                        if (empty($design->$column)) {
                            $emptyColumns[] = $column;
                        }
                    }
                    if (empty($emptyColumns)) {
                        Session::forget('random_value');
                        $randomValue = Str::random(10);
                        $generated_key = Session::get('random_value');
                        Session::put('random_value', $randomValue);
                        $get_user_id = Session::get('user_id_get');
                        Session::put('random_value', $randomValue);
                        $design = new DesignConfig();
                        $design->user_id = $get_user_id;
                        $design->generated_key = $randomValue;
                        $design->save();
                    } else {
                    }
                }
            }
            $fonts =  Font::get();
            return view('web.config', ['size' => $size, 'color1' => $color1, 'color2' => $color2, 'fonts' => $fonts]);
        } else {
            return redirect()->route('login');
        }
    }

    public function saveCanvas(Request $request)
    {

        $generated_key = Session::get('random_value');
        $updateDesign = DesignConfig::where('generated_key', $generated_key)->first();
        dd($updateDesign);
        if($updateDesign) {
            $updateDesign->select_size = $request->select_size;
            $updateDesign->mainColor1 = $request->mainColor1;
            $updateDesign->mainColor2 = $request->mainColor2;
            $updateDesign->lefWallStatus = $request->lefWallStatus;
            $updateDesign->leftWallHeight = $request->leftWallHeight;
            $updateDesign->rightWallStatus = $request->rightWallStatus;
            $updateDesign->rightWallHeight = $request->rightWallHeight;
            $updateDesign->backWallStatus = $request->backWallStatus;
            $updateDesign->table_box = $request->table_box;
            $updateDesign->leftFlag = $request->leftFlag;
            $updateDesign->rightFlag = $request->rightFlag;
    
            $updateDesign->canvasBottomBase64 = $request->canvasBottomBase64;
            $updateDesign->canvasBottomBlackBase64 = $request->canvasBottomBlackBase64;
            $updateDesign->canvasRight3x4Base64 = $request->canvasRight3x4Base64;
            $updateDesign->canvasRightBlack3x4Base64 = $request->canvasRightBlack3x4Base64;
            $updateDesign->canvasBottom3x4Base64 = $request->canvasBottom3x4Base64;
            $updateDesign->canvasBottomBlack3x4Base64 = $request->canvasBottomBlack3x4Base64;
            $updateDesign->canvasRight3x6Base64 = $request->canvasRight3x6Base64;
            $updateDesign->canvasRightBlack3x6Base64 = $request->canvasRightBlack3x6Base64;
            $updateDesign->canvasBottom3x6Base64 = $request->canvasBottom3x6Base64;
            $updateDesign->canvasBottomBlack3x6Base64 = $request->canvasBottomBlack3x6Base64;
            $updateDesign->tableTopBase64 = $request->tableTopBase64;
            $updateDesign->tableRightBase64 = $request->tableRightBase64;
            $updateDesign->tableCenterBase64 = $request->tableCenterBase64;
            $updateDesign->tableLeftBase64 = $request->tableLeftBase64;
            $updateDesign->tableBottomBase64 = $request->tableBottomBase64;
            $updateDesign->flagLeftBase64 = $request->flagLeftBase64;
            $updateDesign->flagRightBase64 = $request->flagRightBase64;
            $updateDesign->canvasLeftHalfWallBase64 = $request->canvasLeftHalfWallBase64;
            $updateDesign->canvasLeftFullWallBase64 = $request->canvasLeftFullWallBase64;
            $updateDesign->canvasRightHalfWallBase64 = $request->canvasRightHalfWallBase64;
            $updateDesign->canvasRightFullWallBase64 = $request->canvasRightFullWallBase64;
            $updateDesign->canvasBackWall3x3Base64 = $request->canvasBackWall3x3Base64;
            $updateDesign->canvasBackWall3x4Base64 = $request->canvasBackWall3x4Base64;
            $updateDesign->canvasBackWall3x6Base64 = $request->canvasBackWall3x6Base64;
            $updateDesign->canvasDataValues = $request->canvasDataValues;

            $updateDesign->leftwall_switch = $request->leftwall_switch;
            $updateDesign->rightwall_switch = $request->rightwall_switch;
            $updateDesign->rightWallHeight = $request->rightWallHeight;
            $updateDesign->leftWallHeight = $request->leftWallHeight;
            $updateDesign->table_boxValue = $request->table_boxValue;
            $updateDesign->left_flagValue = $request->left_flagValue;
            $updateDesign->right_flagValue = $request->right_flagValue;

            $updateDesign->save();
        } else {
            $generated_key = Session::get('random_value');
            $updateDesign = new DesignConfig();
            $updateDesign->generated_key = $generated_key;
            $updateDesign->user_id = auth()->id();
            $updateDesign->select_size = $request->select_size;
            $updateDesign->mainColor1 = $request->mainColor1;
            $updateDesign->mainColor2 = $request->mainColor2;
            $updateDesign->lefWallStatus = $request->lefWallStatus;
            $updateDesign->leftWallHeight = $request->leftWallHeight;
            $updateDesign->rightWallStatus = $request->rightWallStatus;
            $updateDesign->rightWallHeight = $request->rightWallHeight;
            $updateDesign->backWallStatus = $request->backWallStatus;
            $updateDesign->table_box = $request->table_box;
            $updateDesign->leftFlag = $request->leftFlag;
            $updateDesign->rightFlag = $request->rightFlag;
    
            $updateDesign->canvasBottomBase64 = $request->canvasBottomBase64;
            $updateDesign->canvasBottomBlackBase64 = $request->canvasBottomBlackBase64;
            $updateDesign->canvasRight3x4Base64 = $request->canvasRight3x4Base64;
            $updateDesign->canvasRightBlack3x4Base64 = $request->canvasRightBlack3x4Base64;
            $updateDesign->canvasBottom3x4Base64 = $request->canvasBottom3x4Base64;
            $updateDesign->canvasBottomBlack3x4Base64 = $request->canvasBottomBlack3x4Base64;
            $updateDesign->canvasRight3x6Base64 = $request->canvasRight3x6Base64;
            $updateDesign->canvasRightBlack3x6Base64 = $request->canvasRightBlack3x6Base64;
            $updateDesign->canvasBottom3x6Base64 = $request->canvasBottom3x6Base64;
            $updateDesign->canvasBottomBlack3x6Base64 = $request->canvasBottomBlack3x6Base64;
            $updateDesign->tableTopBase64 = $request->tableTopBase64;
            $updateDesign->tableRightBase64 = $request->tableRightBase64;
            $updateDesign->tableCenterBase64 = $request->tableCenterBase64;
            $updateDesign->tableLeftBase64 = $request->tableLeftBase64;
            $updateDesign->tableBottomBase64 = $request->tableBottomBase64;
            $updateDesign->flagLeftBase64 = $request->flagLeftBase64;
            $updateDesign->flagRightBase64 = $request->flagRightBase64;
            $updateDesign->canvasLeftHalfWallBase64 = $request->canvasLeftHalfWallBase64;
            $updateDesign->canvasLeftFullWallBase64 = $request->canvasLeftFullWallBase64;
            $updateDesign->canvasRightHalfWallBase64 = $request->canvasRightHalfWallBase64;
            $updateDesign->canvasRightFullWallBase64 = $request->canvasRightFullWallBase64;
            $updateDesign->canvasBackWall3x3Base64 = $request->canvasBackWall3x3Base64;
            $updateDesign->canvasBackWall3x4Base64 = $request->canvasBackWall3x4Base64;
            $updateDesign->canvasBackWall3x6Base64 = $request->canvasBackWall3x6Base64;
            $updateDesign->canvasDataValues = $request->canvasDataValues;

            $updateDesign->leftwall_switch = $request->leftwall_switch;
            $updateDesign->rightwall_switch = $request->rightwall_switch;
            $updateDesign->rightWallHeight2 = $request->rightWallHeight;
            $updateDesign->leftWallHeight2 = $request->leftWallHeight;
            $updateDesign->table_boxValue = $request->table_boxValue;
            $updateDesign->left_flagValue = $request->left_flagValue;
            $updateDesign->right_flagValue = $request->right_flagValue;

            $updateDesign->save();
            Session::set('random_value',$updateDesign->generated_key); 
        }
        return ["url" => $updateDesign->generated_key];
        return response()->json(['success' => true]);
    }
    public function saveCanvasUpdate(Request $request)
{
    // Try to find the DesignConfig entry
    Log::info('Full Request:', ['request' => $request->all()]);
    if (!$request->has('id')) {
        return response()->json([
            'error' => 'ID is missing from the request',
            'request_data' => $request->all()
        ], 400);
    }
    $updateDesign = DesignConfig::where('design_config_id', $request->id)->first();

    // Debugging: Check if $updateDesign is null
    if (!$updateDesign) {
        return response()->json([
            'error' => 'DesignConfig not found for the given ID',
            'requested_id' => $request->id
        ], 404);
    }

    // Debugging: Check the existing data in the found record
    Log::info('Found DesignConfig:', $updateDesign->toArray());

    // Debugging: Check if generated_key is NULL
    if ($updateDesign->generated_key === null) {
        return response()->json([
            'error' => 'generated_key is NULL in the database',
            'record_id' => $updateDesign->id
        ], 500);
    }

    // Update the existing record
    $updateDesign->select_size = $request->select_size;
    $updateDesign->mainColor1 = $request->mainColor1;
    $updateDesign->mainColor2 = $request->mainColor2;
    $updateDesign->lefWallStatus = $request->lefWallStatus;
    $updateDesign->leftWallHeight = $request->leftWallHeight;
    $updateDesign->rightWallStatus = $request->rightWallStatus;
    $updateDesign->rightWallHeight = $request->rightWallHeight;
    $updateDesign->backWallStatus = $request->backWallStatus;
    $updateDesign->table_box = $request->table_box;
    $updateDesign->leftFlag = $request->leftFlag;
    $updateDesign->rightFlag = $request->rightFlag;

    $updateDesign->canvasBottomBase64 = $request->canvasBottomBase64;
    $updateDesign->canvasBottomBlackBase64 = $request->canvasBottomBlackBase64;
    $updateDesign->canvasRight3x4Base64 = $request->canvasRight3x4Base64;
    $updateDesign->canvasRightBlack3x4Base64 = $request->canvasRightBlack3x4Base64;
    $updateDesign->canvasBottom3x4Base64 = $request->canvasBottom3x4Base64;
    $updateDesign->canvasBottomBlack3x4Base64 = $request->canvasBottomBlack3x4Base64;
    $updateDesign->canvasRight3x6Base64 = $request->canvasRight3x6Base64;
    $updateDesign->canvasRightBlack3x6Base64 = $request->canvasRightBlack3x6Base64;
    $updateDesign->canvasBottom3x6Base64 = $request->canvasBottom3x6Base64;
    $updateDesign->canvasBottomBlack3x6Base64 = $request->canvasBottomBlack3x6Base64;
    $updateDesign->tableTopBase64 = $request->tableTopBase64;
    $updateDesign->tableRightBase64 = $request->tableRightBase64;
    $updateDesign->tableCenterBase64 = $request->tableCenterBase64;
    $updateDesign->tableLeftBase64 = $request->tableLeftBase64;
    $updateDesign->tableBottomBase64 = $request->tableBottomBase64;
    $updateDesign->flagLeftBase64 = $request->flagLeftBase64;
    $updateDesign->flagRightBase64 = $request->flagRightBase64;
    $updateDesign->canvasLeftHalfWallBase64 = $request->canvasLeftHalfWallBase64;
    $updateDesign->canvasLeftFullWallBase64 = $request->canvasLeftFullWallBase64;
    $updateDesign->canvasRightHalfWallBase64 = $request->canvasRightHalfWallBase64;
    $updateDesign->canvasRightFullWallBase64 = $request->canvasRightFullWallBase64;
    $updateDesign->canvasBackWall3x3Base64 = $request->canvasBackWall3x3Base64;
    $updateDesign->canvasBackWall3x4Base64 = $request->canvasBackWall3x4Base64;
    $updateDesign->canvasBackWall3x6Base64 = $request->canvasBackWall3x6Base64;
    $updateDesign->canvasDataValues = $request->canvasDataValues;

    $updateDesign->leftwall_switch = $request->leftwall_switch;
    $updateDesign->rightwall_switch = $request->rightwall_switch;
    $updateDesign->rightWallHeight = $request->rightWallHeight;
    $updateDesign->leftWallHeight = $request->leftWallHeight;
    $updateDesign->table_boxValue = $request->table_boxValue;
    $updateDesign->left_flagValue = $request->left_flagValue;
    $updateDesign->right_flagValue = $request->right_flagValue;

    // Save the updated record
    $updateDesign->save();

    // Return success response with generated_key
    return response()->json([
        'success' => true,
        'url' => $updateDesign->generated_key
    ]);
}

    


    public function getBase64Data()
    {
        $generated_key = Session::get('random_value');
        $design = DesignConfig::where('generated_key', $generated_key)->first();
        // $design = DesignConfig::where('generated_key', '39h1EIrwnF')->first();
        $select_size = $design->select_size;

        if ($design) {
            if ($select_size == "3x3") {
                $data = [
                    'canvasTop' => $design->canvasBottom,
                    'canvasRight' => $design->canvasRight,
                    'canvasBottom' => $design->canvasBottom,
                    'canvasLeft' => $design->canvasRight,
                    'canvasTopBlack' => $design->canvasBottomBlack,
                    'canvasRightBlack' => $design->canvasRightBlack,
                    'canvasBottomBlack' => $design->canvasBottomBlack,
                    'canvasLeftBlack' => $design->canvasRightBlack,
                    'canvasLeftHalfWall' => $design->canvasLeftHalfWall,
                    'canvasLeftFullWall' => $design->canvasLeftFullWall,
                    'canvasRightHalfWall' => $design->canvasRightHalfWall,
                    'canvasRightFullWall' => $design->canvasRightFullWall,
                    'canvasBackWall' => $design->canvasBackWall,
                    'tableTop' => $design->tableTop,
                    'tableRight' => $design->tableRight,
                    'tableBottom' => $design->tableBottom,
                    'tableLeft' => $design->tableLeft,
                    'tableCenter' => $design->tableCenter,
                    'flatLeft' => $design->flatLeft,
                    'flatRight' => $design->flatRight,
                ];
            } else if ($select_size == "3x4") {
                $data = [
                    'canvasTop' => $design->canvasBottom3x4,
                    'canvasRight' => $design->canvasRight3x4,
                    'canvasBottom' => $design->canvasBottom3x4,
                    'canvasLeft' => $design->canvasRight3x4,
                    'canvasTopBlack' => $design->canvasBottomBlack3x4,
                    'canvasRightBlack' => $design->canvasRightBlack3x4,
                    'canvasBottomBlack' => $design->canvasBottomBlack3x4,
                    'canvasLeftBlack' => $design->canvasRightBlack3x4,
                    'canvasLeftHalfWall' => $design->canvasLeftHalfWall,
                    'canvasLeftFullWall' => $design->canvasLeftFullWall,
                    'canvasRightHalfWall' => $design->canvasRightHalfWall,
                    'canvasRightFullWall' => $design->canvasRightFullWall,
                    'canvasBackWall' => $design->canvasBackWall,
                    'tableTop' => $design->tableTop,
                    'tableRight' => $design->tableRight,
                    'tableBottom' => $design->tableBottom,
                    'tableLeft' => $design->tableLeft,
                    'tableCenter' => $design->tableCenter,
                    'flatLeft' => $design->flatLeft,
                    'flatRight' => $design->flatRight,
                ];
            } else if ($select_size == "3x6") {
                $data = [
                    'canvasTop' => $design->canvasBottom3x6,
                    'canvasRight' => $design->canvasRight3x6,
                    'canvasBottom' => $design->canvasBottom3x6,
                    'canvasLeft' => $design->canvasRight3x6,
                    'canvasTopBlack' => $design->canvasBottomBlack3x6,
                    'canvasRightBlack' => $design->canvasRightBlack3x6,
                    'canvasBottomBlack' => $design->canvasBottomBlack3x6,
                    'canvasLeftBlack' => $design->canvasRightBlack3x6,
                    'canvasLeftHalfWall' => $design->canvasLeftHalfWall,
                    'canvasLeftFullWall' => $design->canvasLeftFullWall,
                    'canvasRightHalfWall' => $design->canvasRightHalfWall,
                    'canvasRightFullWall' => $design->canvasRightFullWall,
                    'canvasBackWall' => $design->canvasBackWall,
                    'tableTop' => $design->tableTop,
                    'tableRight' => $design->tableRight,
                    'tableBottom' => $design->tableBottom,
                    'tableLeft' => $design->tableLeft,
                    'tableCenter' => $design->tableCenter,
                    'flatLeft' => $design->flatLeft,
                    'flatRight' => $design->flatRight,
                ];
            }
            return response()->json($data);
        }
        return response()->json(['error' => 'Design not found'], 404);
    }

    public function canvaImgset(Request $request)
    {
        $WallImage = $request->input('WallImage');
        $canvas = $request->input('canvas');
        $generated_key = Session::get('random_value');
        DesignConfig::where('generated_key', $generated_key)->update([$canvas =>  $WallImage]);
        return response()->json(['success' => true]);
    }

    public function formsubmitDesign(Request $request)
    {

        $generated_key = Session::get('random_value');
        $updateDesign = DesignConfig::where('generated_key', $generated_key)->first();
        // dd("formsubmitDesign",$updateDesign);
        if($updateDesign) {
            $updateDesign->design_name = $request->design_name;
            $updateDesign->design_email = $request->design_email;
    
            $updateDesign->select_size = $request->select_size;
            $updateDesign->mainColor1 = $request->mainColor1;
            $updateDesign->mainColor2 = $request->mainColor2;
            $updateDesign->lefWallStatus = $request->lefWallStatus;
            $updateDesign->leftWallHeight = $request->leftWallHeight;
            $updateDesign->rightWallStatus = $request->rightWallStatus;
            $updateDesign->rightWallHeight = $request->rightWallHeight;
            $updateDesign->backWallStatus = $request->backWallStatus;
            $updateDesign->table_box = $request->table_box;
            $updateDesign->leftFlag = $request->leftFlag;
            $updateDesign->rightFlag = $request->rightFlag;
    
            $updateDesign->canvasBottomBase64 = $request->canvasBottomBase64;
            $updateDesign->canvasBottomBlackBase64 = $request->canvasBottomBlackBase64;
            $updateDesign->canvasRight3x4Base64 = $request->canvasRight3x4Base64;
            $updateDesign->canvasRightBlack3x4Base64 = $request->canvasRightBlack3x4Base64;
            $updateDesign->canvasBottom3x4Base64 = $request->canvasBottom3x4Base64;
            $updateDesign->canvasBottomBlack3x4Base64 = $request->canvasBottomBlack3x4Base64;
            $updateDesign->canvasRight3x6Base64 = $request->canvasRight3x6Base64;
            $updateDesign->canvasRightBlack3x6Base64 = $request->canvasRightBlack3x6Base64;
            $updateDesign->canvasBottom3x6Base64 = $request->canvasBottom3x6Base64;
            $updateDesign->canvasBottomBlack3x6Base64 = $request->canvasBottomBlack3x6Base64;
            $updateDesign->tableTopBase64 = $request->tableTopBase64;
            $updateDesign->tableRightBase64 = $request->tableRightBase64;
            $updateDesign->tableCenterBase64 = $request->tableCenterBase64;
            $updateDesign->tableLeftBase64 = $request->tableLeftBase64;
            $updateDesign->tableBottomBase64 = $request->tableBottomBase64;
            $updateDesign->flagLeftBase64 = $request->flagLeftBase64;
            $updateDesign->flagRightBase64 = $request->flagRightBase64;
            $updateDesign->canvasLeftHalfWallBase64 = $request->canvasLeftHalfWallBase64;
            $updateDesign->canvasLeftFullWallBase64 = $request->canvasLeftFullWallBase64;
            $updateDesign->canvasRightHalfWallBase64 = $request->canvasRightHalfWallBase64;
            $updateDesign->canvasRightFullWallBase64 = $request->canvasRightFullWallBase64;
            $updateDesign->canvasBackWall3x3Base64 = $request->canvasBackWall3x3Base64;
            $updateDesign->canvasBackWall3x4Base64 = $request->canvasBackWall3x4Base64;
            $updateDesign->canvasBackWall3x6Base64 = $request->canvasBackWall3x6Base64;
    
            $updateDesign->canvasDataValues = $request->canvasDataValues;

            $updateDesign->leftwall_switch = $request->leftwall_switch;
            $updateDesign->rightwall_switch = $request->rightwall_switch;
            $updateDesign->rightWallHeight2 = $request->rightWallHeight;
            $updateDesign->leftWallHeight2 = $request->leftWallHeight;
            $updateDesign->table_boxValue = $request->table_boxValue;
            $updateDesign->left_flagValue = $request->left_flagValue;
            $updateDesign->right_flagValue = $request->right_flagValue;
            $updateDesign->save();
        } else {
            $updateDesign = new DesignConfig();
            $updateDesign->design_name = $request->design_name;
            $updateDesign->design_email = $request->design_email;
            $updateDesign->generated_key = $generated_key;
            $updateDesign->user_id = auth()->id();
    
            $updateDesign->select_size = $request->select_size;
            $updateDesign->mainColor1 = $request->mainColor1;
            $updateDesign->mainColor2 = $request->mainColor2;
            $updateDesign->lefWallStatus = $request->lefWallStatus;
            $updateDesign->leftWallHeight = $request->leftWallHeight;
            $updateDesign->rightWallStatus = $request->rightWallStatus;
            $updateDesign->rightWallHeight = $request->rightWallHeight;
            $updateDesign->backWallStatus = $request->backWallStatus;
            $updateDesign->table_box = $request->table_box;
            $updateDesign->leftFlag = $request->leftFlag;
            $updateDesign->rightFlag = $request->rightFlag;
    
            $updateDesign->canvasBottomBase64 = $request->canvasBottomBase64;
            $updateDesign->canvasBottomBlackBase64 = $request->canvasBottomBlackBase64;
            $updateDesign->canvasRight3x4Base64 = $request->canvasRight3x4Base64;
            $updateDesign->canvasRightBlack3x4Base64 = $request->canvasRightBlack3x4Base64;
            $updateDesign->canvasBottom3x4Base64 = $request->canvasBottom3x4Base64;
            $updateDesign->canvasBottomBlack3x4Base64 = $request->canvasBottomBlack3x4Base64;
            $updateDesign->canvasRight3x6Base64 = $request->canvasRight3x6Base64;
            $updateDesign->canvasRightBlack3x6Base64 = $request->canvasRightBlack3x6Base64;
            $updateDesign->canvasBottom3x6Base64 = $request->canvasBottom3x6Base64;
            $updateDesign->canvasBottomBlack3x6Base64 = $request->canvasBottomBlack3x6Base64;
            $updateDesign->tableTopBase64 = $request->tableTopBase64;
            $updateDesign->tableRightBase64 = $request->tableRightBase64;
            $updateDesign->tableCenterBase64 = $request->tableCenterBase64;
            $updateDesign->tableLeftBase64 = $request->tableLeftBase64;
            $updateDesign->tableBottomBase64 = $request->tableBottomBase64;
            $updateDesign->flagLeftBase64 = $request->flagLeftBase64;
            $updateDesign->flagRightBase64 = $request->flagRightBase64;
            $updateDesign->canvasLeftHalfWallBase64 = $request->canvasLeftHalfWallBase64;
            $updateDesign->canvasLeftFullWallBase64 = $request->canvasLeftFullWallBase64;
            $updateDesign->canvasRightHalfWallBase64 = $request->canvasRightHalfWallBase64;
            $updateDesign->canvasRightFullWallBase64 = $request->canvasRightFullWallBase64;
            $updateDesign->canvasBackWall3x3Base64 = $request->canvasBackWall3x3Base64;
            $updateDesign->canvasBackWall3x4Base64 = $request->canvasBackWall3x4Base64;
            $updateDesign->canvasBackWall3x6Base64 = $request->canvasBackWall3x6Base64;
            $updateDesign->canvasDataValues = $request->canvasDataValues;

            $updateDesign->leftwall_switch = $request->leftwall_switch;
            $updateDesign->rightwall_switch = $request->rightwall_switch;
            $updateDesign->rightWallHeight2 = $request->rightWallHeight;
            $updateDesign->leftWallHeight2 = $request->leftWallHeight;
            $updateDesign->table_boxValue = $request->table_boxValue;
            $updateDesign->left_flagValue = $request->left_flagValue;
            $updateDesign->right_flagValue = $request->right_flagValue;
    
            $updateDesign->save();
        }
        Session::forget('random_value');  
        return redirect()->route('your_design');
        return response()->json(['success' => true]);
    }
    public function formsubmitDesignUpdate(Request $request)
    {
        \Log::info('Received design_config_id: ' . $request->id);
        // try {
        $updateDesign = DesignConfig::where('design_config_id', $request->id)->first();
        // if (!$updateDesign) {
        //     return response()->json(['success' => false, 'message' => 'Design not found'], 404);
    
        // }
        if($updateDesign) {
            $updateDesign->design_name = $request->design_name;
            $updateDesign->design_email = $request->design_email;
    
            $updateDesign->select_size = $request->select_size;
            $updateDesign->mainColor1 = $request->mainColor1;
            $updateDesign->mainColor2 = $request->mainColor2;
            $updateDesign->lefWallStatus = $request->lefWallStatus;
            $updateDesign->leftWallHeight = $request->leftWallHeight;
            $updateDesign->rightWallStatus = $request->rightWallStatus;
            $updateDesign->rightWallHeight = $request->rightWallHeight;
            $updateDesign->backWallStatus = $request->backWallStatus;
            $updateDesign->table_box = $request->table_box;
            $updateDesign->leftFlag = $request->leftFlag;
            $updateDesign->rightFlag = $request->rightFlag;
    
            $updateDesign->canvasBottomBase64 = $request->canvasBottomBase64;
            $updateDesign->canvasBottomBlackBase64 = $request->canvasBottomBlackBase64;
            $updateDesign->canvasRight3x4Base64 = $request->canvasRight3x4Base64;
            $updateDesign->canvasRightBlack3x4Base64 = $request->canvasRightBlack3x4Base64;
            $updateDesign->canvasBottom3x4Base64 = $request->canvasBottom3x4Base64;
            $updateDesign->canvasBottomBlack3x4Base64 = $request->canvasBottomBlack3x4Base64;
            $updateDesign->canvasRight3x6Base64 = $request->canvasRight3x6Base64;
            $updateDesign->canvasRightBlack3x6Base64 = $request->canvasRightBlack3x6Base64;
            $updateDesign->canvasBottom3x6Base64 = $request->canvasBottom3x6Base64;
            $updateDesign->canvasBottomBlack3x6Base64 = $request->canvasBottomBlack3x6Base64;
            $updateDesign->tableTopBase64 = $request->tableTopBase64;
            $updateDesign->tableRightBase64 = $request->tableRightBase64;
            $updateDesign->tableCenterBase64 = $request->tableCenterBase64;
            $updateDesign->tableLeftBase64 = $request->tableLeftBase64;
            $updateDesign->tableBottomBase64 = $request->tableBottomBase64;
            $updateDesign->flagLeftBase64 = $request->flagLeftBase64;
            $updateDesign->flagRightBase64 = $request->flagRightBase64;
            $updateDesign->canvasLeftHalfWallBase64 = $request->canvasLeftHalfWallBase64;
            $updateDesign->canvasLeftFullWallBase64 = $request->canvasLeftFullWallBase64;
            $updateDesign->canvasRightHalfWallBase64 = $request->canvasRightHalfWallBase64;
            $updateDesign->canvasRightFullWallBase64 = $request->canvasRightFullWallBase64;
            $updateDesign->canvasBackWall3x3Base64 = $request->canvasBackWall3x3Base64;
            $updateDesign->canvasBackWall3x4Base64 = $request->canvasBackWall3x4Base64;
            $updateDesign->canvasBackWall3x6Base64 = $request->canvasBackWall3x6Base64;
    
            $updateDesign->canvasDataValues = $request->canvasDataValues;

            $updateDesign->leftwall_switch = $request->leftwall_switch;
            $updateDesign->rightwall_switch = $request->rightwall_switch;
            $updateDesign->rightWallHeight2 = $request->rightWallHeight;
            $updateDesign->leftWallHeight2 = $request->leftWallHeight;
            $updateDesign->table_boxValue = $request->table_boxValue;
            $updateDesign->left_flagValue = $request->left_flagValue;
            $updateDesign->right_flagValue = $request->right_flagValue;
            
            $saved=$updateDesign->save();
            if (!$saved) {
                return response()->json(['success' => false, 'message' => 'Failed to save changes']);
            }
        
        return response()->json(['success' => true]);
        }
        // catch (\Exception $e) {
        //     return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        // }
    }

    public function homeSizeColor(Request $request)
    {
        if (empty($request->size)) {
            Session::put('size', "3x3");
        } else {
            Session::put('size', $request->size);
        }

        Session::put('color1', $request->color1);
        Session::put('color2', $request->color2);
        return response()->json(['success' => true]);
    }

    public function view_design(Request $request, $key, $id)
{
    
    $decryptedId = Crypt::decrypt($id);

    $design = DesignConfig::where('design_config_id', $decryptedId)->where('generated_key', $key)->first();
    
    return view('admin.view_design', ['design' => $design]);
}

    public function expired_design($Gkey){
        if($Gkey){
            return view('admin.expired_design');
        }
        else{
            return redirect()->route('login');
        }

    }

    public function upload_images(Request $request) {
        if ($request->hasFile('default_image')) {
            $image = $request->file('default_image');

            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images_default'), $imageName);
            $imageUrl = asset('images_default/' . $imageName);
            Session::put('image_url', $imageUrl);
            return response()->json(['success' => true, 'image_url' => $imageUrl]);
        }
    }
}
