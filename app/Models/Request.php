<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'customer_id',
        'package_type',
        'package_size',
        'package_desc',
        'pickup_location',
        'receiver_number',
        'receiver_email',
        'package_image',
        'payment_method',
        'delivery_type',
    ];
}
