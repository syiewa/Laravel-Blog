@extends('admin/layouts/article')

@section('main')

<h1>Add New Link</h1>
@if ($errors->any())
<div class="alert alert-danger fade in">
    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
</div>
@endif
{{ Form::open(array('route' => 'admin.links.store','class' => 'form-horizontal')) }}
<div class="form-group">
    {{ Form::label('judul', 'Judul',array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-5">
        {{ Form::text('judul','',array('class' => 'form-control')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('url', 'URL',array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-5">
        {{ Form::text('url','',array('class' => 'form-control')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('type', 'Type',array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-5">
        {{ Form::select('type',array('fb' => 'facebook','tw' => 'twitter','li'=>'linkedIn','g+'=>'Goggle+'),'',array('class' => 'form-control')) }}
    </div>
</div>
{{ Form::submit('Create', array('class' => 'btn btninfo')) }}
{{ link_to_route('admin.links.index', 'Cancel','', array('class' => 'btn')) }}
{{ Form::close() }}
@stop