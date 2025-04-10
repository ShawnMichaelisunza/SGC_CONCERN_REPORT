<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'ticket_no',
        'dept',
        'company_name',
        'emp_no',
        'name',
        'classification',
        'urgent',
        'reason'
    ];

    public function maintenances(){

        return $this->hasMany(Maintenance::class);
    }
}
