<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSubCategoryModal extends Model
{
    use HasFactory;
    protected $table = 'productSubCategory';
    const UPDATED_AT = null;
    protected $primaryKey = 'id';
}
