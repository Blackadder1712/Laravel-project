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
        ['listings' => Listing::latest()->filter(request(['tag',
         'search']))->paginate(6) // items on each page 
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

            if($request->hasFile('logo'))//check if image uploaded
            {
                $formFields['logo'] = $request->file('logo')->store('logos', 'public'); //file path in database and upload 
            }

            $formFields['user_id'] = auth()->id();//set correct id for user listing 

            Listing::create($formFields);

            

            return redirect('/')->with('message', 'Listing created successfully!'); //flash message 
    }

    //Show edit form 
    public function edit(Listing $listing)
    {
        return view('listings.edit', ['listing' => $listing]); //pass selected listing into editing 
    }

      //update listing data 
      public function update(Request $request, Listing $listing)
      {
          //make sure logged in user is owner
          if($listing->user_id != auth()->id())
          {
            abort(403, 'Unauthorised Action');
          }

          $formFields = $request->validate(  //validate user input 
              [
               'title' => 'required',
               'company' => ['required'],
               'location' => 'required',
               'website' => 'required',
               'email' => ['required', 'email'],
               'tags' => 'required', 
               'description' =>'required'
              ]
              );
  
              if($request->hasFile('logo'))//check if image uploaded
              {
                  $formFields['logo'] = $request->file('logo')->store('logos', 'public'); //file path in database and upload 
              }
  
              $listing->update($formFields);
  
              
  
              return back()->with('message', 'Listing updated successfully!'); //flash message for update
      }

      //Delete listing
      public function destroy(Listing $listing)
      {
           //make sure logged in user is owner
           if($listing->user_id != auth()->id())
           {
             abort(403, 'Unauthorised Action');
           }
           
          $listing->delete();
          return redirect('/')->with('message', 'Listing deleted successfully');
      }

      //Manage Listings
      public function manage()
      {
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);//get listings of all logged in users 
      } //pass into view as listings 
}

