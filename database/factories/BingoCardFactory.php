public function definition(): array
{
    $numbers = [];
    for ($row = 0; $row < 5; $row++) {
        $rowNumbers = [];
        for ($col = 0; $col < 5; $col++) {
            $index = $row * 5 + $col;
            $rowNumbers[] = $index === 12 ? 'FREE' : fake()->numberBetween(1, 75);
        }
        $numbers[] = $rowNumbers;
    }
    
    return [
        'title' => 'Card #' . fake()->unique()->numberBetween(1, 1000),
        'description' => fake()->sentence(),
        'numbers' => $numbers,
        'game_mode' => fake()->randomElement(['1', '2']),
    ];
}
