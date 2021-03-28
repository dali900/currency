<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    const BASE = 'EUR';
    use HasFactory;

    protected $fillable = ['symbol', 'value', 'date', 'base'];
}
