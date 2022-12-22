<?php

namespace App\Models;

use App\Models\Items;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function items(){
        return $this->hasMany(Items::class);
    }
}
