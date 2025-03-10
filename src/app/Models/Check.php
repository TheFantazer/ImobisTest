<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    use HasFactory;

    protected $table = 'checks';


    protected $fillable = [
        'input',
        'output',
        'language',
    ];


    protected $casts = [
        'input' => 'string',
        'output' => 'string',
        'language' => 'string',
    ];


    protected $hidden = [

    ];


    protected $primaryKey = 'id';


    public $timestamps = true;
}
