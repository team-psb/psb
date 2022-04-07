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
            'tiktok'=>'required',
            'last_education'=>'required',
            'name_school'=>'required',
            'organization'=>'required|string|min:4|max:225',
            'achievment'=>'required|string|min:5|max:225',
            'hobby'=>'required|string|min:5|max:225',
            'goal'=>'required|string|min:5|max:225',
            'skill'=>'required|string|min:5|max:225',
            'memorization'=>'required|string|max:225',
            'figure_idol'=>'required|string|min:5|max:225',
            'chaplain_idol'=>'required|string|min:5|max:225',
            'tauhid'=>'required',
            'study_islamic'=>'required|string|min:5|max:225',
            'read_book'=>'required|string|min:5|max:225',
            'smoker'=>'required',
            'tattoed'=>'required',
            'pray'=>'required',
            'girlfriend'=>'required',
            'gamer'=>'required',
            'reason_registration'=>'required',
            'activity'=>'required',
            'personal'=>'required',
            'parent'=>'required',
            'father'=>'required|string|min:2|max:225',
            'father_work'=>'required|string|min:2|max:225',
            'father_id' => 'required',
            'mother'=>'required|string|min:2|max:225',
            'mother_work'=>'required|string|min:2|max:225',
            'mother_id' => 'required',
            'parent_income'=>'required',
            'child_to'=>'required|numeric|min:1|max:100',
            'brother'=>'required|numeric|min:0|max:100',
            'guardian',
            'no_guardian'=>'required',
            'permission_parent'=>'required',
            'have_laptop'=>'required',
            'agree'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'birth_place.required'=>'Tempat lahir wajib di isi !!!',
            'address.required'=>'Alamat lengkap wajib di isi !!!',
            'indonesia_provinces_id.required'=>'Provinsi wajib di isi !!!',
            'indonesia_cities_id.required'=>'Kabupaten/Kota wajib di isi !!!',
            'facebook.required'=>'Facebook wajib di isi !!!',
            'instagram.required'=>'Instagram wajib di isi !!!',
            'tiktok.required'=>'Tiktok wajib di isi !!!',
            'last_education.required'=>'Pendidikan terakhir wajib di isi !!!',
            'name_school.required'=>'Nama sekolah wajib di isi !!!',
            'organization.required'=>'Organisasi wajib di isi !!!',
            'achievment.required'=>'Prestasi wajib di isi !!!',
            'hobby.required'=>'Hobi wajib di isi !!!',
            'goal.required'=>'Cita-cita wajib di isi !!!',
            'skill.required'=>'Skill wajib di isi !!!',
            'memorization.required'=>'Jumlah hafalan wajib di isi !!!',
            'figure_idol.required'=>'Tokoh idola wajib di isi !!!',
            'chaplain_idol.required'=>'Ustadz idola wajib di isi !!!',
            'tauhid.required'=>'Tauhid wajib di isi !!!',
            'study_islamic.required'=>'Kajian wajib di isi !!!',
            'read_book.required'=>'Buku bacaan wajib di isi !!!',
            'smoker.required'=>'Pertanyaan tentang merokok wajib di isi !!!',
            'tattoed.required'=>'Pertanyaan tentang tato wajib di isi !!!',
            'pray.required'=>'Pertanyaan tentang sholat subuh wajib di isi !!!',
            'girlfriend.required'=>'Pertanyaan tentang pacar wajib di isi !!!',
            'gamer.required'=>'Pertanyaan tentang game wajib di isi !!!',
            'reason_registration.required'=>'Alasan mendaftar wajib di isi !!!',
            'activity.required'=>'Kegiatan sehari-hari wajib di isi !!!',
            'personal.required'=>'Kepribadian wajib di isi !!!',
            'parent.required'=>'Kelengkapan orang tua wajib di isi !!!',
            'father.required'=>'Nama ayah wajib di isi !!!',
            'father_work.required'=>'Pekerjaan ayah wajib di isi !!!',
            'father_id.required'=>'NIK ayah wajib di isi !!!',
            'mother.required'=>'Nama ibu wajib di isi !!!',
            'mother_work.required'=>'Pekerjaan ibu wajib di isi !!!',
            'mother_id.required'=>'NIK ibu wajib di isi !!!',
            'parent_income.required'=>'Pendapatan orang tua wajib di isi !!!',
            'child_to.required'=>'Pertanyaan anak ke-? wajib di isi !!!',
            'brother.required'=>'Pertanyaan berapa bersaudara wajib di isi !!!',
            'no_guardian.required'=>'Nomor telepon wali wajib di isi !!!',
            'permission_parent.required'=>'Izin orang tua wajib di isi !!!',
            'have_laptop.required'=>'Pertanyaan punya laptop wajib di isi !!!',
            'agree.required'=>'Wajib ceklis semua informasi sudah benar !!!',

            'organization.min'=>'Nama organisasi minimal 4 karakter',
            'achievment.min'=>'Pencapaian minimal 5 karakter',
            'hobby.min'=>'Hobi minimal 5 karakter',
            'goal.min'=>'Cita-cita minimal 5 karakter',
            'skill.min'=>'Skill minimal 5 karakter',
            'memorization.min'=>'Hafalan minimal 5 karakter',
            'figure_idol.min'=>'Tokoh idola minimal 5 karakter',
            'chaplain_idol.min'=>'Ulama idola minimal 5 karakter',
            'study_islamic.min'=>'Kajian minimal 5 karakter',
            'read_book.min'=>'Judul buku minimal 5 karakter',
            'father.min'=>'Nama ayah minimal 5 karakter',
            'father_work.min'=>'Pekerjaan ayah minimal 5 karakter',
            'mother.min'=>'Nama ibu minimal 5 karakter',
            'mother_work.min'=>'Pekerjaan ibu minimal 5 karakter',
            'child_to.min'=>'Pertanyaan Anak ke-? di isi minimal 1',
            'child_to.max'=>'Pertanyaan Anak ke-? Tidak bisa diisi lebih dari 100',
            'broher.min'=>'Berapa bersaudara di isi minimal 0 !!!',
            'brother.max'=>'Berapa bersaudara? Tidak bisa diisi lebih dari 100',
        ];
    }
}
