<?php

namespace App\Http\Requests\SignIn;

use App\Class\Keys;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AuthRequest extends FormRequest
{
    protected $key;

    public function __construct(Keys $key)
    {
        $this->key = $key;
    }

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            $this->key->Email => 'required|string|exists:users,email',
            $this->key->Password => 'required|string|min:7|max:30',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = [
            $this->key->Status => $this->key->UnprocessableEntity,
            $this->key->Message => $validator->errors()->first(),
        ];

        throw new HttpResponseException(response()->json($response, $this->key->UnprocessableEntity));
    }

    public function jsonResponse($user, $token)
    {
        if ($token) {
            return response()->json([
                $this->key->Token => $token,
                $this->key->UID => $user->{$this->key->UID},
            ]);
        }

        return response()->json([
            $this->key->Message => $this->key->Conflict,
        ]);
    }
}
