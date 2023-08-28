<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subsection extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='subsections';
    protected $guarded = [];

    public function section()
    {
        return $this->belongsTo(Section::class,'section_id','id');
    }

    public function page()
    {
        return $this->belongsTo(Page::class,'page_id','id');
    }
}
