<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class CityTravelHistory extends Model
{
    protected $table = "city_travel_history";
    // protected $hidden = ['pivot'];
    protected $fillable = [
        'traveller_id',
        'city_id',
        'from_date',
        'to_date',
    ];

    public function city(){
        return $this->belongsTo(City::class,'city_id','id');
    }
}
