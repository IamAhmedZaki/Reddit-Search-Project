<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable=['design_id','text','completed','user_id'];


    protected $casts=['completed'=>'boolean'];

    public function design(){
        return $this->belongsTo(DesignConfig::class,'design_id', 'design_config_id');
        
    }
    
    public function user(){
        return $this->belongsTo(User::class);
        
    }
}
