<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfileMoreInfoRequest extends FormRequest
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
            'rno'          => 'required',
            'dated'        => 'sometimes',
            'time'         => 'sometimes',
            'empid'        => 'sometimes',
            'metwith'      => 'required',
            'member'       => 'required|nullable',
            'profession'   => 'nullable',
            'family'       => 'nullable',
            'prop1'        => 'nullable',
            'prop2'        => 'nullable',
            'prop3'        => 'nullable',
            'properties'   => 'nullable',
            'residence'    => 'nullable',
            'business'     => 'nullable',
            'income'       => 'nullable',
            'rentedincome' => 'nullable',
            'turnover'     => 'nullable',
            'vehicle'      => 'nullable',
            'roka'         => 'nullable',
            'remarks'      => 'nullable',
        ];
    }
}
