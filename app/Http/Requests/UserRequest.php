<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [];
        $currentAction = $this->route()->getActionMethod(); //để lấy phương thức hiện tại

        switch ($this->method()):
            case 'POST':
                switch ($currentAction) {
                    case 'add':
                        $rules = [
                            "email" => "required|email|unique:users",
                            "name" => "required",
                            "password" => "required"
                        ];
                    default:
                        break;
                }
            default:
                break;
        endswitch;

        return $rules;
    }
    public function messages()
    {
        return [
            'email.required' => "Bắt buộc phải nhập email",
            'email.email' => "Email không đúng tồn tại",
            'email.unique' => "Email đã tồn tại",
            'name.required' => "Bắt buộc phải nhập name",
            'password.required' => "Bắt buộc phải nhập password",
        ];
    }
}