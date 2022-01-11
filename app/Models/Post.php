<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'excerpt',
        'body',
        'category_id',
        'slug',
        'user_id',
        'thumbnail',
    ];

    // protected $with = ['category','user'];

    public function category(){

        return $this->belongsTo(Category::class);
    }
    public function user(){

        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, array $filters){   
        
        if($filters['search']){
            $query->where(function($query){
                $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%');
            });
           
        }
        
        if($filters['category']){
          
            $name = $filters['category'];

        //    $query->when($name, function ($query, $name) {
        //         return $query->whereHas('category',function ( $));
        //     });
            // $query->when($name, function ($query, $name) {
            $query->whereHas('category', function ($query) use($name){
                $query->where('slug',$name);
            });  
        // });            
        }

        if($filters['author']){
                $username = $filters['author'];
                $query->whereHas('user', function ($query) use($username){
                    $query->where('userName',$username);
                }); 
            
           
            }
    }

    public function comments(){

        return $this->hasmany(comment::class);
    }
}
