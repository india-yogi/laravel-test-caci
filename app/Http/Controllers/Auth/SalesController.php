<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules;

use App\Interfaces\SalesRepositoryInterface;
use App\Interfaces\ProductRepositoryInterface;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Sales;
use App\Helpers\Helper;

class SalesController extends Controller
{

    private SalesRepositoryInterface $salesRepository;
    private ProductRepositoryInterface $productRepository;

    public function __construct(
        SalesRepositoryInterface $salesRepository, 
        ProductRepositoryInterface $productRepository) 
    {
        $this->salesRepository = $salesRepository;
        $this->productRepository = $productRepository;
    }

    /**
     * Display all seles records.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $sales = $this->salesRepository->getAllSales();
        $products = $this->productRepository->getAllProduct();
        \Log::debug($sales);
        return view('coffee_sales', ["sales"=>$sales, "products"=>$products]);
    }

    /**
     * Display sales details (single sale).
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.sales_details');
    }

    /**
     * Handle an incoming creation request.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => ['required', 'integer'],
            'quantity' => ['required', 'integer'],
            'unit_cost' => ['required', 'numeric'],
            // 'selling_price' => ['required',],
        ]);

        $product_id = $request->product_id;
        $quantity = $request->quantity;
        $unit_cost = $request->unit_cost;

        $selling_price = Helper::calculateSellingCost($quantity, $unit_cost);

        $salesDetails = [
            'product_id' => $product_id,
            'quantity' => $quantity,
            'unit_cost' => $unit_cost,
            'selling_price' => $selling_price,
        ];

        $this->salesRepository->createSales($salesDetails);        

        return redirect('/sales');
    }

    /**
     * Destroy a sales record.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        return redirect('/');
    }
}
