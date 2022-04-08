<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModal extends Model
{
    use HasFactory;
    protected $table = 'product';
    const UPDATED_AT = null;
    protected $primaryKey = 'id';
}
