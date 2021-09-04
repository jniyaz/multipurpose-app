<?php

namespace Tests\Feature;

use Carbon\Factory;
use Tests\TestCase;
use App\Models\User;
use App\Models\Project;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Tymon\JWTAuth\Facades\JWTAuth;

use function PHPUnit\Framework\assertJson;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function auth_user_can_create_new_project()
    {
        $this->withoutExceptionHandling();
        $token = $this->authUser();

        $res = $this
            ->withHeader('Authorization', "Bearer {$token}")
            ->post('/api/v1/projects', $this->attributes());

        $res->assertStatus(201)
            ->assertJson(['status' => 'ok']);
        $this->assertCount(1, Project::all());
    }

    /** @test */
    public function auth_user_can_edit_the_project()
    {
        $this->withoutExceptionHandling();
        $token = $this->authUser();
        $project = $this->createNewProject($token);

        $res = $this
            ->withHeader('Authorization', "Bearer {$token}")
            ->patch('/api/v1/projects/' . $project->id, [
                'title' => 'updated title',
                'description' => 'updated description'
            ]);
        $res->assertStatus(200)
            ->assertJson(['status' => 'ok']);
        $this->assertCount(1, Project::all());
    }

    /** @test */
    public function auth_user_can_delete_a_project()
    {
        $this->withoutExceptionHandling();
        $token = $this->authUser();
        $project = $this->createNewProject($token);

        $res = $this->withHeader('Authorization', "Bearer {$token}")->delete('/api/v1/projects/' . $project->id);
        $res->assertStatus(200)
            ->assertJson(['status' => 'OK']);
        $this->assertCount(0, Project::all());
    }

    /** @test */
    public function title_is_required_to_create_project()
    {
        $token = $this->authUser();
        try {
            $res = $this->withHeaders(['Authorization' => "Bearer {$token}", 'Accept' => 'application/json'])
                ->post('/api/v1/projects', [
                    'title' => '',
                    'description' => 'desc'
                ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $res = $e->errors();
            $this->assertEquals('The title field is required.', $res['title'][0]);
        }
    }

    private function authUser()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        return JWTAuth::fromUser($user);
    }

    private function createNewProject($token)
    {
        $this->withHeader('Authorization', "Bearer {$token}")
            ->post('/api/v1/projects', $this->attributes());
        return Project::first();
    }

    private function attributes()
    {
        return [
            'title' => $this->faker->name,
            'description' => $this->faker->sentence
        ];
    }
}
