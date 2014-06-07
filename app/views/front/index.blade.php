@extends('front.layouts.front')
@section('main')
{{ Breadcrumbs::render() }}
@if ($artikel->count())
    @foreach ($artikel as $art)
    <div class='panel panel-default'>
    <h1>{{ link_to_route('artikel',$art->judul,$art->slug,$attributes = array('class' => 'reply')) }}</h1>
    <p><strong>By: Admin | {{ date('d F Y',strtotime($art->pubdate)) }} 
            |
            @foreach($art->tags as $tag)
            <a href="{{ route('tags',$tag->slug) }}"><span class="label label-success">{{ $tag->nama }}</span></a>
            @endforeach
            | Comments ({{ $art->comment->count() }}) | Viewed ({{$art->counter->count()}})
        </strong></p>
    {{ truncate($art->isi,400) }}
    <p>{{ link_to_route('artikel','Read More',$art->slug,$attributes = array('class' => 'btn btn-sm btn-info')) }}</p>
    <hr>
    </div>
    @endforeach
{{ $artikel->links() }}
@else
<div class='panel panel-default'>
    <h1>NO POSTS YET</h1>
</div>
@endif
@stop