<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number',
        'status',
        'claimant',
        'email',
        'phone',
        'subject',
        'message',
        'file',
        'filing',
        'respondent',
        'arbitrator',
        'partner',
    ];
}
