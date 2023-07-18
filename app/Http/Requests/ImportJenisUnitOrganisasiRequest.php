<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ImportJenisUnitOrganisasiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'jenis_unit_organisasi' => 'required|mimes:csv,xls,xlsx'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'jenis_unit_organisasi.required'   => ':attribute tidak boleh kosong',
            'jenis_unit_organisasi.mimes'      => ':attribute tidak valid, pastikan format ekstensi file adalah .csv, .xls atau .xlsx',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'jenis_unit_organisasi'    => 'File Import',
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        if($validator->fails())
        {
            return redirect()->route('admin.import')
                        ->withInput()
                        ->with(['warning' => 'Silahkan periksa form/ file upload anda, data gagal di import.']);
        }
    }
}
