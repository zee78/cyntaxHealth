<?php

namespace App\Http\Controllers\CommunityEmpowerment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePoultryRegistrationRecord;
use App\Models\PoultryRegistrationRecord;
use Illuminate\Support\Facades\Auth;


class PoultryRegistrationRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \View::make('communityEmpowerment.poultryRegistrationRecord.poultry-registration-records-list');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \View::make('communityEmpowerment.poultryRegistrationRecord.poultry-registration-record-create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePoultryRegistrationRecord $request)
    {
        $validatedData = $request->validated();

        $poultryRegistrationRecordModel = new PoultryRegistrationRecord();

        $poultryRegistrationRecordModel->name = $validatedData['name'];
        $poultryRegistrationRecordModel->cnic = $validatedData['cnic'];
        $poultryRegistrationRecordModel->contact_number = $validatedData['phoneNo'];
        $poultryRegistrationRecordModel->enrolment_date = $validatedData['enrolment_date'];
        $poultryRegistrationRecordModel->number_of_poultry_given = $validatedData['number_of_poultry_given'];
        $poultryRegistrationRecordModel->amount = $validatedData['amount_status'];
        $poultryRegistrationRecordModel->address = $validatedData['address'];

        $poultryRegistrationRecordModel->status = '1';
        $poultryRegistrationRecordModel->created_by = Auth::id();


         if ($poultryRegistrationRecordModel->save()) {
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
        return response()->json(PoultryRegistrationRecord::all(), 200);
    }
}
