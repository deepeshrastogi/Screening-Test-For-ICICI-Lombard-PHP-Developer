<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Traveller;
use Validator;
use DB;

class TravellerController extends Controller
{
   

    /**
     * get the travel history of a user.
     * @return \Illuminate\Contracts\Support\Renderable
     * [GET] /traveller/
     * @param user_id, from_date, to_date
     * here user_id = traveller's id
     */ 
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'user_id' => 'required',
            'from_date' => 'date_format:Y-m-d',
            'to_date' => 'date_format:Y-m-d',
        ]);

        //if validation failes, then  error would return
        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'content' => (object)[]], 403);
        }
        $fromDate = !empty($request->from_date) ? $request->from_date : '';  
        $toDate = !empty($request->to_date) ? $request->to_date : '';
        $travellerList = Traveller::with(['cityTravelHistory' => function($q) use($fromDate,$toDate){
            if(!empty($fromDate)){
                $q->where(['from_date' => $fromDate]);
            }
            if(!empty($toDate)){
                $q->where(['to_date' => $toDate]);
            }
            $q->orderBy("from_date");
        }])
        ->where(['id' => $request->user_id])->get();
        if(!empty($travellerList->toArray())){
            $result = [];
            foreach($travellerList as $tl){
                foreach($tl->cityTravelHistory as $k=>$cth){
                    $result[$k] = [
                        'city_name' => $cth->city->city_name,
                        'from_date' => $cth->from_date,
                        'to_date' => $cth->to_date
                    ];
                }
            }
            return response(['error' => (object)[], 'content' => $result], 200);
        }else{
            return response(['error' => "No record found on the server", 'content' => (object)[]], 200);
        }
    }


    /**
     * get count of distinct travellers against every city for a given period.
     * @return \Illuminate\Contracts\Support\Renderable
     * [GET] /traveller/
     * @param user_id, from_date, to_date
     * here user_id = traveller's id
     */ 
    public function travellerCity(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'from_date' => 'required|date_format:Y-m-d',
            'to_date' => 'required|date_format:Y-m-d',
        ]);

        //if validation failes, then  error would return
        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'content' => (object)[]], 403);
        }
        $fromDate = $request->from_date;  
        $toDate = $request->to_date;
        
        $tavellerData = Traveller::selectRaw("DISTINCT count((cities.city_name)) as traveller_count,cities.city_name")
        ->leftJoin('city_travel_history', 'city_travel_history.traveller_id', '=', 'travelers.id')
        ->leftJoin('cities', 'cities.id', '=', 'city_travel_history.city_id')
        ->whereRaw("city_travel_history.from_date >= '".$fromDate."' and city_travel_history.to_date <='".$toDate."'")
        ->groupBy('travelers.traveller_name')
        ->get();

        if(!empty($tavellerData->toArray())){
            return response(['error' => (object)[], 'content' => $tavellerData], 200);
        }else{
            return response(['error' => "No record found on the server", 'content' => (object)[]], 200);
        }

    }
}
