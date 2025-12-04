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
            'agefrom'    => 'required',
            'ageupto'    => 'required',
            'hghtfrom'   => 'required',
            'hghtto'     => 'required',
            'religion'   => 'required',
            'caste'      => 'required',
            'education'  => 'required',
            'edupref'    => 'required',
            'eatingpref' => 'required',
            'astropref'  => 'required',
            'rspref'     => 'required',
            'mspref'     => 'required',
            'childpref'  => 'required',
            'occupref'   => 'required',
            'incomepref' => 'required',
            'zonepref'   => 'required',
            'mr'         => 'required',

        ];
    }
}
