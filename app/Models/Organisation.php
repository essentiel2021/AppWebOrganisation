<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    use HasFactory;
    protected $guarded = ['code'];
    public function type(){
        return $this->belongsTo(Type::class,'id_type');
    }
}
