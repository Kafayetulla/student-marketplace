<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()->usertype === 1 || $this->route('product')->user_id === auth()->id();
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'category' => 'required|exists:categories,name',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'status' => 'required|in:' . implode(',', array_keys(config('common.status'))),
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
