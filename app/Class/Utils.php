<?php

namespace App\Class;

use Illuminate\Support\Facades\DB;

class Utils
{
    public function getMS()
    {
        return round(microtime(true) * 1000);
        // return (int) round(microtime(true) * 1000);
    }

    public function datetimeToMilliseconds($datetime)
    {
        // Convert datetime to Unix timestamp in seconds
        $timestamp = strtotime($datetime);

        // Convert timestamp to milliseconds
        $milliseconds = $timestamp * 1000;

        return $milliseconds;
    }

    public function censorEmail($email)
    {
        return substr($email, 0, 2) . str_repeat('*', 8) . substr($email, -2) . strstr($email, '@');
    }

    public function getOTP($length = 6)
    {
        $characters = '0123456789';
        $code = '';
        for ($i = 0; $i < $length; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $code;
    }

    public static function clean($input)
    {
        if ($input !== null) {
            if (is_array($input)) {
                $input = implode(', ', $input);
            }
            $input = stripcslashes($input);
            $result = DB::connection()->getPdo()->quote($input);
            // Trim the result to remove leading and trailing single quotes
            return $result ? trim($result, "'") : false;
        }
    }

    public function generateUID()
    {
        $min = 1000000000;
        $max = 9999999999;
        $random_number = rand($min, $max);
        $UID = '1' . date('Y') . $random_number;

        $existingUID = DB::table('users')
            ->where('uid', $UID)
            ->exists();

        // If the generated UID already exists, recursively call the function to generate a new one
        if ($existingUID) {
            return $this->generateUID();
        }

        // If the generated UID doesn't exist, return it
        return $UID;
    }

    public function generatePushKey()
    {
        $min = 1000000000;
        $max = 9999999999;
        $random_number = rand($min, $max);
        $push_key = date('d') . date('Y') . date('m') . $random_number;

        $existingUID = DB::table('posts')
            ->where('push_key', $push_key)
            ->exists();

        // If the generated UID already exists, recursively call the function to generate a new one
        if ($existingUID) {
            return $this->generatePushKey();
        }

        // If the generated UID doesn't exist, return it
        return $push_key;
    }

}
