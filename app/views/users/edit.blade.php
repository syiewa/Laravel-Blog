@extends('layouts/article')

@section('main')
<h1>Edit User</h1>
@if ($errors->any())
<div class="alert alert-danger fade in">
    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</
            li>')) }}
    </ul>
</div>
@endif
{{ Form::model($user, array('method' => 'PATCH', 'route' => 
array('admin.users.update', $user->id),'class' => 'form-horizontal')) }}
<div class="form-group">
    {{ Form::label('email', 'Email',array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-5">
        {{ Form::email('email',$user->email,array('class' => 'form-control')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('password', 'Password',array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-5">
        {{ Form::password('password',array('value' => '','class' => 'form-control')) }}
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
        @if ($user->activated) 
        @if ($activated = 1) @endif
        @else @if ($activated = 0) @endif
        @endif
        @if ($user->id == Sentry::getUser()->id) @if ($disabled = "disabled") @endif @else @if ($disabled = NULL) @endif
        @endif
        {{ Form::select('activated',array(1 => 'Active',0 => 'inactive'),$activated,array('class' => 'form-control',$disabled)) }}
    </div>
</div>
{{ Form::submit('Update', array('class' => 'btn btninfo')) }}
{{ link_to_route('admin.users.index', 'Cancel','', array('class' => 'btn')) }}
{{ Form::close() }}
@stop