<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use App\Event\TaskEvent;

class TaskMailerSubscriber implements EventSubscriberInterface
{
    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function onTaskCreated(TaskEvent $event)
    {
        $task = $event->getTask();

        $message=new \Swift_Message();
        $message
            ->setFrom("testdiegorr@gmail.com")
            ->setTo($task->getOwner()->getEmail())
            ->setSubject("nueva tarea")
            ->setBody($task->getDesctiption());
        $this->mailer->send($message);
    }

    public static function getSubscribedEvents()
    {
        return [
           'task.created' => 'onTaskCreated',
        ];
    }
}
