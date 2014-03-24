@extends('front.layouts.front')
@section('main')
{{ Breadcrumbs::render() }}
@if ($artikel->count())
<div class='panel panel-default'>
    @foreach ($artikel as $art)
    <h1>{{ link_to_route('artikel',$art->judul,$art->slug,$attributes = array('class' => 'reply')) }}</h1>
    <p><strong>By: Admin | {{ date('d F Y',strtotime($art->pubdate)) }} 
            |
            @foreach($art->tags as $tag)
            <span class="label label-success">{{ $tag->nama }}</span>
            @endforeach
            | Comments ({{ $art->comment->count() }})
        </strong></p>
    {{ truncate($art->isi,400) }}
    <p>{{ link_to_route('artikel','Read More',$art->slug,$attributes = array('class' => 'btn btn-sm btn-info')) }}</p>
    <hr>
    @endforeach
</div>
{{ $artikel->links() }}
@else
<div class='panel panel-default'>
    <h1>NO POSTS YET</h1>
</div>
@endif
@stop