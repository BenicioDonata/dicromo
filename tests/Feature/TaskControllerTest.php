<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Modules\Task\Entities\Task;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TaskControllerTest extends TestCase
{
    /** @test */
    public function it_lists_tasks()
    {
        $user = User::factory()->create();
        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->getJson('/api/tasks');

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     '*' => ['id','user_id', 'name','created_at', 'updated_at'],
                 ]);
    }

    /** @test */
    public function it_updates_a_task()
    {
        $user = User::factory()->create();
        $token = auth()->login($user);

        $newTask = Task::factory()->create([
            'user_id' => $user->id,
            'name' => 'test',
        ]);

        $updatedData = [
            'user_id' => $user->id,
            'name' => 'Updated Name Task',
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->putJson("/api/task/{$newTask->id}", $updatedData);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_deletes_a_task()
    {
        $user = User::factory()->create();
        $token = auth()->login($user);

        $newTask = Task::factory()->create([
            'user_id' => $user->id,
            'name' => 'test',
        ]);

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->deleteJson("/api/task/{$newTask->id}");

        $response->assertStatus(200);
        $this->assertDatabaseMissing('tasks', ['id' => $newTask->id]);
    }
}
