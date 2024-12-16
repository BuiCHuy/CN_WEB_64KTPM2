<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;
    protected $fillable = ['id','computer_id','reported_by','reported_date','description','urgency','status'];
    function computer(){
        return $this->belongsTo(Computer::class);
    }
}
