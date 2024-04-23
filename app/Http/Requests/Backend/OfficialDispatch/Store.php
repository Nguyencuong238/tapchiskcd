<?php

namespace App\Http\Requests\Backend\OfficialDispatch;

use Illuminate\Foundation\Http\FormRequest;
use Spatie\MediaLibraryPro\Rules\Concerns\ValidatesMedia;

class Store extends FormRequest
{
    use ValidatesMedia;

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
            'title'       => ['required'],
            'excerpt'     => [],
            'body'        => 'required',
            'media'       => ['nullable', $this->validateSingleMedia()->maxItemSizeInKb(3000)],
            'attachments' => ['nullable'],
            'receiver'    => ['required']
        ];
    }
}