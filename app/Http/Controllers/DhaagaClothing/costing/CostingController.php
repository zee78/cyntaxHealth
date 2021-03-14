<?php

namespace App\Http\Controllers\DhaagaClothing\costing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDhaagaClothingCosting;
use App\Models\DhaagaClothingCosting;
use Illuminate\Support\Facades\Auth;

class CostingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \View::make('dhaaga-clothing.costing.costings-list');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \View::make('dhaaga-clothing.costing.costing-create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDhaagaClothingCosting $request)
    {
        $validatedData = $request->validated();

        $dhaagaClothingCostingModel = new DhaagaClothingCosting();

        $dhaagaClothingCostingModel->code = $validatedData['code'];
        $dhaagaClothingCostingModel->type = $validatedData['type'];
        $dhaagaClothingCostingModel->marketing_cost = $validatedData['marketing_cost'];
        $dhaagaClothingCostingModel->profit_percentage = $validatedData['profit_percentage'];
        $dhaagaClothingCostingModel->profit_amount = $validatedData['profit_amount'];
        $dhaagaClothingCostingModel->gst = $validatedData['gst'];
        $dhaagaClothingCostingModel->total_direct_cost = $validatedData['total_direct_cost'];
        $dhaagaClothingCostingModel->market_retail_price = $validatedData['market_retail_price'];
        $dhaagaClothingCostingModel->status = '1';
        $dhaagaClothingCostingModel->created_by = Auth::id();


        if ($dhaagaClothingCostingModel->save()) {
            return response()->json(['status'=>'true' , 'message' => 'costing data add successfully'] , 200);
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

    public function datatable()
    {
        return response()->json(DhaagaClothingCosting::all(), 200);
    }
}
