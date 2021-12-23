@extends('admin.layouts.app')

@section('title', 'Edit Biodata Pendaftar')

@section('content')
<div class="form-group">
                        <label for="exampleInputPassword1">Provinsi<b>*</b></label>
                        <select name="indonesia_provinces_id" class="custom-select" x-on:change="getKabupaten(provin_id)" x-model="provin_id">
                          @foreach ($provinsi as $provin)
                              <option value="{{ $provin->code }}" >{{ $provin->name }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Kota<b>*</b></label>
                        <select name="indonesia_cities_id" class="custom-select" >
                          <template x-for="an in kabupatenids">
                            <option :value="an.id"><span x-html="an.name"></span></option>
                          </template>											
                        </select>
                      </div>
@endsection


@push('end-script')
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>

  <script>
    function formdata(){
			const kabupatens=@json($kabupaten);
			return{
				// data
					form_1:true,
					form_2:false,
					form_3:false,
					form_4:false,
					provin_id:null,
          kabupatenids:[],
          gamer_in:null,
					
        // method
        gamer(param){
          this.gamer_in=param;
        },
				form1Button(){
          this.form_1=null;
          this.form_3=null;
          this.form_4=null;
          this.form_2=true;
          window.scrollTo(0, 0); 
        },
        form1ButtonBack(){
          this.form_1=true;
          this.form_2=null;
          this.form_3=null;
          this.form_4=null;
          window.scrollTo(0, 0); 
        },
        form2Button(){
          this.form_1= null;
          this.form_2= null;
          this.form_4= null;
          this.form_3=true;
          window.scrollTo(0, 0); 
        },
        form2ButtonBack(){
          this.form_1= null;
          this.form_4= null;
          this.form_2= true;
          this.form_3=null;
          window.scrollTo(0, 0); 
        },
        form3Button(){
          this.form_1= null;
          this.form_2= null;
          this.form_3=null;
          this.form_4=true;
          window.scrollTo(0, 0); 
        },
        form3ButtonBack(){
          this.form_1=null;
          this.form_2=null;
          this.form_3=true;
          this.form_4=null;
          window.scrollTo(0, 0); 
        },
				getKabupaten(code){
					const dataKabupaten = kabupatens.filter((kabupaten) => kabupaten.province_code == code);
					this.kabupatenids=dataKabupaten;
				}
			}
    }
  </script>   
@endpush
                            
                                