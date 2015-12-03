<?php

namespace CodeDelivery\Http\Controllers;


use CodeDelivery\Http\Controllers\Auth\AuthController;
use CodeDelivery\Services\OrderService;
use Illuminate\Http\Request;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;



class CheckoutController extends Controller
{

	private $orderRepository;
    private $userRepository;
    private $productRepository;
    /**
     * @var OrderService
     */
    private $service;


    /**
     * @param ProductRepository $productRepository
     * @param UserRepository $userRepository
     * @param OrderRepository $orderRepository
     */

    public function __construct(
                                    ProductRepository $productRepository,
                                    UserRepository $userRepository,
                                    OrderRepository $orderRepository,
                                    OrderService $service

                                )


	{
		$this->orderRepository = $orderRepository;
        $this->userRepository = $userRepository;
        $this->productRepository = $productRepository;
        $this->service = $service;
    }

    /**
     * @return \Illuminate\View\View
     */


    public function index()
    {
        $clientId = $this->userRepository->find(Auth::user()->id)->client->id;
        $orders = $this->userRepository->scopeQuery(function($query) use($clientId) {
           return $query->where('client_id', '=', $clientId);
        })->paginate();

        return view('customer.order.index', compact('orders'));
    }


    public function create()
    {
        $products = $this->productRepository->lists();
        return view('customer.order.create', compact('products'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $clientId = $this->userRepository->find(Auth::user()->id)->client->id;
        $data['client_id'] = $clientId;
        $this->service->create($data);

        return redirect()->route('customer.order.index');
    }
   
}
