<?php

namespace App\Domains\Chatting\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingNotificationRequest extends FormRequest
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
            'can_notify' => 'required|boolean'
        ];
    }
}
