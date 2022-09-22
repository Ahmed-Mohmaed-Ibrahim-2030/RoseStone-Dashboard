<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamRequest extends FormRequest
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
            'exam_date' => 'required|date',
            'exam_title' => 'required|string|max:255',
            //'created_by' => 'required|integer',
            "question"=>'required|array',
            "question.*.question"=>'required|string|max:255',
            "question.*.value"=>'required|numeric',
            "question.*.options"=>'required|array',
            "question.*.options.*.option"=>'required|string|max:255',
            "question.*.options.*.is_correct"=>'required|boolean',
            "question.*.answer_number"=>'required|string|max:255',


        ];
    }

}
