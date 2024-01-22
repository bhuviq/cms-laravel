<?php

namespace App\Http\Requests;

use App\Models\NewsArticle;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewsArticleUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'category' => ['required', 'string'],
            'content' => ['required', 'string'],
        ];
    }
}
