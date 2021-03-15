<?php

namespace App\Http\Controllers\Dastarkhwan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDailyDastarkhwanRecord;
use App\Models\DailyDastarkhwanRecord;
use Illuminate\Support\Facades\Auth;

class DailyDastarkhwanRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \View::make('dastarkhwan.daily-dastarkhwan-record.daily-dastarkhwan-records-list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \View::make('dastarkhwan.daily-dastarkhwan-record.daily-dastarkhwan-record-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDailyDastarkhwanRecord $request)
    {
        $validatedData = $request->validated();

        $dailyDasterKhwanModel = new DailyDastarkhwanRecord();

        $dailyDasterKhwanModel->date = $validatedData['date'];
        $dailyDasterKhwanModel->location = $validatedData['location'];
        $dailyDasterKhwanModel->timing = $validatedData['timing'];
        $dailyDasterKhwanModel->name_of_item_distributed = $validatedData['name_of_items_distributed'];
        $dailyDasterKhwanModel->number_of_people = $validatedData['number_of_people'];
        $dailyDasterKhwanModel->amount_collected = $validatedData['amount_collected'];

        $dailyDasterKhwanModel->status = '1';
        $dailyDasterKhwanModel->created_by = Auth::id();


         if ($dailyDasterKhwanModel->save()) {
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
        return response()->json(DailyDastarkhwanRecord::all(), 200);
    }
}
