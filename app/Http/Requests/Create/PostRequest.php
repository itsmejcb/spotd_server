<?php

namespace App\Http\Requests\Create;

use App\Class\Keys;
use App\Class\Utils;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class PostRequest extends FormRequest
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
            // 'push_key' => 'required',
            // $this->key->Title => 'nullable',
            $this->key->Content => 'string',
            // $this->key->Status => 'nullable',
            // $this->key->AuthorId => 'nullable',
            $this->key->ImageName => 'nullable',
            $this->key->ImageStatus => 'nullable',
            $this->key->PostStatus => 'nullable',
            $this->key->ReactStatus => 'nullable',
            $this->key->CommentStatus => 'nullable',
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
