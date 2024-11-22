<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'fname' => 'required|string',
            'lname' => 'required|string',
            'company' => 'nullable|string',
            'country' => 'required|string',
            'fstreet' => 'required|string',
            'sstreet' => 'nullable|string',
            'coupon' => 'nullable|string',
            'city' => 'required|string',
            'zip' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
        ];
    }

    public function attributes()
    {
        return [
            'fname' => 'First Name',
            'lname' => 'Last Name',
            'company' => 'Company Name',
            'country' => 'Country Name',
            'fstreet' => 'First Address',
            'sstreet' => 'Second Address',
            'city' => 'City Name',
            'zip' => 'Zip Code',
            'email' => 'Email Address',
            'phone' => 'Phone Number',
            'coupon' => 'Coupon'
        ];
    }
}
