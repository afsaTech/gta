<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class TopNotchDestinationRequest extends FormRequest
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
            case "POST":
                return [
                    "name" => "required|string|max:255",
                    "description" => "nullable|string",
                    "location" => "nullable|string|max:255",
                    "rating" => "nullable|numeric|min:0|max:5",
                    "image_url" => "nullable|mimes:jpg,jpeg,png,svg",
                ];
                break;
            case "PUT":
            case "PATCH":
                return [
                    "name" => "sometimes|required|string|max:255",
                    "description" => "sometimes|nullable|string",
                    "location" => "sometimes|nullable|string|max:255",
                    "rating" => "sometimes|nullable|numeric|min:0|max:5",
                    "image_url" => "",
                ];
                break;
            default:
                return [];
        }
    }

    public static function fileValidator($validator, $tnd)
    {
        $image_url = "";

        if ($validator->hasFile("image_url")) {
            $image = $validator->validate([
                "image_url" => "mimes:jpg,jpeg,png,svg",
            ]);

            $imageName =
                now()->timestamp .
                "_" .
                Str::uuid()->toString() .
                "." .
                $image["image_url"]->getClientOriginalExtension();
            $image_url = $image['image_url']->storeAs("tnd/images", $imageName, "public");
        } else {
            $image_url = $tnd->image_url;
        }

        return $image_url;
    }
}
