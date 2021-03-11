<?php

namespace App\Http\Controllers\DhaagaClothing\TrendAnalysis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDhaagaClothingTrendAnalysis;
// use App\Http\Requests\UpdateDhaagaClothingTrendAnalysis;
use App\Models\DhaagaClothingTrendAnalysis;
use Illuminate\Support\Facades\Auth;
use JavaScript;



class TrendAnalysisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \View::make('dhaaga-clothing.trendAnalysis.trend-analysis-list');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \View::make('dhaaga-clothing.trendAnalysis.trend-analysis-create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDhaagaClothingTrendAnalysis $request)
    {
        $validatedData = $request->validated();

        $trendAnalysisModel = new DhaagaClothingTrendAnalysis();

        $trendAnalysisModel->code = $validatedData['code'];
        $trendAnalysisModel->number_sold = $validatedData['number_sold'];
        $trendAnalysisModel->amount_received = $validatedData['amount_received'];
        $trendAnalysisModel->customer_feedback = $validatedData['customer_feedback'];

        $trendAnalysisModel->status = '1';
        $trendAnalysisModel->created_by = Auth::id();


         if ($trendAnalysisModel->save()) {
            return response()->json(['status'=>'true' , 'message' => 'Trend Analysis data add successfully'] , 200);
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

    // ******************* get all data ***************

    public function datatable()
    {
        return \response()->json(DhaagaClothingTrendAnalysis::orderBy('id')->get() , 200);

    }
}
