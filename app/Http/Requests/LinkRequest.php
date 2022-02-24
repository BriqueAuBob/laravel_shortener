<?php

namespace App\Http\Requests;

use App\Models\Link;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class LinkRequest extends FormRequest
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
     * Generate an unique code for the link.
     *
     * @return string
     */
    private function generateUniqueCode(): string {
        $code = Str::random(6);
        if (Link::where('code', $code)->count() > 0) {
            return $this->generateUniqueCode();
        }
        return $code;
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'code' => $this->generateUniqueCode(),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'destination_url' => 'required|string|url|max:500',
            'code' => 'required|string|max:6|unique:links',
        ];
    }
}
