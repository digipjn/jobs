<?php

declare(strict_types=1);

namespace Tests\Api;

use App\Models\Job;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class JobTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @return void
     */
    public function testListJobs(): void
    {
        $response = $this->get('/api/jobs');
        $response->assertStatus(200);
        $this->assertCount(20, $response['data']);
        $this->assertSame(20, $response['meta']['per_page']);
    }


    public function testCanRetrieveJob(): void
    {
        $job = Job::factory()->create([
            'title' => 'Test Name',
        ]);

        $response = $this->get('/api/jobs/' . $job->id);
        $response->assertStatus(200);
        $response->assertJsonFragment([
            'title' => 'Test Name',
        ]);
    }

    public function testCanCreateJob(): void
    {
        $data = [
            'title' => 'Title',
            'description' => 'Description',
        ];

        $response = $this->post('/api/jobs/', $data);
        $response->assertStatus(200);
        $response->assertJsonFragment($data);
        $this->assertDatabaseHas('jobs', $data);
    }

    public function testCanEditJob(): void
    {
        $job = Job::factory()->create([
            'title' => 'Test Title BAD',
        ]);

        $response = $this->put('/api/jobs/' . $job->id, [
            'title' => 'Test Title GOOD',
            'description' => $job->description,
        ]);

        $response->assertStatus(200);
        $response->assertJsonFragment([
            'title' => 'Test Title GOOD',
        ]);
        $this->assertSame('Test Title GOOD', $job->refresh()->title);
    }

    public function testCanDeleteJob(): void
    {
        $job = Job::factory()->create([
            'title' => 'Test Title BAD',
        ]);

        $response = $this->delete('/api/jobs/' . $job->id);
        $response->assertStatus(200);
        $response->assertJson(['success' => true]);

        $response = $this->get('/api/jobs/' . $job->id);
        $response->assertStatus(404);
        $response->assertJson(['message' => 'Not Found']);

    }
}
