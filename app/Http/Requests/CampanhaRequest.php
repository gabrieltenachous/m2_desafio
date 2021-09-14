<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CampanhaRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
                return [
                    'nome' => 'required|max:200|string',
                ];
                break;
            case 'PUT':
                return [
                    'nome' => 'required|max:200|string',
                ];
                break;
            default:
                break;
        }
    }
     
}
