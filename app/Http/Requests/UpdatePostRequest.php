<?php 

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdatePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
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

        $errors = $validator->errors()->all();

        $errorList = '<ul><b>Note: All Star <span style="color:red">(*)</span> mark is Required !</b>';
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