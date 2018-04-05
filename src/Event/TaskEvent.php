<?php
/**
 * Created by PhpStorm.
 * User: diego
 * Date: 5/04/18
 * Time: 17:20
 */

namespace App\Event;


use App\Entity\Task;
use Symfony\Component\EventDispatcher\Event;

class TaskEvent extends Event
{
    /**
     * @var Task
     */
    private $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    /**
     * @return Task
     */
    public function getTask(): Task
    {
        return $this->task;
    }


}