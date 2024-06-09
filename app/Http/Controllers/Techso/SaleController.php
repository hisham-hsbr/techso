<?php

namespace App\Http\Controllers\Techso;


use Illuminate\Http\Request;
use App\Models\Techso\Product;
use Yajra\Datatables\Datatables;
use App\Models\Techso\Sale;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Techso\ProductAttribute;
use App\Models\Techso\ProductAttributeType;

class SaleController extends Controller
{
    private $head_name = 'Second Sale';
    private $route_name = 'second-sales';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $second_sales = Sale::all();
        $createdByUsers = $second_sales->sortBy('createdBy')->pluck('createdBy')->unique();
        $updatedByUsers = $second_sales->sortBy('updatedBy')->pluck('updatedBy')->unique();
        return view('back_end.techso.second_sales.index')->with(
            [
                'head_name' => $this->head_name,
                'route_name' => $this->route_name,
                'second_sales' => $second_sales,
                'createdByUsers' => $createdByUsers,
                'updatedByUsers' => $updatedByUsers,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $second_sales = Sale::all();
        // $product_attributes = ProductAttribute::with(['productAttributeType'])
        // // ->where('product_attribute_type_id')
        // ->select('product_attribute_type_id', 'id', 'name')
        // ->orderBy('product_attribute_type_id')
        // ->get()
        // ->groupBy(['product_attribute_type_id']);
        $products = Product::where('status', 1)->get();
        $types = ProductAttributeType::where('status', 1)->get();
        $product_attributes = ProductAttribute::where('status', 1)->get()
            ->where('product_attribute_type_id', '<>', '1')
            ->groupBy('product_attribute_type_id');


        $product_price_lists = ProductAttribute::where('status', 1)->get()
            ->where('product_attribute_type_id', '1')
            ->groupBy('product_attribute_type_id');
        $list_number = Sale::max('list_number') + 1;
        // dd($product_attributes);
        return view('back_end.techso.second_sales.create')->with(
            [
                'head_name' => $this->head_name,
                'route_name' => $this->route_name,
                'products' => $products,
                'product_attributes' => $product_attributes,
                'types' => $types,
                'product_price_lists' => $product_price_lists,
                'second_sales' => $second_sales,
                'list_number' => $list_number,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
