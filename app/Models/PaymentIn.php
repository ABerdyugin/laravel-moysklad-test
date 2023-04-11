<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentIn extends Model
{
    use HasFactory;

    protected $fillable = ['paymentInId'];
}
