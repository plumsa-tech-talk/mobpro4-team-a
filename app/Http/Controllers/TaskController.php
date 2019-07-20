<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('task');
    }


    public function getTaskList()
    {
        $tasks = Task::all();

        return $tasks;
    }

    public function addTask(Request $request)
    {
        $data = $request->all();

        if (!$user = Auth::user()) {
            $user_id = 1;
        } else {
            $user_id = $user->id;
        }

        // システムデータ
        $system_data = [
            'users_id' => $user_id
        ];

        $result = Task::create(array_merge($data, $system_data));

        return \Response::json([
            $result->toArray()
        ], 201);
    }

    public function updateTask(Request $request)
    {
        $data = $request->all();

        if (!$user = Auth::user()) {
            $user_id = 1;
        } else {
            $user_id = $user->id;
        }

        $system_data = [
            'users_id' => $user_id
        ];

        $data = array_merge($data, $system_data);
        $task = Task::find($request->id);
        $result = $task->fill($data)->save();

        return Response::json([
            $result->toArray()
        ], 201);
    }
}
