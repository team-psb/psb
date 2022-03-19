@extends('admin.layouts.app')

@section('title', 'Pengaturan Akun')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card   card-rounded">
                    <div class="card-body">
                        <form action="{{ route('admins.update', $admin->id) }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <div class="input-group">
                                        <input name="name" type="text" class="form-control" value="{{ $admin->name }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>No HP</label>
                                    <div class="input-group">
                                        <input name="phone" type="text" class="form-control" value="{{ $admin->phone }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input id="password" name="password" type="password" class="form-control">
                                    {{-- <label>Biarkan kosong jika tidak ingin mengganti password</label> --}}
                                </div>
                        
                                <div class="form-group">
                                    <label>Konfirmasi Password</label>
                                    <input id="confirm_password" name="password_confirmation" type="password" class="form-control">
                                    {{-- <label>Biarkan kosong jika tidak ingin mengganti password</label> --}}
                                </div>
                                
                                <input type="hidden" name="role" value="admin">

                                <input
                                    id="pass"
                                    type="checkbox"
                                    onclick="showFunction()"
                                    class="form-check-input"
                                />
                                <label for="pass" class="form-check-label ms-2" style="font-size: 12px">Show Password</label>

                            </div>
                            <div class="d-flex justify-content-between mt-3 mx-3">
                                <a href="{{ route('admins.index') }}" class="btn btn-md btn-danger">Back</a>
                                <button class="btn btn-md btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('after-script')
<script>
    // Show Password Icon
    function myFunction() {
        var x = document.getElementById("floatingPassword");
        if (x.type === "password") {
            x.type = "text";
            document.getElementById("hide").style.display = "inline-block";
            document.getElementById("show").style.display = "none";
        } else {
            x.type = "password";
            document.getElementById("hide").style.display = "none";
            document.getElementById("show").style.display = "inline-block";
        }
    }

     // Show Password Checkbox
    function showFunction() {
        var x = document.getElementById("password");
        var y = document.getElementById("confirm_password");
        if (x.type === "password") {
            x.type = "text";
        } if (y.type === "password") {
            y.type = "text";
        } else {
            x.type = "password";
            y.type = "password";
        }
    }
</script>
@endpush
