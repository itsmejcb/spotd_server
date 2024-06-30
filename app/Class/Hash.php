<?php

namespace App\Class;

class Hash
{
    public function generateSalt(int $length = 16): string
    {
        return bin2hex(random_bytes($length));
    }

    public function hashToken(string $token, string $salt = null): string
    {
        if ($salt === null) {
            $salt = self::generateSalt();
        }
        $salted_token = $token . $salt;
        return $salt . hash('sha256', $salted_token);
    }

    public function verifyHash(string $token, string $hashed_token): bool
    {
        $saltLength = strlen(hash('sha256', '', true)); // Get actual SHA-256 hash length
        $salt = substr($hashed_token, 0, $saltLength);
        return self::hashToken($token, $salt) === $hashed_token;
    }
}
