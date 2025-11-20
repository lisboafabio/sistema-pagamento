<?php

namespace App\Http\Requests;

use App\Enums\BankAccountTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class CreateSubAcquirerTransactionRequest extends FormRequest
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
            "merchant_id" => "sometimes|integer",
            "seller_id" => "sometimes|integer",
            "amount" => 'required|integer',
            "currency" => "sometimes|string|size:3",
            "order_id" => "sometimes|string",
            "payer" => 'sometimes|array',
            "payer.name" => "sometimes|string",
            "payer.cpf_cnpj" => "sometimes|string",
            "expires_in" => 'sometimes|integer',
            "transaction_id" => "sometimes|string",
            "account" => "sometimes|array",
            "account.bank_code" => "sometimes|string",
            "account.agencia" => "sometimes|string",
            "account.conta" => "sometimes|string",
            "account.type" => [
                "sometimes",
                "nullable",
                "string",
                Rule::enum(BankAccountTypeEnum::class),
            ],
        ];
    }
}
