<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DescontoRequest extends FormRequest
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
                    'desconto' => 'required|integer',
                    'produto_id'=>'required|exists:produtos,id|integer', 
                ];
                break;
            case 'PUT':
                return [
                    'nome' => 'required|max:200|string',
                    'desconto' => 'required|integer', 
                    'produto_id'=>'required|exists:desconto_produtos,id|integer', 
                ];
                break;
            default:
                break;
        }
    }
}
