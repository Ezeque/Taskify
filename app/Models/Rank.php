<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    protected $table = 'rank';
    public $fillable = ['user_id'];
    public $timestamps = false;
    use HasFactory;
}
