<?php

namespace App\Models\Sanctum;

use Illuminate\Support\Facades\Log;
use Laravel\Sanctum\PersonalAccessToken as SanctumPersonalAccessToken;

class PersonalAccessToken extends SanctumPersonalAccessToken
{
    // Add custom attributes or methods here

    // Example: Add a custom attribute
    public function getCustomAttribute()
    {
        return 'This is a custom attribute';
    }

    // Example: Override an existing method to include logging
    public function tokenable()
    {
        // Log token access
        Log::info('Token accessed by user ID: ' . $this->tokenable_id);

        return $this->morphTo('tokenable', 'tokenable_type', 'tokenable_id');
    }

    // Example: Add a custom method to check if the token is expired
    public function isExpired()
    {
        // Check if the token is expired based on a 30-day validity period
        return $this->created_at->addDays(30)->isPast();
    }

    // Example: Add a custom method to validate token scopes
    public function hasValidScope($requiredScope)
    {
        // Retrieve the token scopes
        $scopes = $this->abilities;

        // Check if the required scope is present
        return in_array($requiredScope, $scopes);
    }

    // Example: Add a custom method to get remaining days before expiration
    public function daysUntilExpiration()
    {
        $expirationDate = $this->created_at->addDays(30);
        $remainingDays = now()->diffInDays($expirationDate, false);

        return $remainingDays > 0 ? $remainingDays : 0;
    }

    // Example: Add a custom method to revoke the token
    public function revoke()
    {
        $this->delete();

        // Log token revocation
        Log::info('Token revoked for user ID: ' . $this->tokenable_id);
    }
}
