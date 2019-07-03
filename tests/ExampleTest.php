<?php

namespace Hoangstark\ShufuEncoderSdk\Tests;

use PHPUnit\Framework\TestCase;
use Hoangstark\ShufuEncoderSdk\ShufuEncoderSdk;

class ExampleTest extends TestCase
{
    private $endPoint = 'https://b1d5ff40-c90d-4380-a9ad-9ce190807a21.mock.pstmn.io';

    /** @test */
    public function login()
    {
    	$shufuEncoder = new ShufuEncoderSdk;
        $login = $shufuEncoder->login($this->endPoint, 'shufu', 'secret');
        $this->assertTrue($login);
    }

    /** @test */
    public function getTasks()
    {
    	$shufuEncoder = new ShufuEncoderSdk;
        $shufuEncoder->login($this->endPoint, 'shufu', 'secret');

        $task = $shufuEncoder->getTasks();

        $this->assertTrue(isset($task->data));
    }

    /** @test */
    public function getEncodingTasks()
    {
    	$shufuEncoder = new ShufuEncoderSdk;
        $shufuEncoder->login($this->endPoint, 'shufu', 'secret');

        $task = $shufuEncoder->getEncodingTasks();

        $this->assertTrue(isset($task->data));
    }

    /** @test */
    public function getTask()
    {
    	$shufuEncoder = new ShufuEncoderSdk;
        $shufuEncoder->login($this->endPoint, 'shufu', 'secret');

        $task = $shufuEncoder->getTask(1);

        $this->assertTrue(isset($task->data));
    }

    /** @test */
    public function getTaskProgress()
    {
    	$shufuEncoder = new ShufuEncoderSdk;
        $shufuEncoder->login($this->endPoint, 'shufu', 'secret');

        $task = $shufuEncoder->getTaskProgress(1);

        $percentage = (int) $task;
 
        $this->assertTrue( $percentage >= 0 && $percentage <= 100 );
    }

    /** @test */
    public function createTask()
    {
    	$shufuEncoder = new ShufuEncoderSdk;
        $shufuEncoder->login($this->endPoint, 'shufu', 'secret');

        $task = $shufuEncoder->createTask(array(
        	"webhook_success" => "https://enpii3jcfpr19.x.pipedream.net",
        	"webhook_error" => "https://en4vdjmi70ib.x.pipedream.net/",
        ));

        $message = '';
        if(isset($task->message)) {
        	$message = $task->message;
        }
 
        $this->assertTrue( $message == 'Task created' );
    }

    /** @test */
    public function updateTask()
    {
    	$shufuEncoder = new ShufuEncoderSdk;
        $shufuEncoder->login($this->endPoint, 'shufu', 'secret');

        $task = $shufuEncoder->updateTask(1, array(
        	"webhook_success" => "https://enpii3jcfpr19.x.pipedream.net",
        	"webhook_error" => "https://en4vdjmi70ib.x.pipedream.net/",
        ));

        $message = '';
        if(isset($task->message)) {
        	$message = $task->message;
        }
 
        $this->assertTrue( $message == 'Task updated' );
    }

    /** @test */
    public function queueTask()
    {
    	$shufuEncoder = new ShufuEncoderSdk;
        $shufuEncoder->login($this->endPoint, 'shufu', 'secret');

        $task = $shufuEncoder->queueTask(1);
        
        $message = '';
        if(isset($task->message)) {
        	$message = $task->message;
        }

        $assertMessages = array(
        	'Task does not have file',
        	'Task already encoded',
        	'Task queue dispatched',
        );
 
        $this->assertTrue( in_array($message, $assertMessages) );
    }
}
