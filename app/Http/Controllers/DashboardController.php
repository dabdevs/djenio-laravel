<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function account(Request $request)
    {
        $user = Auth::user();

        if($request->method() == "POST") {
            $data = $request->all(); //dd($data);

            try {
                if($user->dj != null) {
                    $user->dj->genres()->sync($data["genres"]);
                }

                $user->update($data);

                return back()->with('success', 'Account updated!');
            } catch (\Throwable $th) {
                throw $th;
            }  
        }

        $dj_account_form_data = $this->getDjAccountFormData();
        return view('dashboard.account', ["dj_account_form_data" => $dj_account_form_data]);
    }

    public function getDjAccountFormData()
    {
        $data = [];

        $data["genres"] = \DB::select('select id, name from genres where active = ? order by name', [1]);

        $data["configurations"] = \DB::select('select * from configurations');

        if(empty($data)) return null;

        return $data;
    }
}
