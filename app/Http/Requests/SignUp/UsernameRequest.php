<?php

namespace App\Http\Requests\SignUp;

use App\Class\Keys;
use App\Class\Utils;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UsernameRequest extends FormRequest
{
    protected $key;
    protected $util;

    public function __construct(Keys $key, Utils $util)
    {
        $this->key = $key;
        $this->util = $util;
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            $this->key->Username => 'required|string|unique:user_username,username',
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  Validator  $validator
     * @return void
     *
     * @throws HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        $response = [
            $this->key->Status => $this->key->UnprocessableEntity,
            $this->key->Message => $validator->errors()->first(),
        ];

        throw new HttpResponseException(response()->json($response, $this->key->UnprocessableEntity));
    }

    public function jsonResponse($result)
    {
        if ($result) {
            return response()->json([
                $this->key->Status => $this->key->Continue,
            ]);
        }

        return response()->json([
            $this->key->Message => $this->key->Conflict,
        ]);
    }
}
