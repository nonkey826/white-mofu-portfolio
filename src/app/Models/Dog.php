<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
    use HasFactory;

    protected $fillable = [
    'name',
    'breed',
    'age',
    'weight',
    'personality',
    'favorite_food',
    'image'
];

    public function getProfile()
{
    return "ID:{$this->id}／{$this->name}（{$this->breed}・{$this->age}才）";
}

}

