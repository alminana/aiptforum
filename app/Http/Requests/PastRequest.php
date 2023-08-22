<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PastRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'aiptref'=> ['required', 'string', 'min:5', 'max:255'],
            'clientref'=> ['required', 'string', 'min:5', 'max:255'],
            'title'=> ['required', 'string', 'min:5', 'max:255'],
            'client'=> ['required', 'string', 'min:5', 'max:255'],
    
            // //selection for patent filing
            'pct_date'=>'required',
            'pct_no' =>'required',
            'regular_date'=>'required',
            'pct_no' =>'required',
            'regular_no'=>'required',
            'filingno' =>'required',
    
            //date of filing
            'procedure'=>'required',
            'requesteddate'=>'required',
            'proceduredate'=>'required',
          
            //annuity selection
            'country'=>'required',
            'annuity'=>'required',
            'annual_office_fee'=>'required',
            'annual_deadline'=>'required',
            //comment
            'deadline_Status'=>'required',
            //user
         
        ];
    }
}