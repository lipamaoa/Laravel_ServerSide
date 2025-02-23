<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
public function taskList(){
    $search=request()->query('search')?request()->query('search'): null;
    $tasks = $this->getTasks($search);
   
    $taskAvailable = $this->getTasksAvailable();


    return view('tasks.tasks', compact('tasks', 'taskAvailable'));
}


    public function getTasks($search)
    { $tasks = DB::table('tasks')->join('users', 'tasks.user_id', '=', 'users.id');

        if($search){
            $tasks=$tasks
            ->where("name", "LIKE", "%{$search}%");
            
        }

        $tasks=$tasks->select('tasks.id', 'tasks.name', 'tasks.description', 'tasks.status', 'tasks.due_at', 'users.name as user_name')
        ->get();

        return $tasks;
    }

    public function getTasksAvailable(){
        $taskAvailable=['sql', 'php', 'laravel', 'html', 'css', 'javascript'];

        return $taskAvailable;
    }

    public function getTaskById($id){
        $task = DB::table('tasks')->where('id', $id)->first();
        return view('tasks.task', compact('task'));
    }

    public function deleteTaskFromDB($id){
        DB::table('tasks')->where('id', $id)->delete();
        return back();
    }


    public function addTaskForm() {
        $usersSelection = DB::table('users')->select('id', 'name')->get();
        return view('tasks.add_task', compact('usersSelection'));
    }
 
    public function addTaskIntoDB(Request $request) {
 
        $request->validate([
            'name' => 'string|min:3',
            'description' => 'string|min:3',
            'due_at' => 'date',
            'status'=> 'integer',
            'user_id' => 'integer'
        ]);
 
        DB::table('tasks')->insert([
            'name' => $request->name,
            'description' => $request->description,
            'due_at' => $request->due_at,
            'status'=>$request->status,
            'user_id' => $request->user_id

        ]);
 
        return redirect()->route('tasks')->with('message', 'Tarefa criada com sucesso!');
 
    }
}