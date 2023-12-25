<div class="col-md-4 col-lg-3">
    <div class="sidebar">
        @if(count($announcements) != 0)
        <h2>PENGUMUMAN</h2>
        @foreach($announcements as $announcement)
        <a class="announcement" href="{{ url('post/'.$announcement->slug) }}">
            <img src="{{ asset($announcement->thumbnail) }}" onerror="this.src=('{{ asset('files/no-thumbnail.png') }}')">
        </a>
		<p>{{$announcement->title}}</p>
        @endforeach

        @endif
		<h2 style="margin-top: 20px">GALERI</h2>
        @if(count($galleries) != 0)
        @foreach($galleries as $gallery)
        @if($gallery->link)
        <a class="announcement" href="{{ $gallery->link }}" target="_blank">
        @endif
        <img src="{{ asset($gallery->image) }}" alt="{{ $gallery->title }}">
        @if($gallery->link)
        </a>
        @endif
        @endforeach
        @endif
		@foreach($sosmeds as $sosmed)
        <a href="{{ $sosmed->link }}" class="btn" target="_blank"><i class="{{ $sosmed->icon }}"></i> {{ $sosmed->name }}</a>
		@endforeach
      	</div>
</div>