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
            'id_pegawai' => 'required|unique:dosen',
            'nomor_induk_dosen' => 'required|string|max:100|unique:dosen',
            // 'jenis_nomor_induk_dosen' => 'required',
            // 'id_level_pendidikan_tertinggi' => 'required|exists:level_pendidikan_tertinggi, id',
            // 'pendidikan_magister' => 'required',
            // 'pendidikan_doktor' => 'required',
            // 'bidang_keahlian' => 'required',
            // 'jabatan_akademik' => 'required',
            // 'id_pt_unit' => 'required',
            // 'id_kategori_dosen' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'id_pegawai.unique'    => 'This name has already been taken. Try another pegawai.'
        ];
    }
}
