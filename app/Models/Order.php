<?php

namespace App\Models;

use App\Traits\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory,SoftDeletes,BaseModel;

    protected $fillable = [
        'name', 'order_no','subtotal','total','user_id','createdby','updatedby','deletedby'
    ];
    public $queryable = [
        'id'
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $hidden = ['created_at', 'updated_at','deleted_at'];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
