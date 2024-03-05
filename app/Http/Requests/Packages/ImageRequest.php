<?php

namespace App\Http\Requests\Packages;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class ImageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'package_id' => 'integer|exists:packages,id',
                    'url' => 'mimes:jpg,jpeg,png,svg',
                ];
                break;
            case 'PUT':
            case 'PATCH':
                return [
                    'package_id' => 'sometimes|required|integer|exists:packages,id',
                    'url' => '',
                ];
                break;
            default:
                return [];
        }
    }

    public static function fileValidator($validator, $packageImage)
    {
        $image = "";

        if ($validator->hasFile("url")) {
            $image = $validator->validate([
                "url" => "mimes:jpg,jpeg,png,svg",
            ]);

            $imageName =
                now()->timestamp .
                "_" .
                Str::uuid()->toString() .
                "." .
                $image["url"]->getClientOriginalExtension();
            $image = $image['url']->storeAs("package/images", $imageName, "public");
        } else {
            $image = $packageImage->url;
        }

        return $image;
    }
    
}
