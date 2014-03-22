@extends('layouts/article')

@section('main')

<h1>Add New User</h1>
@if ($errors->any())
<div class="alert alert-danger fade in">
    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</
            li>')) }}
    </ul>
</div>
@endif
{{ Form::open(array('route' => 
'admin.users.store','class' => 'form-horizontal','enctype' => "multipart/form-data")) }}
<div class="form-group">
    {{ Form::label('first_name', 'First Name',array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-5">
        {{ Form::text('first_name','',array('class' => 'form-control')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('last_name', 'Last Name',array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-5">
        {{ Form::text('last_name','',array('class' => 'form-control')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('email', 'Email',array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-5">
        {{ Form::email('email','',array('class' => 'form-control')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('password', 'Password',array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-5">
        {{ Form::password('password',array('class' => 'form-control')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('password_confirmation', 'Password Confirmation',array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-5">
        {{ Form::password('password_confirmation',array('class' => 'form-control')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('groups', 'Roles',array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-5">
        {{ Form::select('group',$groups,null,array('class' => 'form-control')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('activate', 'Status',array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-5">
        {{ Form::select('activated',array(1 => 'Active',0 => 'inactive'),null,array('class' => 'form-control')) }}
    </div>
</div>
{{ Form::submit('Create', array('class' => 'btn btninfo')) }}
{{ link_to_route('admin.artikel.index', 'Cancel','', array('class' => 'btn')) }}
{{ Form::close() }}
@stop