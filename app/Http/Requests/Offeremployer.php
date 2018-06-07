<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Offeremployer extends FormRequest
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
            'offer_title' => 'string|required|min:4',
            'offer_contract_type' => 'required|string',
            'offer_required_training' => 'string',
            'offer_qualities' => 'string',
            'offer_missions' => 'string',
            'offer_languages' => 'string',
            'offer_salary' => 'min:3|max:5',
            'offer_pic' => 'required',

        ];
    }
}
