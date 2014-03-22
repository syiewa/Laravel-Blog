<h3>{{ $artikel[0]->artikel->judul }}</h3>
<p> {{$artikel[0]->artikel->isi }} </p>
Comment <br />
@foreach($artikel as $art)
<hr>
<hr>
<div>
    
{{ item_depth($art->depth) }}
Nama : {{ $art->nama }} 
@endforeach
