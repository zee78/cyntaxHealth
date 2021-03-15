<?php

namespace App\Http\Controllers\Dastarkhwan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDailyExpenseSheet;
use App\Http\Requests\UpdateDailyExpenseSheet;
use App\Models\DailyExpenseSheet;
use Illuminate\Support\Facades\Auth;


class DailyExpenseSheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \View::make('dastarkhwan.daily-expense-sheet.daily-expense-sheets-list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \View::make('dastarkhwan.daily-expense-sheet.daily-expense-sheet-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDailyExpenseSheet $request)
    {
        $validatedData = $request->validated();

        $dailyExpenseSheetModel = new DailyExpenseSheet();

        $dailyExpenseSheetModel->date = $validatedData['date'];
        $dailyExpenseSheetModel->total_cost = $validatedData['total_cost'];
        $dailyExpenseSheetModel->name_of_items_purchased = $validatedData['name_of_items_purchased'];
        $dailyExpenseSheetModel->purchased_by = $validatedData['purchased_by'];

        $dailyExpenseSheetModel->status = '1';
        $dailyExpenseSheetModel->created_by = Auth::id();


         if ($dailyExpenseSheetModel->save()) {
            return response()->json(['status'=>'true' , 'message' => 'data add successfully'] , 200);
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
        $getSingleData = DailyExpenseSheet::find($id);
        // return $getSingleData->id;

        return \View::make('dastarkhwan.daily-expense-sheet.daily-expense-sheet-update' , compact('getSingleData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDailyExpenseSheet $request, $id)
    {
        $validatedData = $request->validated();

        $findData = DailyExpenseSheet::find($id);

        $findData->date = $validatedData['date'];
        $findData->total_cost = $validatedData['total_cost'];
        $findData->name_of_items_purchased = $validatedData['name_of_items_purchased'];
        $findData->purchased_by = $validatedData['purchased_by'];

        $findData->status = '1';
        $findData->created_by = Auth::id();


         if ($findData->save()) {
            return response()->json(['status'=>'true' , 'message' => 'data updated successfully'] , 200);
        }else{
             return response()->json(['status'=>'errorr' , 'message' => 'error occured please try again'] , 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteData = DailyExpenseSheet::find($id);
        if($deleteData->delete()){
            return response()->json(['status'=>'true' , 'message' => 'Data deleted successfully'] , 200);

        }else{
            return response()->json(['status'=>'error' , 'message' => 'error occured please try again'] , 200);

        }
    }

    public function datatable()
    {
        return response()->json(DailyExpenseSheet::all(), 200);
    }
}
