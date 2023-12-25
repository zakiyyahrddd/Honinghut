@extends('layouts.cp')

@section('title', 'Contents')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-2">
    <h2 class="section-title m-0">
        Clients Folders
    </h2>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body p-5">
                <div class="col-12">
                    <div class="row">
                        @foreach ($clients as $client)
                        <div class="col-6 col-md-4 col-lg-4 mb-5 toresponsive">
                            <a class="folder text-center border btn btn-lg w-100" href="{{ route('cp.contents.show', $client)}}" role="button">

                                    <span>{{ $client->name }}</span><i class="px-3 fas fa-external-link-alt"></i>

                            </a>
                        </div>
                        @endforeach
                    </div>
			    </div>
            </div>
        </div>
    </div>
</div>
@endsection
