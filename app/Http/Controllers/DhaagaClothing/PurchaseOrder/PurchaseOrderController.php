<?php

namespace App\Http\Controllers\DhaagaClothing\PurchaseOrder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDhaagaClothingPurchaseOrder;
// use App\Http\Requests\UpdateDhaagaClothingPurchaseOrder;
use App\Models\DhaagaClothingOrder;
// use App\Models\DhaagaClothingVendor;
// use App\User;
use Illuminate\Support\Facades\Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Config;
use JavaScript;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \View::make('dhaaga-clothing.purchaseOrder.purchase-orders-list');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \View::make('dhaaga-clothing.purchaseOrder.purchase-order-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDhaagaClothingPurchaseOrder $request)
    {
        $validatedData = $request->validated();

        $dhaagaClothingOrderModel = new DhaagaClothingOrder();

        $dhaagaClothingOrderModel->dhaaga_clothing_order_id = IdGenerator::generate(['table' => 'dhaaga_clothing_orders', 'length' => 13, 'field' => 'dhaaga_clothing_order_id', 'prefix' => 'OrdNo-']);
        $dhaagaClothingOrderModel->dhaaga_clothing_vendor_id = $validatedData['vendor_name'];
        $dhaagaClothingOrderModel->order_type = $validatedData['vendor_type'];
        $dhaagaClothingOrderModel->order_items = $validatedData['order_items'];
        $dhaagaClothingOrderModel->order_placed_by = $validatedData['placed_by'];
        $dhaagaClothingOrderModel->order_date = $validatedData['date'];
        $dhaagaClothingOrderModel->cost = $validatedData['cost'];
        $dhaagaClothingOrderModel->order_procurement_by = $validatedData['procurement_person'];
        $dhaagaClothingOrderModel->order_receiving_date = $validatedData['receiving_date'];
        $dhaagaClothingOrderModel->order_status = Config::get('constants.dhaaga_order_status_pending');
        $dhaagaClothingOrderModel->status = '1';
        $dhaagaClothingOrderModel->created_by = Auth::id();


        if ($dhaagaClothingOrderModel->save()) {
            return response()->json(['status'=>'true' , 'message' => 'Order data add successfully'] , 200);
        }else{
             return response()->json(['status'=>'errorr' , 'message' => 'error occured please try again'] , 200);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // ******************* datatable ***************************

    public function datatable()
    {
        return response()->json(DhaagaClothingOrder::with('dhaagaClothingVendor')->get(), 200);
    }

    // ******************* change order status 
    public function changeOrderStatus(Request $request)
    {
        
        // return $request->all();
        $validatedData = $request->validate([
            'orderStatus' =>'required',
            'orderId' =>'required|numeric',
        ]);

        // return $validatedData;

        $orderFindModel = DhaagaClothingOrder::find($validatedData['orderId']);

        $orderFindModel->user_id = Auth::id();
        $orderFindModel->order_status = $validatedData['orderStatus'];

        if ($orderFindModel->save()) {
            return response()->json(['status'=>'true' , 'message' => 'order status update successfully'] , 200);
        }else{
             return response()->json(['status'=>'errorr' , 'message' => 'error occured please try again'] , 200);
        }


    }
}
