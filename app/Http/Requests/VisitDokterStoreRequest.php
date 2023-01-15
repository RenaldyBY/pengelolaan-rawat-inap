<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VisitDokterStoreRequest extends FormRequest
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
            'tensi_darah' => ['required', 'numeric'],
            'penyakit' => ['required'],
            'obat' => ['required'],
            'perkembangan' => ['required'],
            'id_dokter' => ['required', 'exists:dokters,id'],
            'id_pasien_rawat_inap' => ['required', 'exists:pasien_rawat_inaps,id']
        ];
    }
}
