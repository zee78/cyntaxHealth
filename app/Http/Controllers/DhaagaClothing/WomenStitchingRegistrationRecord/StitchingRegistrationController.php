<?php

namespace App\Http\Controllers\DhaagaClothing\WomenStitchingRegistrationRecord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDhaagaClothingStitchingRegistration;
use App\Http\Requests\UpdateDhaagaClothingStitchingRegistration;
use App\Models\DhaagaClothingStitchingRegistration;
use Illuminate\Support\Facades\Auth;

class StitchingRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \View::make('dhaaga-clothing.womenStitchingRegistrationRecord.stitching-registrations-list');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \View::make('dhaaga-clothing.womenStitchingRegistrationRecord.stitching-registration-create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDhaagaClothingStitchingRegistration $request)
    {
        // return $request->all();
        $validatedData = $request->validated();
        

        $dhaagaClothingsStitchingRegistrationModel = new DhaagaClothingStitchingRegistration();

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
        $getSingleData = DhaagaClothingStitchingRegistration::find($id);
        // return $getSingleData->id;

        return \View::make('dhaaga-clothing.womenStitchingRegistrationRecord.stitching-registration-update' , compact('getSingleData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDhaagaClothingStitchingRegistration $request, $id)
    {
        $validatedData = $request->validated();
        
        $findData = DhaagaClothingStitchingRegistration::find($id);

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
      $deleteData = DhaagaClothingStitchingRegistration::find($id);
      if($deleteData->delete()){
          return response()->json(['status'=>'true' , 'message' => 'Cloth stitching data deleted successfully'] , 200);

      }else{
          return response()->json(['status'=>'error' , 'message' => 'error occured please try again'] , 200);

      }
    }

    public function datatable()
    {
        return response()->json(DhaagaClothingStitchingRegistration::all(), 200);
    }
}
