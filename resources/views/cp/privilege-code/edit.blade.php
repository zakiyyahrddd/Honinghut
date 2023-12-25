@extends('layouts.cp')

@section('title')
<div class="section-header-back">
    <a href="{{ route('cp.privilege-codes.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
</div>
<h1>Edit Privilege Code</h1>
@endsection

@section('content')
<form action="{{ route('cp.privilege-codes.update', $code) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-black-50">Konten</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="parent">Parent</label>
                        <input type="text" id="parent" class="form-control{{ $errors->has('parent') ? ' is-invalid' : '' }}" name="parent" autofocus="" value="{{ $code->parent }}">
                        @include('cp.components.form-error', ['field' => 'parent'])
                    </div>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" autofocus="" value="{{ $code->name }}">
                        @include('cp.components.form-error', ['field' => 'name'])
                    </div>
                    <div class="form-group">
                        <label for="route_name">Route Name</label>
                        <input type="text" id="route_name" class="form-control{{ $errors->has('route_name') ? ' is-invalid' : '' }}" name="route_name" autofocus="" value="{{ $code->route_name }}">
                        @include('cp.components.form-error', ['field' => 'route_name'])
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea rows="3" style="height: auto" type="text" id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" autofocus>{{ $code->description }}</textarea>
                        @include('cp.components.form-error', ['field' => 'description'])
                    </div>
                    <div class="form-group">
                        <label for="order">Icon</label>
                        <div class="input-group">
                            <input type="icon" id="icon" class="form-control{{ $errors->has('icon') ? ' is-invalid' : '' }}" name="icon" autofocus="" value="{{ $code->icon }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="{{ $code->icon }}"></i>
                                </div>
                            </div>
                        </div>
                        @include('cp.components.form-error', ['field' => 'icon'])
                    </div>
                    <div class="form-group">
                        <label for="order">Order</label>
                        <input type="number" id="order" class="form-control{{ $errors->has('order') ? ' is-invalid' : '' }}" name="order" autofocus="" value="{{ $code->order }}">
                        @include('cp.components.form-error', ['field' => 'order'])
                    </div>
                </div>
                <div class="card-footer bg-whitesmoke">
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                    <a href="{{ route('cp.privilege-codes.index') }}" class="btn btn-secondary">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@push('script')
<script>
    CKEDITOR.instances['description'].destroy();
    $('#icon').keyup(function(event) {
        $(this).siblings('.input-group-append').find('i').removeClass().addClass($(this).val());
    });
</script>
@endpush