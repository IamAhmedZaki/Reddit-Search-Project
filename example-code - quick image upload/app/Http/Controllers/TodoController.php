<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\DesignConfig;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Client\ResponseSequence;

class TodoController extends Controller
{
    public function index($designId){
        
        $todo=Todo::where('design_id',$designId)->orderBy('created_at','desc')->get();
        return Response()->json([
            "success"=>true,
            "todos"=>$todo
        ]);
    }

    public function store(Request $request){
        $validated=Validator::make($request->all(),[
            "design_id"=>"required|exists:design_configs,design_config_id",
            "todo_text"=>"required|string|max:500",
            
        ]);

        if($validated->fails()){
            return response()->json([
                "success"=>false,
                "errors"=>$validated->errors()
            ],422);
        }

        $userId=auth()->id();
        
        $todo=Todo::create([
            "design_id"=>$request->design_id,
            "text"=>$request->todo_text,
            "completed"=>false,
            "user_id"=>$userId,
        ]);

        return response()->json([
            "success"=>true,
            "todo"=>$todo
        ]);
    }

    public function update(Request $request, $todoId ){
        $request->merge([
            'completed'=>filter_var($request->completed, FILTER_VALIDATE_BOOLEAN)

        ]);
        $validator=Validator::make($request->all(),[
            "completed"=>"required|boolean"
        ]);

        if($validator->fails()){
            return response()->json([
                "success"=>false,
                "errors"=>$validator->errors()
            ],422);
        }

        $todo=Todo::findOrFail($todoId);
        $todo->completed=$request->completed;
        $todo->save();


        return response()->json([
            "success"=>true,
            "todo"=>$todo
        ]);
    }

public function delete($todoId){
    $todo=Todo::findOrfail($todoId);
    $todo->delete();

    return response()->json([
        "success"=>true,
        "message"=>"Deletion Successfull"
    ]);
}
    
public function getIncompleteTask(){
    $user=auth()->id();
    $count=Todo::where('user_id',$user)->where('completed',false)->count();

    return response()->json([
        "count"=>$count
    ]);


}

}
