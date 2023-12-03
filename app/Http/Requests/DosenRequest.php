<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DosenRequest extends FormRequest
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
            'nomor_induk_dosen' => 'required|unique:dosen',
            'pendidikan_master' => 'required',
            'pendidikan_doktor' => 'required',
            'bidang_keahlian' => 'required',
            'jabatan_akademik' => 'required'
        ];
    }
}
