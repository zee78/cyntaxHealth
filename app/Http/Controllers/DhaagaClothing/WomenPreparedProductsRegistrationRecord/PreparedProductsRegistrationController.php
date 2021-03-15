<?php

namespace App\Http\Controllers\DhaagaClothing\WomenPreparedProductsRegistrationRecord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDhaagaClothingProductRegistartion;
use App\Http\Requests\UpdateDhaagaClothingProductRegistartion;
use App\Models\DhaagaClothingProductRegistration;
use Illuminate\Support\Facades\Auth;

class PreparedProductsRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \View::make('dhaaga-clothing.womenPreparedProductsRegistrationRecord.product-registrations-list');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \View::make('dhaaga-clothing.womenPreparedProductsRegistrationRecord.product-registration-create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDhaagaClothingProductRegistartion $request)
    {
        $validatedData = $request->validated();

        $dhaagaClothingsStitchingRegistrationModel = new DhaagaClothingProductRegistration();
        // dd($request->all());
        $dhaagaClothingsStitchingRegistrationModel->name = $validatedData['name'];
        $dhaagaClothingsStitchingRegistrationModel->cnic = $validatedData['cnic'];
        $dhaagaClothingsStitchingRegistrationModel->phone_no = $validatedData['phoneNo'];
        $dhaagaClothingsStitchingRegistrationModel->speciality = $validatedData['specility'];
        $dhaagaClothingsStitchingRegistrationModel->address = $validatedData['address'];
        $dhaagaClothingsStitchingRegistrationModel->enrolment_date = $request->enrolmentDate;

        $dhaagaClothingsStitchingRegistrationModel->status = '1';
        $dhaagaClothingsStitchingRegistrationModel->created_by = Auth::id();


         if ($dhaagaClothingsStitchingRegistrationModel->save()) {
            return response()->json(['status'=>'true' , 'message' => ' data add successfully'] , 200);
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
      $getSingleData = DhaagaClothingProductRegistration::find($id);
        // return $getSingleData->id;

      return \View::make('dhaaga-clothing.womenPreparedProductsRegistrationRecord.product-registration-update' , compact('getSingleData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDhaagaClothingProductRegistartion $request, $id)
    {
      $validatedData = $request->validated();

      $findData = DhaagaClothingProductRegistration::find($id);

      $findData->name = $validatedData['name'];
      $findData->cnic = $validatedData['cnic'];
      $findData->phone_no = $validatedData['phoneNo'];
      $findData->speciality = $validatedData['specility'];
      $findData->address = $validatedData['address'];
      $findData->enrolment_date = $request->enrolmentDate;

      $findData->status = '1';
      $findData->created_by = Auth::id();


       if ($findData->save()) {
          return response()->json(['status'=>'true' , 'message' => ' data updated successfully'] , 200);
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
      $deleteData = DhaagaClothingProductRegistration::find($id);
      if($deleteData->delete()){
          return response()->json(['status'=>'true' , 'message' => 'Data deleted successfully'] , 200);

      }else{
          return response()->json(['status'=>'error' , 'message' => 'error occured please try again'] , 200);

      }
    }

    public function datatable()
    {
        return response()->json(DhaagaClothingProductRegistration::all(), 200);
    }
}
