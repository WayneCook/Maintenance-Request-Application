<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreateworkOrderRequest;
use App\Http\Requests\UpdateworkOrderRequest;
use App\Repositories\workOrderRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Alert;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class workOrderController extends AppBaseController
{
    /** @var  workOrderRepository */
    private $workOrderRepository;

    public function __construct(workOrderRepository $workOrderRepo)
    {
        $this->workOrderRepository = $workOrderRepo;
    }

    /**
     * Display a listing of the workOrder.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->workOrderRepository->pushCriteria(new RequestCriteria($request));
        $workOrders = $this->workOrderRepository->all();

        return view('work_orders.index')
            ->with('workOrders', $workOrders);
    }

    public function initial()
    {
        $this->workOrderRepository->pushCriteria(new RequestCriteria($request));
        $workOrders = $this->workOrderRepository->all();

        return view('work_orders.index')
            ->with('workOrders', $workOrders);
    }



    /**
     * Show the form for creating a new workOrder.
     *
     * @return Response
     */
    public function create()
    {
        return view('work_orders.create');
    }

    /**
     * Store a newly created workOrder in storage.
     *
     * @param CreateworkOrderRequest $request
     *
     * @return Response
     */
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

    /**
     * Display the specified workOrder.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $workOrder = $this->workOrderRepository->findWithoutFail($id);

        if (empty($workOrder)) {
            Flash::error('Work Order not found');

            return redirect(route('workOrders.index'));
        }

        return view('work_orders.show')->with('workOrder', $workOrder);
    }

    /**
     * Show the form for editing the specified workOrder.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $workOrder = $this->workOrderRepository->findWithoutFail($id);

        if (empty($workOrder)) {
            Flash::error('Work Order not found');

            return redirect(route('workOrders.index'));
        }

        return view('work_orders.edit')->with('workOrder', $workOrder);
    }

    /**
     * Update the specified workOrder in storage.
     *
     * @param  int              $id
     * @param UpdateworkOrderRequest $request
     *
     * @return Response
     */
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

    /**
     * Remove the specified workOrder from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
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
