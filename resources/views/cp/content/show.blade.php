@extends('layouts.cp')

@section('title')
<div class="section-header-back">
    <a href="{{ route('cp.contents.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <dl class="m-0">
                    <dt>Nama Menu</dt>
                    <dd></dd>
                </dl>
            </div>
        </div>
    </div>
</div>

<div class="d-flex justify-content-between align-items-center mb-2">
    <h2 class="section-title m-0">
        Feed Preview
    </h2>

</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="table-fit">#</th>
                            <th>Judul</th>
                            <th class="table-fit">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $rowNumber = ($content_preview->currentpage()-1) * $content_preview->perpage() + 1;
                        @endphp
                        @forelse($content_preview as $content_preview)
                        <tr>
                            <td class="table-fit">{{ $rowNumber++ }}</td>
                            <td>{{ $content_preview->title }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        {{ $content_preview->links('cp.components.pagination') }}
    </div>
</div>
@endsection
