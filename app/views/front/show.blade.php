@extends('front.layouts.front')
@section('main')
{{ Breadcrumbs::render() }}
<div class='panel panel-default'>
    <h1>{{ $art->judul }}</h1>
    <p><strong>By: Admin | {{ date('d F Y',strtotime($art->pubdate)) }} 
            |
            @foreach($art->tags as $tag)
            <a href="{{ route('tags',$tag->slug) }}"><span class="label label-success">{{ $tag->nama }}</span></a>
            @endforeach
            | Comments ({{ $art->comment->count() }})
        </strong></p>
    {{ $art->isi }}
</div>
@if ($art->comment->count())
<div class="panel">
    <h1>Comments</h1>
    @foreach ($art->comment as $com)
        <blockquote class="blockquote-danger">
            <div class="row">
                <div class="col-sm-3 text-center">
                    <img class="img-circle" src="{{ gravatar($com->email,100) }}" style="width: 100px;height:100px;">
                </div>
                <div class="col-sm-9">
                    <p>{{ $com->komentar }}</p>
                    <small>{{ $com->nama }}</small>
                </div>
            </div>
        </blockquote>
    @endforeach
</div>
@endif
@stop