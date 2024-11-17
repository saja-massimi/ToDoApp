<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $primaryKey = 'task_id';


    protected $fillable = [
        'name',
        'description',
        'status',
    ];
    use HasFactory;
}
