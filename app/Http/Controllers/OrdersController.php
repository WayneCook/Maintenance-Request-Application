<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\workOrderMail;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\workOrder;

class OrdersController extends Controller
{


     public function __construct()
     {
         $this->middleware('auth');
     }

    public function index()

    {


        return view('admin');
    }

    public function initial()
    {

      $orders = workOrder::all();

      return Datatables::of($orders)->make();

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {


      $validator = Validator::make($request->all(), [
        'name' => 'required',
        'unit_number' => 'required',
        'category' => 'required',
        'description' => 'required',
        'permission_to_enter' => 'required',
      ]);

      if ($validator->passes()) {

          $order = new workOrder;
          $order->name = $request->name;
          $order->unit_number = $request->unit_number;
          $order->category = $request->category;
          $order->description = $request->description;
          $order->permission_to_enter = $request->permission_to_enter;
          $order->comments = $request->comments;
          $order->created_at = NOW();
          $order->save();

          // Mail::to(['waynedemetra@gmail.com', 'wf-monrovia-mgr@rpkdevelopment.com'])->send(new workOrderMail($order));
          // Mail::to(['waynedemetra@gmail.com'])->send(new workOrderMail($order));

          return response()->json(['success'=>'Added new records.']);
      } else {

    	   return response()->json(['error' => $validator->getMessageBag()->toArray()]);

      }

    }

    public function show($id)
    {

        $order = workOrder::findOrFail($id);

        return $order;

    }

    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {

      $orderData = workOrder::find($id);
      $orderDataArray = $orderData->toArray();

      foreach ($orderDataArray as $key => $value) {

        if (isset($request->$key)) {
            $orderData->$key = $request->$key;
        }
      }

      $orderData->save();

      return workOrder::find($id);
    }


    public function destroy($id)
    {

      $order = workOrder::find($id);
      $order->delete();
      return 'order deleted';
    }
}
