<?php

namespace App\Http\Requests\Comment;

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
        return [
            'article_id' => 'required|integer',
            'pid'        => 'required|integer',
            'content'    => ['required', new Comment()],
        ];
    }

    /**
     * 定义字段名中文
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'article_id' => '文章id',
            'pid'        => '父级id',
            'content'    => '内容',
        ];
    }
}
