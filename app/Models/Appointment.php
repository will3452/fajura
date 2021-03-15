<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function services(){
        return $this->belongsToMany(Service::class);
    }

    public function getDateAndTimeAttribute(){
        return Carbon::parse($this->datetime);
    }
}
