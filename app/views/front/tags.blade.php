@extends('front.layouts.front')
@section('main')
{{ Breadcrumbs::render() }}
@if ($artikel->count())
<div class='panel panel-default'>
    @foreach ($artikel as $art)
    <h1>{{ link_to_route('artikel',$art->artikel->judul,$art->artikel->slug,$attributes = array('class' => 'reply')) }}</h1>
    <p>
    {{ truncate($art->artikel->isi,400) }}
    <p>{{ link_to_route('artikel','Read More',$art->artikel->slug,$attributes = array('class' => 'btn btn-sm btn-info')) }}</p>
    <hr>
    @endforeach
</div>
{{ $artikel->links() }}
@else
<div class='panel panel-default'>
    <h1>NO POSTS </h1>
</div>
@endif
@stop