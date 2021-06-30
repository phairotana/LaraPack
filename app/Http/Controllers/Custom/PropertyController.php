<?php

namespace App\Http\Controllers\Custom;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        // $request = trim($request);
        $search_term = $request->input('q');
        if ($search_term)
        {
            // $results = Contact::where('salutation', 'LIKE', '%'.$query.'%')
            //         ->orWhere('first_name', 'LIKE', '%'.$query.'%')
            //         ->orWhere('last_name', 'LIKE', '%'.$query.'%')
            //         ->paginate(10); 

            $data = Contact::select('id',DB::raw("CONCAT(salutation,' ',first_name,' ',last_name ) as Full_Name"))
                    ->where(DB::raw("CONCAT(salutation,' ',first_name,' ',last_name)"), 'like', '%'. $search_term .'%')
                    ->take(10)
                    ->get();
        }
        else
        {
            $data = Contact::paginate(10);
        }
        return ['data' =>$data];
    }
    public function contactAjax(Request $request) {
        $term = $request->input('term');
        $options = Contact::where(DB::raw("CONCAT(salutation,' ',first_name,' ',last_name)"), 'like', '%'.$term.'%')->take(10)->get()->pluck('FullName','id');
        return $options;

    }
}
