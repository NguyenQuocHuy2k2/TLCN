<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Protypes extends Model
{
    use HasFactory;
    protected $table = 'protypes';
    protected $primaryKey = 'type_id';
    public $timestamps = false;
    protected $fillable = ['type_name'];
}
