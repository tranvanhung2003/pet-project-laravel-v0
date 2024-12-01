<?php

namespace App\Services;

use App\Models\Task;
use Exception;
use Illuminate\Support\Facades\Log;

class TaskService
{
    protected $model;

    public function __construct(Task $task)
    {
        $this->model = $task;
    }

    public function create($params)
    {
        try {
            $params['status'] = 1;

            return $this->model->create($params);
        } catch (Exception $exception) {
            Log::error($exception);

            return false;
        }
    }

    public function update($task, $params)
    {
        try {
            return $task->update($params);
        } catch (Exception $exception) {
            Log::error($exception);

            return false;
        }
    }

    public function delete($task)
    {
        try {
            return $task->delete();
        } catch (Exception $exception) {
            Log::error($exception);

            return false;
        }
    }
}
