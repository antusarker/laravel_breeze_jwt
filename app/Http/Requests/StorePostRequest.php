<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StorePostRequest extends FormRequest
{
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'is_active' => 'required|boolean',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        if ($this->wantsJson()) {
            throw new HttpResponseException(
                response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422)
            );
        }
        
        // fallback for web requests
        $errors = $validator->errors()->all();

        $errorList = '<ul>';
        $errorList .= '<b>Note: All Star <span style="color:red">(*)</span> mark is Required !</b>';
        foreach ($errors as $error) {
            $errorList .= "<li>$error</li>";
        }
        $errorList .= '</ul>';

        throw new HttpResponseException(
            redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('flash_message', $errorList)
                ->with('status_color', 'warning')
        );
    }
}
