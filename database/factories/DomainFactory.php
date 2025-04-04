<?php

namespace Database\Factories;

use App\Models\User;
use App\Services\DomainService;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Domain>
 */
class DomainFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        $domainService = app(DomainService::class);

        return [
            'domain' => $domainService->sanitizeDomain($this->faker->unique()->domainName()),
        ];
    }
}
