<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'invoices';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}
