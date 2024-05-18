<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'menus';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}
