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
            'tempat_lahir'=>'required',
            'alamt_lengkap'=>'required',
            'indonesia_provinces_id'=>'required',
            'indonesia_cities_id'=>'required',
            'facebook'=>'required',
            'instagram'=>'required',
            'pendidikan_terakhir'=>'required',
            'asal_sekolah'=>'required',
            'jurusan'=>'required|string|min:5|max:225',
            'pengalaman_organisasi'=>'required|string|min:5|max:225',
            'prestasi'=>'required|string|min:5|max:225',
            'hobi'=>'required|string|min:5|max:225',
            'cita_cita'=>'required|string|min:5|max:225',
            'skill'=>'required|string|min:5|max:225',
            'jumlah_hafalan'=>'required|string|min:5|max:225',
            'tokoh_idola'=>'required|string|min:5|max:225',
            'ustadz_idola'=>'required|string|min:5|max:225',
            'tauhid'=>'required',
            'kajian'=>'required|string|min:5|max:225',
            'buku'=>'required|string|min:5|max:225',
            'perokok'=>'required',
            'punya_pacar'=>'required',
            'suka_game'=>'required',
            'alasan_mendaftar'=>'required',
            'kegiatan'=>'required',
            'kepribadian'=>'required',
            'orang_tua'=>'required',
            'nama_ayah'=>'required|string|min:2|max:225',
            'pekerjaan_ayah'=>'required|string|min:2|max:225',
            'nama_ibu'=>'required|string|min:2|max:225',
            'pekerjaan_ibu'=>'required|string|min:2|max:225',
            'penghasilan_ortu'=>'required|numeric|digits_between:2,20',
            'anak_ke'=>'required|string|min:1|max:225',
            'saudara'=>'required|numeric|min:1|max:100',
            'no_wali'=>'required',
            'izin_ortu'=>'required',
            'punya_laptop'=>'required',
            'setuju'=>'required',
        ];
    }

    public function messages()
    {
        return [
            // 'name.required' => 'Please enter book name',
            // 'author.required' => 'Please enter book author',
            'tempat_lahir.required'=>'tempat lahir wajib di isi',
            'alamt_lengkap.required'=>'alamat lengkap wajib di isi',
            'indonesia_provinces_id.required'=>'provinsi wajib di isi',
            'indonesia_cities_id.required'=>'kota wajib di isi',
            'facebook.required'=>'facebook wajib di isi',
            'instagram.required'=>'instagram wajib di isi',
            'pendidikan_terakhir.required'=>'pendidikan terakhir wajib di isi',
            'asal_sekolah.required'=>'asal sekolah wajib di isi',
            'jurusan.required'=>'jurusan wajib di isi',
            'pengalaman_organisasi.required'=>'pengalaman organisasi wajib di isi',
            'prestasi.required'=>'prestasi wajib di isi',
            'hobi.required'=>'hobi wajib di isi',
            'cita_cita.required'=>'cita-cita wajib di isi',
            'skill.required'=>'skill wajib di isi',
            'jumlah_hafalan.required'=>'jumlah hafalan wajib di isi',
            'tokoh_idola.required'=>'tokoh idola wajib di isi',
            'ustadz_idola.required'=>'ustadz idola wajib di isi',
            'tauhid.required'=>'pertanyaan "dimana Allah ?" wajib di isi',
            'kajian.required'=>'kajian wajib di isi',
            'buku.required'=>'buku kesukaan wajib di isi',
            'perokok.required'=>'opsi merokok wajib di isi',
            'punya_pacar.required'=>'opsi pacar wajib di isi',
            'suka_game.required'=>'opsi suka game wajib di isi',
            'alasan_mendaftar.required'=>'alasan medaftar wajib di isi',
            'kegiatan.required'=>'kegiatan dari pagi sampai malam wajib di isi',
            'kepribadian.required'=>'ceritakan kepribadian wajib di isi',
            'orang_tua.required'=>'kelengkapan orangtua wajib di isi',
            'nama_ayah.required'=>'nama ayah wajib di isi',
            'pekerjaan_ayah.required'=>'pekerjaan ayah',
            'nama_ibu.required'=>'nama ibu wajib di isi',
            'pekerjaan_ibu.required'=>'pekerjaan ibu',
            'penghasilan_ortu.required'=>'penghasilan orang tua wajib diisi ',
            'penghasilan_ortu.digits_between'=>'penghasilan orang tua harus bilangan bulat antara 0 digits sampai 20 digits',
            'anak_ke.required'=>'anak ke- , wajib di isi',
            'saudara.required'=>'jumlah saudara wajib di isi',
            'no_wali.required'=>'no wali wajib di isi',
            'izin_ortu.required'=>'izin ortu wajib di isi',
            'punya_laptop.required'=>'opsi punya laptop wajib di isi',
        ];
    }
}
