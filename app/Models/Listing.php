<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filter) //filter on listing model 
    {
       if($filters['tag'] = true)  //only if there is a tag (not false)
       {
             $query->where('tags', 'like', '%' . request('tag') . '%' ); //check tag column of database for matchand only show 
       }

       if($filters['search'] = true)  //only if there is a tag (not false)
       {
             $query->where('title', 'like', '%' . request('search') . '%' ) //check  database for search term  
             ->orWhere('description', 'like', '%' . request('search') . '%')
             ->orWhere('tags', 'like', '%' . request('search') . '%');
       }
    }
}
