<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{
    public function rules()
    {
        return [
            'post_id' => 'required|exists:posts,id',
            'content' => 'required|string',
        ];
    }
}
