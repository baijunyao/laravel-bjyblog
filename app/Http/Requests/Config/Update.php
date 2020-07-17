<?php

declare(strict_types=1);

namespace App\Http\Requests\Config;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
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
        ];
    }

    /**
     * @param \Illuminate\Validation\Validator $validator
     *
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->has('204') && !in_array('public', $this->input('204'))) {
                $validator->errors()->add('204', translate('Local drive must be checked'));
            }

            if ($this->has('204') && in_array('oss_uploads', $this->input('204')) && !$this->isJson()) {
                foreach ([
                    '200' => 'AccessKeyID',
                    '201' => 'AccessKeySecret',
                    '202' => 'BUCKET',
                    '203' => 'ENDPOINT',
                ] as $id => $description) {
                    /** @var string $id */
                    if ($this->input($id, '') === '') {
                        $validator->errors()->add($id, $description . ': ' . translate('The content can not be empty'));
                    }
                }
            }
        });
    }
}
