<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class StoreGuitarRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'brand'  => 'required|string|max:255',
            'model'  => 'required|string|max:255',
            'year'  => 'nullable|integer|min:1900|max:' . date('Y'),
            'color'  => 'nullable|string|max:255',
            'description'  => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'//validação da foto no maximo 2mb
        ];
    }

    #[Override]
    public function messages()
    {
        return [
            'brand.required' => 'O campo Marca é obrigatorio',
            'model.required' => 'O campo Modelo é obrigatorio',
            'year.integer' => 'O Ano deve ser um número inteiro',
            'year.min' => 'O Ano minimo é 1900',
            'year.max' => 'O Ano não pode ultrapassar o ano atual',
            'image.image'    => 'O arquivo enviado precisa ser uma imagem.',
            'image.mimes'    => 'Formato inválido. Envie apenas JPG, PNG ou WEBP.',
            'image.max'      => 'A imagem deve ter no máximo 2MB.',
        ];
    }
}
