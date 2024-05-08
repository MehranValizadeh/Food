<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{

    protected $table = "foods";
    use HasFactory;

    protected $fillable = ['name' , 'image' , 'description' , 'price' , 'category_id'];

    public static function getTableName()
    {
        return self::getTableName();
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
