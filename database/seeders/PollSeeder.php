<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Poll;
use App\Models\PollOption;

class PollSeeder extends Seeder
{
    public function run()
    {
        // Create a new poll
        $poll = Poll::create([
            'question' => 'What is your favorite news category?',
            'is_active' => true,
        ]);

        // Add options to the poll
        PollOption::insert([
            ['poll_id' => $poll->id, 'option' => 'Technology', 'votes' => 0],
            ['poll_id' => $poll->id, 'option' => 'Business', 'votes' => 0],
            ['poll_id' => $poll->id, 'option' => 'Entertainment', 'votes' => 0],
            ['poll_id' => $poll->id, 'option' => 'Sports', 'votes' => 0],
            ['poll_id' => $poll->id, 'option' => 'Health', 'votes' => 0],
        ]);
    }
}
