<?php

namespace Modules\Task\Services;

use Modules\Task\Entities\Task;
use Modules\Task\Entities\TaskMongoDB;

final class TaskServices
{
    public function validateFields($request)
    {
        return $request->validate([
            'name' => 'required|string|max:255'
        ]);
    }

    public function getTasks()
    {
        $tasks = Task::all();

        return $tasks;
    }

    public function createTask($user, $validatedData)
    {
        $task = Task::create([
            'user_id' => $user->id,
            'name' => $validatedData['name']
        ]);

        //crea un documento en MongoDB
        $taskCollection = TaskMongoDB::create([
            'user_id' => $user->id,
            'name' => $validatedData['name']
        ]);

        $result = [
            'taskMysql' => $task,
            'taskMongoDB' => $taskCollection
        ];

        return $result;
    }

    public function getTaskById($id)
    {
        $task = Task::find($id);

        return $task;
    }

    public function updateTask($task, $request)
    {
        $task = $task->update($request->only(['name']));

        return $task;
    }

    public function deleteTask($task)
    {
        $task->delete();
    }

}
