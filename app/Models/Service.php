<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getPublicPictureAttribute(){
        $path = $this->picture;
        $arr_path = explode('/', $path);
        $end_path = end($arr_path);
        return '/storage/picture/'.$end_path;
    }
}
