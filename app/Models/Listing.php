<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters){
        if($filters["tag"]){
            $tag = strtolower($filters["tag"]);
            $query->where("tags", "like", "%{$tag}%");
        }
        if($filters["search"]){
            $search = strtolower($filters["search"]);
            $query->where("tags", "like", "%{$search}%")
            ->orWhere("title", "ilike", "%{$search}%")
            ->orWhere("description", "ilike", "%{$search}%");
        }
    }

    //User relationship
    public function user(){
        return $this->belongsTo(User::class, "user_id");
    }
}
