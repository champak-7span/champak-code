<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
  
    use HasFactory,BaseModel,SoftDeletes;
    
    protected $fillable = [
        'name', 'description','createdby','updatedby','deletedby'
    ];
    public $queryable = [
        'id'
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $hidden = ['created_at', 'updated_at','deleted_at'];

    public function orders(){
      
        return $this->hasMany(Order::class);
    }
    protected $relationship = [
        'orders' => [
            'model' => 'App\\Models\\Order',
        ],
    ];



}
