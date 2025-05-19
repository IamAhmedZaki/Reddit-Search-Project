<?php

namespace App\Http\Controllers;

use App\Models\Font;
use App\Models\DesignConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class DesignController extends Controller
{
    public function index()
    {
        if (Session::has('user_admin')) {
            $type = Session::get('user_admin');
            if ($type == 1) {
                $designs = DB::table('users')
                    ->leftJoin('design_configs', 'users.id', '=', 'design_configs.user_id')
                    ->select('users.*', 'design_configs.*')
                    ->orderBy('design_configs.id', 'desc')  // Select the columns you need
                    ->get();
                return view('admin.design.index', ['designs' => $designs]);
            }
        } else {
            return redirect()->route('login_view'); //Session value does not exist
        }
    }


    public function delete_design($id)
    {
        DesignConfig::where('design_config_id', $id)->delete();
        return redirect()->route('design')->with("success", "User Design deleted successfully");
    }
  public function delete_alldesign($id)
    {
        DesignConfig::where('design_config_id', $id)->delete();
        return redirect()->route('all_design')->with("success", "User Design deleted successfully");
    }
    public function delete_userdesign($id)
    {
        DesignConfig::where('design_config_id', $id)->delete();
        return redirect()->route('your_design')->with("success", "User Design deleted successfully");
    }
    

    public function edit_design($key,$id)
    {
        $decryptedId=Crypt::decrypt($id);
        $design =  DesignConfig::where('design_config_id', $decryptedId)->where('generated_key',$key)->first();

       $size = $design->select_size;
        // dd($size);
       $color1 = $design->mainColor1;
       $color2 = $design->mainColor2;
    
          $fonts =  Font::get();

       return view('web.edit-config',get_defined_vars());
        // return redirect()->route('your_design')->with("success", "User Design deleted successfully");
    }
    
    public function clone($cloneId){
        $originalDesign=DesignConfig::findOrFail($cloneId);
        $newDesign=$originalDesign->replicate();
        $newDesign->design_name=$originalDesign->design_name." -(copy)";
        $newDesign->created_at=now();
        $newDesign->updated_at=now();
        $newDesign->save();
        
        return response()->json([
            "success"=>true,
            "message"=>"no error occured Succefully cloned"
        ]);
    }
}
