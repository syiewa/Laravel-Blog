@extends('front.layouts.front')
@section('main')
{{ Breadcrumbs::render() }}
@if ($artikel->count())
@foreach ($artikel as $art)
<div class='panel'>
    {{ $art->pudate }}
    <h1>{{ $art->judul }}</h1>
    <p><strong>By: Admin | {{ date('d F Y',strtotime($art->pubdate)) }} 
            |
            @foreach($art->tags as $tag)
            <span class="label label-success">{{ $tag->nama }}</span>
            @endforeach
            | Comments ({{ $art->comment->count() }})
        </strong></p>
    {{ truncate($art->isi,400) }}
    <p><a hre="#" class="btn btn-info btn-sm">Read More</a></p>
</div>
@endforeach
<div class='panel'>
    {{ $artikel->links() }}
</div>
@else
<div class='panel'>
    <h1>NO POSTS YET</h1>
</div>
@endif
@stop