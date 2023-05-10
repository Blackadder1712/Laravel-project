<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //show all
    public function index()
    { 
        return view('listings.index',
        ['listings' => Listing::latest()->filter(request(['tag', 'search']))->get() // sort by latest post an
        ]);
    }
    
    //show single 
    public function show(Listing $listing)
    {
        return view('listings.show', 
        ['listing' => $listing
        ]);

    }

    //show create form 
    public function create()
    {
        return view('listings.create');
    }

    //store listing data 
    public function store(Request $request)
    {
        $formFields = $request->validate(  //validate user input 
            [
             'title' => 'required',
             'company' => ['required', Rule::unique('listings', 'company')],
             'location' => 'required',
             'website' => 'required',
             'email' => ['required', 'email'],
             'tags' => 'required', 
             'description' =>'required'
            ]
            );

            return redirect('/'); 
    }
}
