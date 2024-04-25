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
        'user_id',
        'number',
        'status',
        'claimant',
        'email',
        'phone',
        'subject',
        'message',
        'filing',
        'respondent',
        'arbitrator',
        'partner',
    ];

    public function file()
    {
        return $this->hasOne(File::class);
    }
}
