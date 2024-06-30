<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

// use Tests\TestCase;
abstract class TestCase extends BaseTestCase
{
    public function it_checks_if_data_is_more_than_5_days_old()
    {
        // Timestamp of data created yesterday
        $timestamp_created = 1719711057000;

        // Current timestamp
        $current_timestamp = 1719714349019;

        // Calculate the difference in seconds
        $diff_seconds = ($current_timestamp - $timestamp_created) / 1000;

        // Convert seconds to days
        $days_difference = $diff_seconds / (60 * 60 * 24);

        // Assert that the data is less than 5 days old
        $this->assertLessThan(5, $days_difference, "The data is less than 5 days old.");
    }
}
