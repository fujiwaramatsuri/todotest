<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todos extends Model
{
    use HasFactory;
    protected $guarded = array('id');
    public static $rules = array(
    'content'=>'required'
    );

public function getDetail()
{
    $txt = 'content:'.$this->content;
    return $txt;
}
}