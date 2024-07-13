<?php

namespace Modules\Task\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use Modules\Task\Services\TaskServices;

class TaskController extends Controller
{
    private $taskService;

    public function __construct(TaskServices $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index()
    {
        $tasks = $this->taskService->getTasks();

        return response()->json($tasks);
    }

    public function create(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();
        if (!$user) {
            return response()->json(['task_not_found'], 404);
        }
        $validatedData = $this->taskService->validateFields($request);
        $task = $this->taskService->createTask($user, $validatedData);

        return response()->json(compact('task'), 201);
    }

    public function show($id)
    {
        $task = $this->taskService->getTaskById($id);
        if (!$task) {
            return response()->json(['error' => 'Task not found'], 404);
        }

        return response()->json($task);
    }

    public function update(Request $request, $id)
    {
        $task = $this->taskService->getTaskById($id);
        if (!$task) {
            return response()->json(['error' => 'Task not found'], 404);
        }

        $this->taskService->updateTask($task, $request);

        return response()->json($task);
    }

    public function destroy($id)
    {
        $task = $this->taskService->getTaskById($id);
        if (!$task) {
            return response()->json(['error' => 'Task not found'], 404);
        }
        $this->taskService->deleteTask($task);

        return response()->json(['success' => 'Task deleted successfully']);
    }
}
