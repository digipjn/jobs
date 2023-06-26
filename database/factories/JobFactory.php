<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class JobFactory
 * @package Database\Factories
 * @extends Factory<Job>
 */
class JobFactory extends Factory
{
    /**
     * @var class-string<Model|Job>
     */
    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->text(50),
            'description' => $this->faker->paragraph(10),
        ];
    }
}
