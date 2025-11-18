<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JoinRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'father_name' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'pincode' => 'nullable|string|max:6',
            'dob' => 'nullable|date|before:today',
            'gender' => 'nullable|in:Male,Female,Other',
            'blood_group' => 'nullable|in:A+,A-,B+,B-,AB+,AB-,O+,O-',
            'phone_no' => 'required|string|max:15|unique:members,phone_no',
            'email_id' => 'required|email|unique:members,email_id',
            'voterid' => 'nullable|string|max:20',
            'aadhar_no' => 'nullable|digits:12',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'state_id' => 'nullable|exists:states,id',
            'district_id' => 'nullable|exists:districts,id',
            'assembly_id' => 'nullable|exists:assemblies,id',
            'place_type' => 'nullable|string',
            'block_id' => 'nullable|exists:blocks,id',
            'city_id' => 'nullable|exists:cities,id',
            'perur_id' => 'nullable|exists:perurs,id',
            'corporation_id' => 'nullable|exists:corporations,id',
            'terms' => 'required|accepted'
        ];
    }

}