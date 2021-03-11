<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTask;
use Illuminate\Support\Facades\Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Config;
use App\User;
use App\Models\Task;
use App\Models\TaskAssignTo;
use Illuminate\Support\Facades\DB;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \View::make("Task.tasks-list");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \View::make("Task.task-create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTask $request)
    {
        DB::beginTransaction();

        try {
            
          
            
            $validatedData = $request->validated();
            $taskModel = new Task();
            $taskModel->task_id = IdGenerator::generate(['table' => 'tasks', 'length' => 13, 'field' => 'task_id', 'prefix' => 'TSK-']);
            $taskModel->task_title = $validatedData['taskTitle'];
            $taskModel->task_detail = $validatedData['taskDetail'];
            $taskModel->task_status = Config::get('constants.task_status_pending');
            $taskModel->status = '1';
            $taskModel->created_by = Auth::id();

            $taskModel->save();


            if (empty($request->userName) && $request->has('allUser')) {
                $usersList = User::get('id');          
                foreach($usersList as $key =>$user){
                    $taskAssignTo = new TaskAssignTo();

                    $taskAssignTo->task_assign_to_id = IdGenerator::generate(['table' => 'task_assign_tos', 'length' => 13, 'field' => 'task_assign_to_id', 'prefix' => 'TAT-']);
                    $taskAssignTo->user_id = $user->id ;
                    $taskAssignTo->task_id = $taskModel->id ;
                    $taskAssignTo->status = '1' ;
                    $taskAssignTo->created_by = Auth::id() ;

                    $taskAssignTo->save();
                    
                }
            }else{
                
                foreach ($request->userName as $value) {
                    $taskAssignTo = new TaskAssignTo();

                    $taskAssignTo->task_assign_to_id = IdGenerator::generate(['table' => 'task_assign_tos', 'length' => 13, 'field' => 'task_assign_to_id', 'prefix' => 'TAT-']);
                    $taskAssignTo->user_id = $value ;
                    $taskAssignTo->task_id = $taskModel->id ;
                    $taskAssignTo->status = '1' ;
                    $taskAssignTo->created_by = Auth::id() ;

                    $taskAssignTo->save();
                }
            }



            DB::commit();
            return \response()->json(['status'=>'true' , 'message'=>'Task Assign successfully']);

        } catch (\Exception  $e) {
            //throw $th;
            return $e;
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

        DB::beginTransaction();

        try {

            $taskAssignToDeleteRecord = TaskAssignTo::find($id);

            $taskAssignToDeleteRecord->delete();
            DB::commit();
            return \response()->json(['status'=>'true' , 'message'=>'Task deleted successfully']);

        } catch (\Exception  $e) {
            //throw $th;
            return $e;
        }




    }

    // ********************** datatable **************

    
    public function datatable()
    {
        if (Auth::id() == '1') {
            return response()->json(TaskAssignTo::with('task' , 'user')->get() , 200); 
        }else{
            return response()->json(TaskAssignTo::with('task' , 'user')->
                WhereHas('user', function($q){
                        $q->where('id' , '=' , Auth::id());
                })->get() , 200); 
        }
         
    }
}
