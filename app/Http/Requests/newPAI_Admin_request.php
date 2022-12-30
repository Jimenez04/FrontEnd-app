<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class newPAI_Admin_request extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
                'cedula' => 'required|min:9|max:20|string',
                'nombre_Curso' => 'required|min:5|max:254|string',
                'numero_De_Matriculas' => 'required|numeric|min:2|max:100',
                'resumen_No_Aprobar_El_Curso' => 'required|string|min:4',
                'grupo' => 'required|numeric|min:1|max:10',
                'docente' => 'required|string|min:4|max:250',

                'semestre' => 'required|numeric|min:1|max:3',
                'nombre_Carrera' => 'required|string|min:4|max:250',
        ];
    }

    public function messages()
    {
        return [
            'cedula.required' => 'La cedula es requerida.',
            'cedula.min' => 'La cedula no es valida, debe tener al menos 9 caracteres.',
            'cedula.max' => 'La cedula no es valida, debe tener maximo 20 caracteres.',
            'cedula.string' => 'La cedula ingresada no es valida.',

            'nombre_Curso.required' => 'El campo “nombre de curso” es requerido. ',
            'nombre_Curso.min' => 'El campo "nombre de curso" debe tener al menos 5 caracteres.',
            'nombre_Curso.max' => 'El campo “nombre de curso” debe tener menos de 254 caracteres.',
            'nombre_Curso.string' => 'El campo “nombre de curso” debe ser una cadena de caracteres.',

            'semestre.required' => 'El campo "Número de semestre" es requerido.',
            'semestre.numeric' => 'El campo "Número de semestre" debe ser un número entre 1 y 3.',
            'semestre.min' => 'El campo "Número de semestre" no debe ser menor a 1.',
            'semestre.max' => 'El campo "Número de semestre" no puede ser mayor a 3.',
           
            'numero_De_Matriculas.required' => 'El campo "número de ocasiones matriculado el curso" es requerido.',
            'numero_De_Matriculas.numeric' => 'El campo "número de ocasiones matriculado el curso" debe ser un número entre 1 y 100.',
            'numero_De_Matriculas.min' => 'El campo "número de ocasiones matriculado el curso" no debe ser menor a 2.',
            'numero_De_Matriculas.max' => 'El campo "número de ocasiones matriculado el curso" no puede ser mayor a 100.',

            'resumen_No_Aprobar_El_Curso.required' => 'El campo "razones de no aprobar el curso" es requerido.',
            'resumen_No_Aprobar_El_Curso.string' => 'El campo "razones de no aprobar el curso" debe ser una cadena de caracteres.',
            'resumen_No_Aprobar_El_Curso.min' => 'El campo "razones de no aprobar el curso" no puede ser menor a 4 caracteres.',

            'grupo.required' => 'El campo "grupo de curso" es requerido.',
            'grupo.numeric' => 'El campo "grupo de curso" debe ser un número entre 1 y 100.',
            'grupo.min' => 'El campo "grupo de curso" no debe ser menor a 1.',
            'grupo.max' => 'El campo "grupo de curso" no puede ser mayor a 10.',

            'docente.required' => 'El campo "tutor del curso" es requerido.',
            'docente.string' => 'El campo "tutor del curso" debe ser una cadena de caracteres.',
            'docente.max' => 'El campo "tutor del curso" no puede ser mayor a 250 caracteres.',
            'docente.min' => 'El campo "tutor del curso" no puede ser menor a 4 caracteres.',
            
            'nombre_Carrera.required' => 'El campo "nombre carrera" es requerido.',
            'nombre_Carrera.string' => 'El campo "nombre carrera" debe ser una cadena de caracteres.',
            'nombre_Carrera.max' => 'El campo "nombre carrera" no puede ser mayor a 250 caracteres.',
            'nombre_Carrera.min' => 'El campo "nombre carrera" no puede ser menor a 4 caracteres.',
        ];
    }
}
