<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            "contact_name"      => 'required|min:5|max:100' , 
            "contact_email"     => 'required|email|max:255' , 
            "contact_type"      => 'required|integer' ,
            //"contact_subject"   => 'required|integer' ,
            "contact_message"   => 'required|min:5' ,
    
        ];
    }
}
