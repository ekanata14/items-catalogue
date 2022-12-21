<?php

namespace App\Models;

use App\Models\InOut;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Items extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function inout(){
        return $this->hasMany(InOut::class);
    }
}
