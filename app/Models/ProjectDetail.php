<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectDetail extends Model
{
    protected $fillable = [
        'project_name',
        'user_id',
        'contractor_name',
        'consultant_name',
        'client_name',
        'bill_no',
        'bbs_for',
        'floor',
        'reference_drawing',
        'approved_by',
        'total_rf_weight',
    ];

public function user()
{
    return $this->belongsTo(User::class);
}

}
