<?php

namespace CodeDelivery\Http\Controllers;

use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;

class OrdersController extends Controller
{

	private $repository;

    public function __construct(OrderRepository $repository)
    {
    	$this->repository = $repository;    	
    }

    public function index()
    {
    	$orders = $this->repository->paginate();

    	return view('admin.orders.index', compact('orders'));
    }

    public function edit($id, UserRepository $UserRepository)
    {

    	$list_status = [
    						0 => 'Pendente', 
    						1 => 'A Caminho', 
    						2 => 'Entregue'
    					];

    	$order = $this->repository->find($id);

    	$deliveryman = $UserRepository->getDeliverymen();

    	return view('admin.orders.edit', compact('order', 'list_status', 'deliveryman'));
    }

    public function update(Request $request, $id)
    {
    	$all = $request->all();
    	$this->repository->update($all, $id);

    	return redirect()->route('admin.orders.index');
    }
}
