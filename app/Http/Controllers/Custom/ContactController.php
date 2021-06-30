<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $search_term = $request->input('q');

        if ($search_term)
        {
            $results = Account::where('acc_name', 'LIKE', '%'.$search_term.'%')->paginate(10);
        }
        else
        {
            $results = Account::paginate(10);
        }

        return $results;
    }

  
}
