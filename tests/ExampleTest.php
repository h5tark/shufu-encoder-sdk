<?php

namespace Hoangstark\ShufuEncoderSdk\Tests;

use PHPUnit\Framework\TestCase;
use Hoangstark\ShufuEncoderSdk\ShufuEncoderSdk;

class ExampleTest extends TestCase
{
    /** @test */
    public function login()
    {
    	$shufuEncoder = new ShufuEncoderSdk;
        $login = $shufuEncoder->login('http://localhost:8080/api/login', 'shufu', 'secret');
        $this->assertTrue($login);
    }
}
