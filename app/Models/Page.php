<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $table ='pages';
    protected $guarded = [];
    
    public function menutabs()
    {
        return $this->hasMany(Menutab::class, 'page_id', 'id');
    }

    public function sections()
    {
        return $this->hasMany(Section::class, 'page_id', 'id');
    }

    public function subsections()
    {
        return $this->hasMany(Subsection::class, 'page_id', 'id');
    }
}
