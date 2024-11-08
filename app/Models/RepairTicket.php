<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepairTicket extends Model
{
    use HasFactory;

    // Make the name, email, and problem_description fields mass-assignable
    protected $fillable = [
        'name', 
        'email', 
        'problem_description',
    ];
}
