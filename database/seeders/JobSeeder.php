<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Seeder;

/**
 * Class JobSeeder
 * @package Database\Seeders
 */
class JobSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        Job::factory(10)->createQuietly();
    }
}
