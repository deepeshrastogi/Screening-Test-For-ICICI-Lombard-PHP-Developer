<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Traveller extends Model
{
    protected $table = "travelers";
    // protected $hidden = ['pivot'];
    protected $fillable = [
        'traveller_name'
    ];

    public function cityTravelHistory(){
        return $this->HasMany(CityTravelHistory::class,'traveller_id','id')->with('city');
    }
}
