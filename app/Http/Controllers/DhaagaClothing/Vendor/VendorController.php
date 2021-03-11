<?php

namespace App\Http\Controllers\DhaagaClothing\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDhaagaClothingVendor;
use App\Models\DhaagaClothingVendor;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use illuminate\Support\Facades\Auth;



class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \View::make('dhaaga-clothing.vendors.vendors-list');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \View::make('dhaaga-clothing.vendors.vendor-create');
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDhaagaClothingVendor $request)
    {
        
        
        $validatedData = $request->validated();

        $dhaagaClothingvendorModel = new DhaagaClothingVendor();

        $dhaagaClothingvendorModel->dhaaga_clothing_vendor_id = IdGenerator::generate(['table' => 'dhaaga_clothing_vendors', 'length' => 13, 'field' => 'dhaaga_clothing_vendor_id', 'prefix' => 'VNDR-']);;
        $dhaagaClothingvendorModel->vendor_type = $validatedData['vendor_type'];
        $dhaagaClothingvendorModel->vendor_name = $validatedData['vendor_name'];
        $dhaagaClothingvendorModel->purchased_products = $validatedData['product_purchased'];

        $dhaagaClothingvendorModel->phoneNo = $validatedData['phoneNo'];
        $dhaagaClothingvendorModel->address = $validatedData['address'];

        $dhaagaClothingvendorModel->status = '1';
        $dhaagaClothingvendorModel->created_by = Auth::id();


         if ($dhaagaClothingvendorModel->save()) {
            return response()->json(['status'=>'true' , 'message' => 'vendor data add successfully'] , 200);
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
        return response()->json(DhaagaClothingVendor::all(), 200);
    }

     // ****************** get all vendor ***********************

     public function select2(Request $request)
     {
         return response()->json(DhaagaClothingVendor::where('vendor_name','like',"%$request->searchTerm%")->get(['id' , 'vendor_name']));
         
     }
}
