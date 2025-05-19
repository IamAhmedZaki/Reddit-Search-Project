<?php

namespace App\Http\Controllers;

use App\Models\DesignConfig;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class YourDesignController extends Controller
{
    public function index(Request $request)
    {
        if (Session::has('user_id_get')) {
            $query = DesignConfig::with('users')->where('user_id', auth()->user()->id);
            if($request->has('search')){
                $search=$request->input('search');
                $query->where(function($q) use ($search){
                    $q->where("design_name","LIKE","%{$search}%")->orWhere('design_email','LIKE',"%{$search}%");
                });
            }
            $designs=$query->orderBy('design_config_id', 'desc')->paginate(6);
            
            if ($request->ajax()) {
                return view('web.design.index', compact('designs'))->render();
            }

            return view('web.design.index', ['designs' => $designs]);
        } else {
            return redirect()->route('login');
        }
    }
    public function all_design(Request $request)
{
    if (!Session::has('user_id_get')) {
        return redirect()->route('login');
    }
    
    $query = DesignConfig::query();
    
    if ($request->has('search') && !empty($request->input('search'))) {
        $search = $request->input('search');
        $query->where(function($q) use ($search) {
            $q->where('design_name', 'LIKE', "%{$search}%")
              ->orWhere('design_email', 'LIKE', "%{$search}%");
        });
    }
    
    $designs = $query->orderBy('design_config_id', 'desc')->paginate(6);
    
    return view('web.design.all_design', ['designs' => $designs]);
}

    public function revisionDesign(){
        if(Session::has('user_id_get')){
            $designs=DesignConfig::where('user_id',auth()->id())
            ->whereHas('todos',function($query){
                $query->where('completed',false);
            })->with("users","todos")
            ->orderBy("design_config_id","desc")
            ->paginate(6);
            return view('web.design.revision_design',compact('designs'));
        }
        else{
            return redirect()->route('login');
        }
    }
}
