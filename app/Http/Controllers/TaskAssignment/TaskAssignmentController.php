<?php

namespace App\Http\Controllers\TaskAssignment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTaskAssignment;
use App\Http\Requests\UpdateTaskAssignment;
use App\Models\TaskAssignment;
use Illuminate\Support\Facades\Auth;
use JavaScript;



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
        $data = TaskAssignment::find($id);
        
        return \View::make('taskAssignment.taskAssignmentForm.task-assignment-edit' , compact('data'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaskAssignment $request, $id)
    {
        $validatedData = $request->validated();

        $taskAssignmentModel = TaskAssignment::find($id);

        $taskAssignmentModel->name_of_task = $validatedData['name_of_task'];
        $taskAssignmentModel->date_of_task_assignment = $validatedData['date_of_task_assignment'];
        $taskAssignmentModel->deadline_for_task_submission = $validatedData['deadline_for_task_submission'];
        $taskAssignmentModel->nature_of_task = $validatedData['nature_of_task'];
        $taskAssignmentModel->description_of_task = $validatedData['description_of_task'];


        $taskAssignmentModel->status = '1';
        $taskAssignmentModel->created_by = Auth::id();


         if ($taskAssignmentModel->save()) {
            return response()->json(['status'=>'true' , 'message' => 'data update successfully'] , 200);
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
        $deleteData = TaskAssignment::find($id);
        if($deleteData->delete()){
            return response()->json(['status'=>'true' , 'message' => ' data deleted successfully'] , 200);

        }else{
            return response()->json(['status'=>'error' , 'message' => 'error occured please try again'] , 200);

        }
    }
    public function datatable()
    {
        return response()->json(TaskAssignment::all(), 200);
    }
}
