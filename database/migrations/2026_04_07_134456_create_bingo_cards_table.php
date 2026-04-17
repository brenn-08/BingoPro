public function up()
{
    Schema::create('bingo_cards', function (Blueprint $table) {
        $table->id();
        $table->string('title')->nullable(); // e.g., "Celebration Edition"
        $table->text('description')->nullable();
        $table->json('numbers'); // Array of 25 numbers: [[1,15,30,...], ...] for grid
        $table->string('game_mode')->default('terna-bingo'); // 'terna-bingo' or 'royal-blackout'
        $table->timestamps();
    });
}