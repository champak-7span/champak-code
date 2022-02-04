<?php

namespace App\Models;

use App\Traits\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory,SoftDeletes,BaseModel;

    protected $fillable = [
        'name', 'order_no','subtotal','total','user_id','createdby','updatedby','deletedby','qty','address'
    ];
    public $queryable = [
        'id'
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $hidden = ['created_at', 'updated_at','deleted_at'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_products', 'order_id', 'product_id');
    }

    protected $relationship = [
        'products' => [
            'model' => 'App\\Models\\Product',
        ],
    ];

    public function relationships()
    {
        return $this->relationships;
    }
}
