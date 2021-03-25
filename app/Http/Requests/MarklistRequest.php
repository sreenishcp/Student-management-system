<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class MarklistRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $id =  $this->segment(3);
        if($id=='')
        {
            return [
                'student_id' => 'required',
                'term' => 'unique:mark_lists,term,NULL,id,student_id,'.$request->student_id,
                'maths' => 'required',
                'history' => 'required',
                'science' => 'required',
            ];
        }
        else
        {
            return [
                'student_id' => 'required',
                'term' => 'unique:mark_lists,term,'.$id.',id',
                'maths' => 'required',
                'history' => 'required',
                'science' => 'required',
            ];
        }
    }
    public function messages()
    {
        return [
            'student_id.required'  => 'The student field is required',
        ];
    }
}
