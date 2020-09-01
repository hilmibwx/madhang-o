<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['cover','name','slug','price','desc','ingredient','status'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
