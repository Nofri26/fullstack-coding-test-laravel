<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\StoreTaskRequest;
use App\Http\Requests\api\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
	public function __construct(protected Task $task) {}


	/**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $tasks = $this->task->query()->get();

		return response()->json([
			'message' => 'Data fetched successfully',
			'data' => TaskResource::collection($tasks)
		]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request): JsonResponse
    {
        $data = $request->validated();
		$task = $this->task->query()->create($data);

		return response()->json([
			'message' => 'Data created successfully.',
			'data' => new TaskResource($task)
		]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task): JsonResponse
    {
        return response()->json([
			'message' => 'Data fetched successfully',
	        'data' => new TaskResource($task)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task): JsonResponse
    {
        $task->update($request->validated());

		return response()->json([
			'message' => 'Data updated successfully.',
			'data' => new TaskResource($task)
		]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task): JsonResponse
    {
		$task->delete();

        return response()->json([
			'message' => 'Data deleted successfully.',
	        'data' => true
        ]);
    }
}
