<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategoryModal extends Model
{
    use HasFactory;
    protected $table = 'productCategory';
    const UPDATED_AT = null;
    protected $primaryKey = 'id';
}
