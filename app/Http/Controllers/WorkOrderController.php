<?php

namespace App\Http\Controllers;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Http\Requests\CreateworkOrderRequest;
use App\Http\Requests\UpdateworkOrderRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\workOrderRepository;
use Illuminate\Http\Request;
use Response;
use Alert;
use Flash;

class workOrderController extends AppBaseController
{

    private $workOrderRepository;

    private $storeNumbers = array('602','603','604','605','606','607','608','609');

    public function __construct(workOrderRepository $workOrderRepo)
    {

        $this->middleware('auth');
        $this->workOrderRepository = $workOrderRepo;
    }


    public function index(Request $request)
    {
        $this->workOrderRepository->pushCriteria(new RequestCriteria($request));
        $workOrders = $this->workOrderRepository->all();

        return view('work_orders.index')
            ->with(['workOrders' => $workOrders, 'storeNumbers' => $this->storeNumbers]);
    }

    public function initial()
    {
        $this->workOrderRepository->pushCriteria(new RequestCriteria($request));
        $workOrders = $this->workOrderRepository->all();

        return view('work_orders.index')
            ->with(['workOrders' => $workOrders, 'storeNumbers' => $this->storeNumbers]);
    }


    public function create()
    {
        return view('work_orders.create');
    }


    public function store(CreateworkOrderRequest $request)
    {

      $validatedData = $request->validate([
          'name' => 'required|max:25',
          'unit_number' => 'required|min:3|max:3',
          'description' => 'required',
       ]);

        $input = $request->all();

        $workOrder = $this->workOrderRepository->create($input);

        Flash::success('Work Order saved successfully.');

        return redirect(route('workOrders.index'));
    }


    public function show($id)
    {
        $workOrder = $this->workOrderRepository->findWithoutFail($id);

        if (empty($workOrder)) {
            Flash::error('Work Order not found');

            return redirect(route('workOrders.index'));
        }

        return view('work_orders.show')->with('workOrder', $workOrder);
    }


    public function edit($id)
    {
        $workOrder = $this->workOrderRepository->findWithoutFail($id);

        if (empty($workOrder)) {
            Flash::error('Work Order not found');

            return redirect(route('workOrders.index'));
        }

        return view('work_orders.edit')->with('workOrder', $workOrder);
    }


    public function update($id, UpdateworkOrderRequest $request)
    {

        $workOrder = $this->workOrderRepository->findWithoutFail($id);

        if (empty($workOrder)) {
            Flash::error('Work Order not found');

            return redirect(route('workOrders.index'));
        }

        $workOrder = $this->workOrderRepository->update($request->all(), $id);

        Flash::success('Work Order updated successfully.');

        return redirect(route('workOrders.index'));
    }


    public function destroy($id)
    {

        $workOrder = $this->workOrderRepository->findWithoutFail($id);

        if (empty($workOrder)) {
            Flash::error('Work Order not found');

            return redirect(route('workOrders.index'));
        }

        $this->workOrderRepository->delete($id);

        Flash::success('Work Order deleted successfully.');

        return redirect(route('workOrders.index'));
    }
}
