<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Cast\Int_;

class Test extends Model
{
    protected $fillable = ['text', 'is_enabled'];
    protected $casts = ['is_enabled' => 'boolean'];

    public static function task5InHW()
    {
        $maxId = Test::orderBy('id','desc')->first();
        Test::where('id', $maxId)->update(['text' => 'So what about pepito?', 'is_enabled' => 1]);
        return $maxId;
    }

    public static function task6InHW(Int $id)
    {
        $result = Test::where('id', $id)->get();
        if (!$result) {
            return $result;
        } else {
            return null;
        }
     }



}
