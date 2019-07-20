<?php

use App\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->initTasks();
    }

    public function initTasks()
    {
        $tasks = [
            ['タスク１', 1],
            ['タスク２', 1],
            ['タスク３', 1],
            ['タスク４', 1],
            ['タスク５', 1],
        ];

        Task::truncate();

        foreach ($tasks as $task) {
            Task::create([
                'contents'           => $task[0],
                'users_id'           => $task[1],
            ]);
        }
    }
}
