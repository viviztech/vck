<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
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
            'mother_name' => 'nullable|string|max:255',
            'spouse_name' => 'nullable|string|max:255',
            'dob' => 'nullable|date',
            'gender' => 'nullable|in:Male,Female,Other',
            'education' => 'nullable|string|max:255',
            'occupation' => 'nullable|string|max:255',
            'marital_status' => 'nullable|in:Single,Married,Divorced,Widowed',
            'social_category' => 'nullable|in:General,OBC,SC,ST',
            'joining_date' => 'nullable|date',
            'current_post' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'mobile_number' => 'nullable|string|max:20',
            'email_id' => 'nullable|email|max:255',
            'membership_id' => 'nullable|string|max:100',
            'aadhar_no' => 'nullable|digits:12',
            'voterid_no' => 'nullable|string|max:50',
            'state_id' => 'nullable|exists:states,id',
            'district_id' => 'nullable|exists:districts,id',
            'assembly_id' => 'nullable|exists:assemblies,id',
            'postingstage_id' => 'required|exists:postingstages,id',
            'subbody_id' => 'nullable|exists:subbodies,id',
            'post_id' => 'nullable|exists:posts,id',
            'block_id' => 'nullable|exists:blocks,id',
            'city_id' => 'nullable|exists:cities,id',
            'perur_id' => 'nullable|exists:perurs,id',
            'paguthi_id' => 'nullable|exists:paguthis,id',
            'vattam_id' => 'nullable|exists:vattams,id',
            'corporation_id' => 'nullable|exists:corporations,id',
            'document' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    /**
     * Get custom attribute names for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'name' => 'Name',
            'father_name' => 'Father\'s Name',
            'mother_name' => 'Mother\'s Name',
            'spouse_name' => 'Spouse Name',
            'dob' => 'Date of Birth',
            'gender' => 'Gender',
            'education' => 'Education',
            'occupation' => 'Occupation',
            'marital_status' => 'Marital Status',
            'social_category' => 'Social Category',
            'joining_date' => 'Joining Date',
            'current_post' => 'Current Post',
            'address' => 'Address',
            'mobile_number' => 'Mobile Number',
            'email_id' => 'Email ID',
            'membership_id' => 'Membership ID',
            'aadhar_no' => 'Aadhar Number',
            'voterid_no' => 'Voter ID',
            'state_id' => 'State',
            'district_id' => 'District',
            'assembly_id' => 'Assembly',
            'postingstage_id' => 'Posting Stage',
            'subbody_id' => 'Sub Body',
            'post_id' => 'Post',
            'block_id' => 'Block',
            'city_id' => 'City',
            'perur_id' => 'Perur',
            'paguthi_id' => 'Paguthi',
            'vattam_id' => 'Vattam',
            'corporation_id' => 'Corporation',
            'document' => 'Document',
            'photo' => 'Photo',
        ];
    }
}
