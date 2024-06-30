<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Collection;

class UserRepository
{
    /**
     * Create a new user.
     *
     * @param array $data
     * @return User
     */
    public function create(array $data): User
    {
        return User::create($data);
    }

    /**
     * Find a user by ID.
     *
     * @param int $id
     * @return User|null
     */
    public function find(int $id): ?User
    {
        return User::find($id);
    }

    /**
     * Update a user by ID.
     *
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update(int $id, array $data): bool
    {
        $user = User::find($id);

        if ($user) {
            return $user->update($data);
        }

        return false;
    }

    /**
     * Delete a user by ID.
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        $user = User::find($id);

        if ($user) {
            return $user->delete();
        }

        return false;
    }

    /**
     * Get all users.
     *
     * @return Collection
     */
    public function all(): Collection
    {
        return User::all();
    }
}
