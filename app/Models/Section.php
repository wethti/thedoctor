<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='sections';
    protected $guarded = [];

    public function menutab()
{
    return $this->belongsTo(Menutab::class,'menutab_id','id');
}

    public function page()
{
    return $this->belongsTo(Page::class,'page_id','id');
}

    public function subsections()
{
    return $this->hasMany(Subsection::class, 'section_id', 'id');
}
}
