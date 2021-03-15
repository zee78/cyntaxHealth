<?php

namespace App\Http\Controllers\TaskAssignment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTaskAssignment;
use App\Models\TaskAssignment;
use Illuminate\Support\Facades\Auth;


class TaskAssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \View::make('taskAssignment.taskAssignmentForm.task-assignments-list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \View::make('taskAssignment.taskAssignmentForm.task-assignment-create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskAssignment $request)
    {
        $validatedData = $request->validated();

        $taskAssignmentModel = new TaskAssignment();

        $taskAssignmentModel->name_of_task = $validatedData['name_of_task'];
        $taskAssignmentModel->date_of_task_assignment = $validatedData['date_of_task_assignment'];
        $taskAssignmentModel->deadline_for_task_submission = $validatedData['deadline_for_task_submission'];
        $taskAssignmentModel->nature_of_task = $validatedData['nature_of_task'];
        $taskAssignmentModel->description_of_task = $validatedData['description_of_task'];


        $taskAssignmentModel->status = '1';
        $taskAssignmentModel->created_by = Auth::id();


         if ($taskAssignmentModel->save()) {
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
        return response()->json(TaskAssignment::all(), 200);
    }
}
