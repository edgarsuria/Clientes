<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'last_name',
        'phone',
        'email',
    ];


    public function documents(){
        return $this->hasMany(Document::class);
    }

    public function getCustomCustomerAttribute() {
        return $this->id."-".$this->name;
    }



}
