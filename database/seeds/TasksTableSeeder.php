<?php

use Illuminate\Database\Seeder;
use dsTaskr\Task;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($taskListID = 1; $taskListID <= 5; $taskListID++)
        {
        	$totalTasks = rand(2, 13);
	    	for($taskID = 0; $taskID < $totalTasks; $taskID++)
			{
		    	Task::create([
		    		'task_list_id' => $taskListID,
		    		'task_name' => $faker->streetAddress,
		    	]);
	    	}
	    }
    }
}
