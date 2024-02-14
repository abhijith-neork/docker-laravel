<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use Auth;
use Session;
use Illuminate\Support\Facades\Validator;
use App\Models\HistoryUser;
use Illuminate\Support\Facades\Crypt;

class StoreDepartmentRequest extends FormRequest
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
            'department_name'   => 'required|unique:departments,department_name',
        ];
    }

    
}
