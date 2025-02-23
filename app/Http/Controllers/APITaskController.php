<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskResource;
use App\Http\Resources\TaskResourceColllection;
use App\Models\Task;
use Illuminate\Http\Request;

class APITaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): TaskResourceColllection
    {
        return new TaskResourceColllection(resource: Task::paginate());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'user_id' => 'required',


        ]);

        Task::create($request->all());
        return response()->json('Submitted with success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task): TaskResource
    {
        return new TaskResource($task);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $task->update($request->all());
        return response()->json('Updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json('Task deleted successfully');
    }
}
