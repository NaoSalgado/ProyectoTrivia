<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTriviaRequest extends FormRequest
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
        $trivia = $this->route('trivia');
        return [
            'nombre' => 'required|max:80',
            'descripcion'=> 'required|max:80',
            'preguntas' => 'required|array',
            'preguntas.*.descripcion' => 'required|string|max:255',
            'preguntas.*.puntaje' => 'required|integer',
            'preguntas.*.respuestas' => 'required|array',
            'preguntas.*.respuestas.*.descripcion' => 'required|string',
            'preguntas.*.respuestas.*.estado' => 'required|in:0,1',
        ];
    }
}
