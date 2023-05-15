<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    //protected $fillable = ['title', 'company', 'location', 'website', 'email', 'description', 'tags' ];

    public function scopeFilter($query, array $filters) //filter on listing model 
    {
       if($filters['tag'] ?? false)  //only if there is a tag (not false)
       {
             $query->where('tags', 'like', '%' . request('tag') . '%' ); //check tag column of database for matchand only show 
       }

       if($filters['search'] ?? false)  //only if there is a tag (not false)
       {
             $query->where('title', 'like', '%' . request('search') . '%' ) //check  database for search term  
             ->orWhere('description', 'like', '%' . request('search') . '%')
             ->orWhere('tags', 'like', '%' . request('search') . '%');
       }
    }
    //Relationship to user 
    public function user()
    {
      return $this->belongsTo(User::class, 'user_id'); //set user to thier listings 
    }
}
