@extends('layouts/article')

@section('main')

<h1>Add New Article</h1>
@if ($errors->any())
<div class="alert alert-danger fade in">
    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
</div>
@endif
{{ Form::open(array('route' => 'admin.artikel.store','class' => 'form-horizontal','enctype' => "multipart/form-data")) }}
<div class="form-group">
    {{ Form::label('tgl', 'Created at',array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        <p class="form-control-static">{{ date('d F Y h:i:s') }}</p>
    </div>
</div>
<div class="form-group">
    {{ Form::label('pubdate', 'Published At',array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-3">
        <div class='input-group date' id='datetimepicker1'>
            <input type='text' class="form-control"  name='pubdate'/>
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>
    </div>
</div>
<div class="form-group">
    {{ Form::label('judul', 'Judul',array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-5">
        {{ Form::text('judul','',array('class' => 'form-control')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('isi', 'Isi',array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-6">
        {{ Form::textarea('isi','',array('class' => 'form-control')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('status', 'Status',array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-10">
        <label class="radio-inline">
            <input type="radio" id="inlineCheckbox1" value="1" checked name='status'> Active
        </label>
        <label class="radio-inline">
            <input type="radio" id="inlineCheckbox2" value="0" name='status'> In-Active
        </label>
    </div>
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
        <input type="text" value="" data-role="tagsinput" name='tags' />
    </div>
</div>
{{ Form::submit('Create', array('class' => 'btn btninfo')) }}
{{ link_to_route('admin.artikel.index', 'Cancel','', array('class' => 'btn')) }}
{{ Form::close() }}
@stop