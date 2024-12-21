<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (Auth::user() == null)
            return false;
        if (!Auth::user()->isAdmin )
            return false;

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
            'name' => 'required|max:255',
            'desc' => 'required|max:255',
            'cat' => 'required',
            'cost' => 'required|max:20',
            'img' => 'mimes:jpeg,jpg,png,gif|max:500',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'O Nome do Produto é obrigatório.',
            'name.max' => 'O Nome do Produto não pode exceder 255 caracteres.',
            'desc.required' => 'A Descrição do Produto é obrigatória.',
            'desc.max' => 'A Descrição do Produto não pode exceder 255 caracteres.',
            'cat.required' => 'A Categoria é obrigatória.',
            'cost.required' => 'O Preço do Produto é obrigatório.',
            'cost.max' => 'O Preço do Produto não pode exceder 20 dígitos.',
            'img.required' => 'A Imagem é obrigatória.',
            'img.mimes' => 'A Imagem deve ser: jpeg, jpg, png ou gif.',
            'img.max' => 'A Imagem não pode exceder 500 KB.',
        ];
    }
}
