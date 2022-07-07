<?php

namespace App\Http\Controllers;

use \Carbon\Carbon;
use App\Http\Requests\AccountFormRequest;
use App\Models\City;
use App\Models\Configuration;
use App\Models\Country;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function account()
    {
        $dj_account_form_data = $this->getDjAccountFormData();
        return view('dashboard.account', ["dj_account_form_data" => $dj_account_form_data]);
    }

    public function updateAccount(AccountFormRequest $request)
    {
        $data = $request->validated();
        $birthdate = $data['birthdate']; //dd($birthdate);
        $data['birthdate'] = date("Y-m-d", strtotime($birthdate));

        $user = Auth::user(); 
        $dj = $user->dj; 

        try {
            $user->update($data);

            if($dj != null && isset($data["genres"])) {
                $dj->genres()->sync($data["genres"]);
                $dj->save();
            }

            return back()->with('success', 'Account updated!');
        } catch (\Throwable $th) {
            throw $th;
        }  
    }

    public function getDjAccountFormData()
    {
        $data = [];

        $data["genres"] = Genre::whereActive(1)->get(); 
        $data["countries"] = Country::whereActive(1)->orderBy('name')->get(); 
        $data["cities"] = City::whereActive(1)->orderBy('name')->get(); 

        $data["configurations"] = auth()->user()->dj->configurations; 

        if(empty($data)) return null;

        return $data;
    }

    public function getCities(Country $country)
    {
        return response()->json(array('success' => true, ['cities' => $country->cities]));
    }
}
