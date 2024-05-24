<?php

namespace App\Http\Requests;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $this->redirect = url()->previous() . '#review-div';
        return [
            'review' => 'required|min:5'
        ];
    }
    public function messages()
    {
        return [
            'review.required' => 'ملئ الحقل مطلوب',
            'review.min' => 'يرجى إدخال أكثر من ثلاث حروف ',
        ];
    }

    public function failedAuthorization()
    {
        throw new AuthorizationException('لا تمتلك صلاحية إضافة مراجعة، فضلًا سجل دخولك للموقع');
    }
}
