<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Traits\SendData\SendToBlog;

class SendDataTest extends TestCase
{
    use SendToBlog;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {

        $test_succ = $this->send_succ();
        $result =response()->json([
            'status'=> true,
         ]);

        $this->assertEquals($result , $test_succ);
    }
}
