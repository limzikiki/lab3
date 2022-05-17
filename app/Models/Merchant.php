<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;
    protected $fillable = ['country_id', 'manager_name', 'year_founded', 'name'];
    public function country(){
        return $this->belongsTo(Country::class);
    }
}
