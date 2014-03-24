@extends('front.layouts.front')
@section('main')
{{ Breadcrumbs::render() }}
<div class='panel panel-default'>
    <h1>{{ $art->judul }}</h1>
    <p><strong>By: Admin | {{ date('d F Y',strtotime($art->pubdate)) }} 
            |
            @foreach($art->tags as $tag)
            <span class="label label-success">{{ $tag->nama }}</span>
            @endforeach
            | Comments ({{ $art->comment->count() }})
        </strong></p>
    {{ $art->isi }}
</div>
@if ($art->comment->count())
<div class="panel panel-default">
    <h1>Comments</h1>
    @foreach ($art->comment as $com)
    {{ $com->nama }}
        @endforeach
</div>
@endif
@stop