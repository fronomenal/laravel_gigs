<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters){
        if($filters["tag"]){
            $query->where("tags", "like", "%{$filters['tag']}%");
        }
        if($filters["search"]){
            $query->where("tags", "like", "%{$filters['search']}%")
            ->orWhere("title", "like", "%{$filters['search']}%")
            ->orWhere("description", "like", "%{$filters['search']}%");
        }
    }
}
