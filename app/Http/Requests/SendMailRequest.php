<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class SendMailRequest extends FormRequest
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
            'rno'        => ['required',],
            'proposal'   => 'required',
            'rno_photo'  => 'nullable|array',
            'prop_photo' => 'nullable|array',
            'matter'     => 'required',
            'pdf_type'   => 'required',
            'side'       => 'required|in:0,1,2'
        ];
    }


    public function withValidator(Validator $validator)
    {
        $validator->after(function ($validator) {

            $today = Carbon::today();

            // case 1: latest confidential
            $entity = DB::table('classified')
                ->where('rno', $this->proposal)
                ->latest('id')
                ->first();


            if (isset($entity) && $entity->status == 1) {
                $validator->errors()->add(
                    'proposal',
                    'Can not send Classified Data'
                );
            }



            // Case 2: rno → proposal
            $count1 = DB::table('sendmail')
                ->whereDate('dated', $today)
                ->where('rno', $this->rno)
                ->where('proposal', $this->proposal)
                ->where('photos', $this->rno_photo)
                ->count();

            if ($count1 >= 5) {
                $validator->errors()->add(
                    'proposal',
                    'Already Sent 5 Times (rno → proposal)'
                );
            }

            // Case 3: proposal → rno (reverse)
            $count2 = DB::table('sendmail')
                ->whereDate('dated', $today)
                ->where('rno', $this->proposal)
                ->where('proposal', $this->rno)
                ->where('photos', $this->prop_photo)
                ->count();

            if ($count2 >= 5) {
                $validator->errors()->add(
                    'proposal',
                    'Already Sent 5 Times (proposal → rno)'
                );
            }


            // Case 4: email check rno
            $entity = DB::table('profile_personal')
                ->where('rno', $this->rno)
                ->first();

            if ($entity->contactemail == null) {
                $validator->errors()->add(
                    'rno',
                    "Email Not Found for {$this->rno}"
                );
            } else {
                $email      = $entity->contactemail;
                $email      = str_replace(",", ";", $email);
                $email      = str_replace("/", ";", $email);
                $emailArray = explode(";", $email);
                $count      = DB::table('bouncedmail')->whereIn('email', $emailArray)->count();
                if ($count > 0) {
                    $validator->errors()->add(
                        'rno',
                        "Invalid Email ID {$this->rno}"
                    );
                }
            }


            // Case 5   : email check proposal
            $entity = DB::table('profile_personal')
                ->where('rno', $this->proposal)
                ->first();

            if ($entity->contactemail == null) {
                $validator->errors()->add(
                    'proposal',
                    "Email Not Found for {$this->proposal}"
                );
            } else {
                $email      = $entity->contactemail;
                $email      = str_replace(",", ";", $email);
                $email      = str_replace("/", ";", $email);
                $emailArray = explode(";", $email);
                $count      = DB::table('bouncedmail')->whereIn('email', $emailArray)->count();
                if ($count > 0) {
                    $validator->errors()->add(
                        'proposal',
                        "Invalid Email ID {$this->rno}"
                    );
                }
            }

            // Case 6:  check followup
            //TODO: followup
        });
    }

    // private function  


}
