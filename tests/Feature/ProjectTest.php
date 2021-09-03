<?php

namespace Tests\Feature;

use Carbon\Factory;
use Tests\TestCase;
use App\Models\User;
use App\Models\Project;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Tymon\JWTAuth\Facades\JWTAuth;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function auth_user_can_create_new_project()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $token = JWTAuth::fromUser($user);

        $res = $this
                ->withHeader('Authorization', "Bearer {$token}")
                ->post('/api/v1/projects', $this->attributes());

        $res->assertStatus(201)
            ->assertJson(['status' => 'ok']);
        $this->assertCount(1, Project::all());
    }

    private function attributes()
    {
        return [
            'title' => $this->faker->name,
            'description' => $this->faker->sentence
        ];
    }
}
