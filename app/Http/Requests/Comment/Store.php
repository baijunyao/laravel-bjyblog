<?php

declare(strict_types=1);

namespace App\Http\Requests\Comment;

use App;
use App\Rules\Comment;
use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
        $rules = [
            'article_id' => 'required|integer',
            'parent_id'  => 'integer',
        ];

        if (!App::isLocal()) {
            $rules['content'] = ['required', new Comment()];
        }

        return $rules;
    }
}
