<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BiodataTwoRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'birth_place'=>'required',
            'address'=>'required',
            'indonesia_provinces_id'=>'required',
            'indonesia_cities_id'=>'required',
            'facebook'=>'required',
            'instagram'=>'required',
            'last_education'=>'required',
            'name_school'=>'required',
            'major'=>'required|string|min:5|max:225',
            'organization'=>'required|string|min:5|max:225',
            'achievment'=>'required|string|min:5|max:225',
            'hobby'=>'required|string|min:5|max:225',
            'goal'=>'required|string|min:5|max:225',
            'skill'=>'required|string|min:5|max:225',
            'memorization'=>'required|string|min:5|max:225',
            'figure_idol'=>'required|string|min:5|max:225',
            'chaplain_idol'=>'required|string|min:5|max:225',
            'tauhid'=>'required',
            'study_islamic'=>'required|string|min:5|max:225',
            'read_book'=>'required|string|min:5|max:225',
            'smoker'=>'required',
            'girlfriend'=>'required',
            'gamer'=>'required',
            'reason_registration'=>'required',
            'activity'=>'required',
            'personal'=>'required',
            'parent'=>'required',
            'father'=>'required|string|min:2|max:225',
            'father_work'=>'required|string|min:2|max:225',
            'mother'=>'required|string|min:2|max:225',
            'mother_work'=>'required|string|min:2|max:225',
            'parent_income'=>'required|numeric|digits_between:2,20',
            'child_to'=>'required|string|min:1|max:225',
            'brother'=>'required|numeric|min:1|max:100',
            'no_guardian'=>'required',
            'permission_parent'=>'required',
            'have_laptop'=>'required',
            'agree'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'birth_place'=>'Tempat lahir wajib di isi',
            'address'=>'Alamat lengkap wajib di isi',
            'indonesia_provinces_id'=>'Provinsi wajib di isi',
            'indonesia_cities_id'=>'Kabupaten/Kota wajib di isi',
            'facebook'=>'Facebook wajib di isi',
            'instagram'=>'Instagram wajib di isi',
            'last_education'=>'Pendidikan terakhir wajib di isi',
            'name_school'=>'Nama sekolah wajib di isi',
            'major'=>'Jurusan wajib di isi',
            'organization'=>'Organisasi wajib di isi',
            'achievment'=>'Prestasi wajib di isi',
            'hobby'=>'Hobi wajib di isi',
            'goal'=>'Cita-cita wajib di isi',
            'skill'=>'Skill wajib di isi',
            'memorization'=>'Jumlah hafalan wajib di isi',
            'figure_idol'=>'Tokoh idola wajib di isi',
            'chaplain_idol'=>'Ustadz idola wajib di isi',
            'tauhid'=>'Tauhid wajib di isi',
            'study_islamic'=>'Kajian wajib di isi',
            'read_book'=>'Buku bacaan wajib di isi',
            'smoker'=>'Pertanyaan tentang merokok wajib di isi',
            'girlfriend'=>'Pertanyaan tentang pacar wajib di isi',
            'gamer'=>'Pertanyaan tentang game wajib di isi',
            'reason_registration'=>'Alasan mendaftar wajib di isi',
            'activity'=>'Kegiatan sehari-hari wajib di isi',
            'personal'=>'Kepribadian wajib di isi',
            'parent'=>'Kelengkapan orang tua wajib di isi',
            'father'=>'Nama ayah wajib di isi',
            'father_work'=>'Pekerjaan ayah wajib di isi',
            'mother'=>'Nama ibu wajib di isi',
            'mother_work'=>'Pekerjaan ibu wajib di isi',
            'parent_income'=>'Pendapatan orang tua wajib di isi',
            'child_to'=>'Pertanyaan anak-ke ? wajib di isi',
            'brother'=>'Pertanyaan berapa bersaudara wajib di isi',
            'no_guardian'=>'Nomor telepon wali wajib di isi',
            'permission_parent'=>'Izin orang tua wajib di isi',
            'have_laptop'=>'Pertanyaan punya laptop wajib di isi',
            'agree'=>'required',
        ];
    }
}
