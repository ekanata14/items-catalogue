<?php

namespace App\Models;

use App\Models\Items;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InOut extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, Array $filters){
        $query->when($filters['date'] ?? false, function($query, $date){
            return $query->where('inout_date', 'like', $date );
        });
    }

    public function Items(){
        return $this->belongsTo(Items::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
