<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
        if ($this->isMethod('POST')) {
            return [
                'user_id' => 'required|integer|exists:users,id',
                'voucher_id' => 'nullable|integer|exists:vouchers,id',
                'address_detail_id' => 'required|integer|exists:address_details,id',
                'payment_id' => 'required|integer|exists:payments,id',
                'before_total_amount' => 'required|numeric|min:0',
                'shipping' => 'required|numeric|min:0',
                'after_total_amount' => 'required|numeric|min:0',
                'note' => 'nullable|string|max:1000',
//                'order_code' => 'required|string|unique:orders,order_code',
                'status' => 'required',
            ];
        }
        return [];
    }
}
