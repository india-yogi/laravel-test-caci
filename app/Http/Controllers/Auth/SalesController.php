<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules;

use App\Interfaces\SalesRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Sales;
use App\Helpers\Helper;

class SalesController extends Controller
{

    private SalesRepositoryInterface $salesRepository;

    public function __construct(SalesRepositoryInterface $salesRepository) 
    {
        $this->salesRepository = $salesRepository;
    }

    /**
     * Display all seles records.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $sales = $this->salesRepository->getAllSales();
        \Log::debug($sales);
        return view('coffee_sales', ["sales"=>$sales]);
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
            'quantity' => ['required', 'integer'],
            'unit_cost' => ['required', 'numeric'],
            // 'selling_price' => ['required',],
        ]);

        $quantity = $request->quantity;
        $unit_cost = $request->unit_cost;

        $selling_price = Helper::calculateSellingCost($quantity, $unit_cost);

        $salesDetails = [
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
