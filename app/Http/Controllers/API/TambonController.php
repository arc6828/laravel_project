<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tambon;

class TambonController extends Controller
{
    public function getProvinces()
    {
        $provinces = Tambon::groupBy('province_code')->get();
        return $provinces;
    }
    public function getAmphoes($province)
    {
        $amphoes = Tambon::where('province',$province)
            ->groupBy('amphoe_code')
            ->get();
        return $amphoes;
    }
    public function getTambons($province,$amphoe)
    {
        $tambons = Tambon::where('province',$province)
            ->where('amphoe',$amphoe)
            ->groupBy('tambon_code')
            ->get();
        return $tambons;
    }
    public function getZipcodes($province,$amphoe,$tambon)
    {
        $zipcodes = Tambon::where('province',$province)
            ->where('amphoe',$amphoe)        
            ->where('tambon',$tambon)
            ->get();
        return $zipcodes;
    }
}
