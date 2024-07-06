<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

// use Tests\TestCase;
abstract class TestCase extends BaseTestCase
{
    public function test()
    {
        // Timestamp of data created yesterday
        $id = 1;
        $user_id = 1;
        $user_id = $user_id ? $user_id : $id;
        echo "User ID: " . $user_id . "\n";

// Assertions
        $this->assertEquals(1, $user_id);
        echo "User ID: " . $user_id . "\n";

    }
}
