<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'report_id',
        'action',
        'materials',
        'date_start',
        'date_end',
        'img_before',
        'img_after'
    ];

    public function reports(){

        return $this->belongsTo(Report::class);
    }

    public function user(){

        return $this->belongsTo(User::class);
    }


}
