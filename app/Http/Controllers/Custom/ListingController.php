<?php

namespace App\Http\Controllers\Custom;

use App\Models\Listing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListingController extends Controller
{
    public function update(Request $request) 
    {
        $type = $request->type;
        $Listing = Listing::findOrFail($request->listingId);
        $Listing->update([
            $type => $request->value
        ]);

        if($Listing){
            return response()->json([
                'success' => true,
                'message' => 'success'
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'success'
            ]);
        }
    }
}
