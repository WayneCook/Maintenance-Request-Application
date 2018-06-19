<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Yajra\DataTables\Facades\DataTables;

use Illuminate\Support\Facades\Validator;

use App\workOrder;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
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



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


      $validator = Validator::make($request->all(), [
        'order_status' => 'required',
        'name' => 'required',
        'unit_number' => 'required',
        'category' => 'required',
        'description' => 'required',
        'comments' => 'required',
        'permission_to_enter' => 'required',
      ]);

      if ($validator->passes()) {

          $order = new workOrder;

          $order->order_status = $request->order_status;
          $order->name = $request->name;
          $order->unit_number = $request->unit_number;
          $order->category = $request->category;
          $order->description = $request->description;
          $order->comments = $request->comments;
          $order->permission_to_enter = $request->permission_to_enter;
          $order->created_at = NOW();

          $order->save();
          return response()->json(['success'=>'Added new records.']);

      } else {

        // return response()->json(['error'=>$validator->errors()->all()]);
    	   return response()->json(['error' => $validator->getMessageBag()->toArray()]);


      }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $order = workOrder::findOrFail($id);

        return $order;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
