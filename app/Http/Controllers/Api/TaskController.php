<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Task\CreateRequest;
use App\Http\Requests\Api\Task\UpdateRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index()
    {
        return response()->json(['message' => 'Hello, World!']);
    }

    public function store(CreateRequest $createRequest)
    {
        $request = $createRequest->validated();
        $result = $this->taskService->create($request);

        if ($result) {
            return response()->apiSuccess('create success', new TaskResource($result));
        }

        return response()->apiError('create error');
    }

    public function show(Task $task)
    {
        return response()->apiSuccess('show success', new TaskResource($task));
    }

    public function update(UpdateRequest $updateRequest, Task $task)
    {
        $request = $updateRequest->validated();
        $result = $this->taskService->update($task, $request);

        if ($result) {
            return response()->apiSuccess('update success');
        }

        return response()->apiError('update error');
    }

    public function destroy(Task $task)
    {
        $result = $this->taskService->delete($task);

        if ($result) {
            return response()->apiSuccess('delete success');
        }

        return response()->apiError('delete error');
    }
}
