<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Redirect;
use Session;

class TasksController extends Controller
{
    public function index()
    {
        if(auth()->user()->role == 0)
        {
            $tasks = Task::all();
            $users = \App\Models\User::where('role', 1)->get();
        }
        else
        {
            $tasks = auth()->user()->tasks();
            $users = null;
        }

        return view('dashboard', compact('tasks', 'users'));
    }
    public function add()
    {
    	return view('add');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'description' => 'required'
        ]);
    	$task = new Task();
    	$task->description = $request->description;
    	$task->user_id = auth()->user()->id;
    	$task->save();
        Session::flash('message', "Task created successfully");
    	return redirect('/dashboard');
    }

    public function edit(Task $task)
    {

    	if (auth()->user()->id == $task->user_id)
        {
                return view('edit', compact('task'));
        }
        else {
             Session::flash('error', "You are not authorized to edit this task");
             return redirect('/dashboard');
         }
    }

    public function update(Request $request, Task $task)
    {
    	if(isset($_POST['delete'])) {
    		$task->delete();
            Session::flash('message', "Task deleted successfully");
    		return redirect('/dashboard');
    	}
    	else
    	{
            $this->validate($request, [
                'description' => 'required'
            ]);
    		$task->description = $request->description;
	    	$task->save();
            Session::flash('message', "Task updated successfully");
	    	return redirect('/dashboard');
    	}
    }

    public function createUser(Request $request)
    {
        if(auth()->user()->role == 0)
        {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required'
            ]);
            // check is email exists
            $user = \App\Models\User::where('email', $request->email)->first();
            if($user)
            {
                Session::flash('message', "Email already exists");
                return Redirect::back();
            }
            $user = new \App\Models\User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = $request->role;
            $user->password = bcrypt($request->password);
            $user->save();
            Session::flash('message', "User created successfully");
            return Redirect::back();
        }
        else{
            Session::flash('message', "You are not authorized to create users");
            return Redirect::back();
        }
    }

    public function deleteUser($id)
    {
        // check if user exists
        $user = \App\Models\User::find($id);
        if(!$user)
        {
            Session::flash('message', "User does not exist");
            return Redirect::back();
        }
        if(auth()->user()->role == 0)
        {
            $user = \App\Models\User::find($id);
            $user->delete();
            Session::flash('message', "User deleted successfully");
            return Redirect::back();
        }
        else{
            Session::flash('message', "You are not authorized to delete users");
            return Redirect::back();
        }
    }
}
