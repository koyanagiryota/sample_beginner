<?php

namespace App\Http\Controllers;

use App\Folder;
use App\Work;
use App\Http\Requests\CreateTask;
use App\Http\Requests\EditTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(int $id)
    {
        $folders = Auth::user()->folders()->get();

        $current_folder = Folder::find($id);

        //$tasks = Work::where('folder_id',$current_folder->id)->get();
        $tasks = $current_folder->tasks()->get();

        return view('tasks/index',[ 
            'folders' => $folders,
            'current_folder_id' => $id,
            'tasks' => $tasks,
        ]);
    }

    public function showCreateForm(int $id)
    {
        return view('tasks/create',[
            'folder_id' => $id
        ]);
    }

    public function create(int $id, CreateTask $request)
    {
        $current_folder = Folder::find($id);

        $task = new Work();
        $task->title = $request->title;
        $task->due_date = $request->due_date;

        $current_folder->tasks()->save($task);

        return redirect()->route('tasks.index',[
            'id' => $current_folder->id,
        ]);

    }

    public function showEditForm(int $id, int $task_id)
    {
        $task = Work::find($task_id);

        return view( 'tasks/edit' ,[
            'task' => $task,
        ]);
    }

    public function edit(int $id, int $task_id, EditTask $request)
    {
        $task = Work::find($task_id);

        $task->title = $request->title;
        $task->status = $request->status;
        $task->due_date = $request->due_date;
        $task->save();

        return redirect()->route('tasks.index',[
            'id' => $task->folder_id,
        ]);


    }



}