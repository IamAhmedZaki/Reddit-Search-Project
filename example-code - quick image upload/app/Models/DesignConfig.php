<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesignConfig extends Model
{
    use HasFactory;
    protected $primaryKey = 'design_config_id';
    protected $fillable = [
        'user_id',
        'generated_key',
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
        'flatRight',
        'design_name',
        'design_email',
        'main'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

        public function users()
{
    return $this->belongsTo(User::class, 'user_id');
}
public function todos(){
    return $this->hasMany(Todo::class,'design_id', 'design_config_id');
}

}
