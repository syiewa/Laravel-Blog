@extends('admin/layouts/article')

@section('main')

<h1>Edit Article</h1>
@if ($errors->any())
<div class="alert alert-danger fade in">
    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</
            li>')) }}
    </ul>
</div>
@endif
{{ Form::model($artikel, array('method' => 'PATCH', 'route' => 
array('admin.artikel.update', $artikel->id),'class' => 'form-horizontal','enctype' => "multipart/form-data")) }}
<div class="form-group">
    {{ Form::label('tgl', 'Created at',array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        <p class="form-control-static">{{ date('d F Y h:i:s',strtotime($artikel->tgl)) }}</p>
    </div>
</div>
<div class="form-group">
    {{ Form::label('pubdate', 'Published At',array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-3">
        <div class='input-group date' id='datetimepicker1'>
            {{ Form::text('pubdate',date('d-m-Y h:i:s',strtotime($artikel->pubdate)),array('class' => 'form-control')) }}
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>
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
    {{ Form::label('status', 'Status',array('class' => 'col-sm-2 control-label')) }}
    @if ($artikel->status == 1) 
    <div class="col-sm-10">
        <label class="radio-inline">
            <input type="radio" id="inlineCheckbox1" value="1" checked name='status'> Active
        </label>
        <label class="radio-inline">
            <input type="radio" id="inlineCheckbox2" value="0" name='status'> In-Active
        </label>
    </div>
    @else 
    <div class="col-sm-10">
        <label class="radio-inline">
            <input type="radio" id="inlineCheckbox1" value="1" name='status'> Active
        </label>
        <label class="radio-inline">
            <input type="radio" id="inlineCheckbox2" value="0" checked name='status'> In-Active
        </label>
    </div>
    @endif
</div>
<div class="form-group">
    {{ Form::label('gambar', 'Picture',array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::file('gambar') }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('tags', 'Tags',array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        @if ($val = array()) @endif
        @if ($i = 0) @endif
        @foreach ($tags as $tag)
        @if ($val[$i] = $tag->nama) @endif
        @if ($i++) @endif
        @endforeach
        <input type="text" value="{{ implode(',',$val) }}" data-role="tagsinput" name='tags' />
    </div>
</div>
{{ Form::submit('Update', array('class' => 'btn btninfo')) }}
{{ link_to_route('admin.artikel.index', 'Cancel','', array('class' => 'btn')) }}
{{ Form::close() }}
@stop