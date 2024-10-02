<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Supplier;


class SupplierController extends Controller
{
    /* 
    * index
    * @return void
    */

    public function index() : View
    {
        $supplier = new Supplier;
        $suppliers = $supplier->get_supplier()
                            ->latest()
                            ->paginate(10);
    
        return view('suppliers.index', compact('suppliers'));    
    }
}