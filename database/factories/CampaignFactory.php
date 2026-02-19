<?php

namespace Database\Factories;

use App\Models\Campaign;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CampaignFactory extends Factory
{
    protected $model = Campaign::class;

    public function definition(): array
    {
        $target = $this->faker->randomElement([null, 50000, 100000, 200000, 500000]);
        $start  = $this->faker->optional(0.8)->dateTimeBetween('-3 months', '+1 week');
        $end    = $start ? $this->faker->optional(0.7)->dateTimeBetween($start, '+6 months') : null;

        return [
            'code' => 'CMP-' . Str::upper(Str::random(10)),

            'category_id' => null,   // set in seeder if you want
            'project_id'  => null,   // optional

            'target_amount'    => $target,
            'collected_amount' => 0,

            'start_date' => $start?->format('Y-m-d'),
            'end_date'   => $end?->format('Y-m-d'),

            'status' => $this->faker->randomElement(['draft','active','paused','completed','archived']),

            'is_active'   => true,
            'is_featured' => $this->faker->boolean(25),
            'is_urgent'   => $this->faker->boolean(15),

            'cover_image' => null,
            'video_url'   => null,

            'sort_order' => $this->faker->numberBetween(0, 50),
        ];
    }

    public function active(): static
    {
        return $this->state(fn () => ['status' => 'active', 'is_active' => true]);
    }

    public function featured(): static
    {
        return $this->state(fn () => ['is_featured' => true]);
    }

    public function urgent(): static
    {
        return $this->state(fn () => ['is_urgent' => true]);
    }
}
