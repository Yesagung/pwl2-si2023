<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;
    /**
     * index
     * 
     * @var array
     */
    protected $fillable = [
        'image',
        'title',
        'product_category_id',
        'id_supplier',
        'description',
        'price',           
        'stock'
    ];

    public function get_product() {
        // Get all products
        $sql = $this->select("products.*", "category_product.product_category_name as product_category_name", "supplier.supplier_name")
                    ->join('category_product', 'category_product.id', '=', 'products.product_category_id')
                    ->join('supplier', 'supplier.id', '=', 'products.id_supplier'); // join antara table suppliers dan product

        return $sql;
    }

    public function get_category_product(){
        $sql = DB::table('category_product')->select('*');
        
        return $sql;
    }
    
}





