<?php

namespace App\Http\Requests;
use App\Rules\AfterNow;
use Illuminate\Foundation\Http\FormRequest;

class FlashSaleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'start_date' => ['required','date','date_format:Y-m-d\TH:i', new AfterNow()],
            'end_date' => 'required|date|date_format:Y-m-d\TH:i|after:start_date',
            'status' => 'required',
        ];
    }
}
