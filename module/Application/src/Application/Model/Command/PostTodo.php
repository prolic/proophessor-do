<?php
/*
 * This file is part of prooph/proophessor.
 * (c) 2014-2015 prooph software GmbH <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * Date: 5/2/15 - 5:50 PM
 */
namespace Application\Model\Command;

use Application\Model\Todo\TodoId;
use Application\Model\User\UserId;
use Prooph\Common\Messaging\Command;

/**
 * Class PostTodo
 *
 * @package Application\Model\Todo
 * @author Alexander Miertsch <kontakt@codeliner.ws>
 */
final class PostTodo extends Command
{
    /**
     * @param string $assigneeId
     * @param string $text
     * @param string $todoId
     * @return PostTodo
     */
    public static function forUser($assigneeId, $text, $todoId)
    {
        return new self(__CLASS__, [
            'assignee_id' => (string)$assigneeId,
            'todo_id' => (string)$todoId,
            'text' => (string)$text
        ]);
    }

    /**
     * @return TodoId
     */
    public function todoId()
    {
        return TodoId::fromString($this->payload['todo_id']);
    }

    /**
     * @return UserId
     */
    public function assigneeId()
    {
        return UserId::fromString($this->payload['assignee_id']);
    }

    /**
     * @return string
     */
    public function text()
    {
        return $this->payload['text'];
    }
} 