<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'companyName'=>'required',
            'bussNo'=>'required',
            'ticketPrice'=>'required',
            'date'=>'required',
            'time'=>'required',
            'from'=>'required',
            'to'=>'required'
        ];
    }
}
