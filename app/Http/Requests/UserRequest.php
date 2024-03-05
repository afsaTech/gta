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
     * @return array
     */

    public function rules()
    {
        $user = request()->route('user');

        $emailRule = 'required|email:rfc,dns|unique:users,email';
        $usernameRule = 'required|unique:users,username';

        if ($user) {
            $emailRule .= ',' . $user->id;
            $usernameRule .= ',' . $user->id;
        }

        switch($this->method()) {
            case 'POST':
                return [
                    'name' => 'required',
                    'email' => $emailRule,
                    'username' => $usernameRule,
                    'is_social_login' => 'boolean',
                    'email_verified_at' => 'nullable|date', 
                    'has_seen_intro' => 'boolean', 
                    'remember_token' => 'nullable|string', 
                ];
                break;
            case 'PUT':
            case 'PATCH':
                return [
                    'name' => 'sometimes|required',
                    'email' => $emailRule,
                    'username' => $usernameRule,
                    'is_social_login' => 'sometimes|boolean',
                    'email_verified_at' => 'sometimes|nullable|date', 
                    'has_seen_intro' => 'sometimes|boolean', 
                    'remember_token' => 'sometimes|nullable|string', 
                ];
                break;
            default:
                return [];
        }

    }

}
