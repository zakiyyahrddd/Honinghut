@extends('layouts.cp')

@section('title', 'Profil')

@section('content')
<form action="{{ route('cp.profiles.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') ? old('name') : $user->name }}" required>
                        @include('cp.components.form-error', ['field' => 'name'])
                    </div>
                    <div class="form-group">
                        <label for="email">Email <span class="text-danger" style="font-size: 8px;">*harap menggunakan email aktif</span></label>
                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') ? old('email') : $user->email }}" required>
                        @include('cp.components.form-error', ['field' => 'email'])
                    </div>
                <div class="card-footer bg-whitesmoke">
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection