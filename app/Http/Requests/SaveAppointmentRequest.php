<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveAppointmentRequest extends FormRequest
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
            'rno'     => 'nullable',
            'refname' => 'required',
            'contactphone' => 'required',
            'contactaddress' => 'required',
            'apttype' => 'required',
            'aptdate' => 'required',
            'apttime' => 'required',
            'remarks' => 'required',
            'aptstatus' => 'required',
            'update_date' => 'nullable',
            'aptremarks' => 'nullable',
            'att_by1' => 'nullable',
            'att_by2' => 'nullable',
            'appointment_id'   => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'aptdate.required' => 'Appointment Date is required',
            'apttime.required' => 'Appointment Time is required',
            'apttype.required' => 'Appointment Type is required',
            'aptstatus.required' => 'Appointment Status is required',
            'remarks.required' => 'Remarks is required',
            'refname.required' => 'Member Name is required',
            'contactphone.required' => 'Contact No is required',
            'contactaddress.required' => 'Address is required',
        ];
    }
}
