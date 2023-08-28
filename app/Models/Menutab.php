<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menutab extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='menutabs';
    protected $guarded = [];

    public function sections()
{
    return $this->hasMany(Section::class, 'menutab_id', 'id');
}

public function page()
{
    return $this->belongsTo(Page::class,'page_id','id');
}

public function products()
{
    return $this->belongsToMany(Product::class);
}
}
