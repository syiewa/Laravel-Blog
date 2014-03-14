@extends('layouts/user')

@section('main')

<h1>Edit User</h1>
{{ Form::model($artikel, array('method' => 'PATCH', 'route' => 
array('artikel.update', $artikel->id),'class' => 'form-horizontal')) }}
<div class="form-group">
    {{ Form::label('tgl', 'Created at',array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        <p class="form-control-static">{{ date('d F Y h:i:s',strtotime($artikel->tgl)) }}</p>
    </div>
</div>
<div class="form-group">
    {{ Form::label('judul', 'Judul',array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('judul',$artikel->judul,array('class' => 'form-control')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('isi', 'Isi',array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::textarea('isi',$artikel->isi,array('class' => 'form-control')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('email', 'Email:') }}
    {{ Form::text('email') }}
</div>
<div class="form-group">
    {{ Form::label('phone', 'Phone:') }}
    {{ Form::text('phone') }}
</div>
<div class="form-group">
    {{ Form::label('name', 'Name:') }}
    {{ Form::text('name') }}
</div>
<div class="form-group">
    {{ Form::submit('Update', array('class' => 'btn btninfo')) }}
    {{ link_to_route('artikel.show', 'Cancel', $artikel->id, 
    array('class' => 'btn')) }}
</div>
{{ Form::close() }}
@if ($errors->any())
<ul>
    {{ implode('', $errors->all('<li class="error">:message</
        li>')) }}
</ul>
@endif
@stop
@foreach ($tags as $tag)
{{ $tag->nama }}
@endforeach
@stop