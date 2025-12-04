<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatchPrefrenceRequest extends FormRequest
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
            'agefrom'    => 'sometimes|nullable',
            'ageupto'    => 'sometimes|nullable',
            'hghtfrom'   => 'sometimes|nullable',
            'hghtto'     => 'sometimes|nullable',
            'religion'   => 'sometimes|nullable',
            'caste'      => 'sometimes|nullable',
            'education'  => 'sometimes|nullable',
            'edupref'    => 'sometimes|nullable',
            'eatingpref' => 'sometimes|nullable',
            'astropref'  => 'sometimes|nullable',
            'rspref'     => 'sometimes|nullable',
            'mspref'     => 'sometimes|nullable',
            'childpref'  => 'sometimes|nullable',
            'occupref'   => 'sometimes|nullable',
            'incomepref' => 'sometimes|nullable',
            'zonepref'   => 'sometimes|nullable',
            'mr'         => 'sometimes|nullable',

        ];
    }
}
