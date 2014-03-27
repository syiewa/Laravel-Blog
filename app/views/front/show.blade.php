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
<div class="panel" id="comment">
    <h1>Comments</h1>
    @foreach ($art->comment as $com)
    <blockquote class="blockquote-danger" style="margin-left:{{ $com->depth * 30 }}px;" id="dodol">
        <div class="row">
            <div class="col-sm-3 text-center">
                <img class="img-circle" src="{{ gravatar($com->email,100) }}" style="width: 100px;height:100px;">
            </div>
            <div class="col-sm-9">
                <p>{{ $com->komentar }}</p>
                <small>{{ $com->nama }}</small><br />
                <a href="#reply-{{$com->id}}" data-toggle="collapse" data-parent="dodol" style="font-size:0.75em">Reply</a>
            </div>
        </div>
        <div class="collapse" id="reply-{{ $com->id }}">
            <h1>Reply Comment</h1>
            @if ($errors->any())
            <div class="alert alert-danger fade in">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
            </div>
            @endif
            {{ Form::open(array('route' => array('store'),'class'=> 'form-horizontal')) }}
            {{ Form::hidden('slug',$art->slug) }}
            {{ Form::hidden('parent_id',$com->id) }}
            {{ Form::hidden('post_id',$art->id) }}
            <div class="form-group has-feedback">
                <div class="col-sm-6">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" placeholder="Username Required" name="nama">
                    </div>
                </div>
            </div>
            <div class="form-group has-feedback">
                <div class="col-sm-6">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="text" class="form-control" placeholder="Email Required" name="email">
                    </div>
                </div>
            </div>
            <div class="form-group has-feedback">
                <div class="col-sm-6">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                        <input type="text" class="form-control" placeholder="URL ex:http://example.com" name="url">
                    </div>
                </div>
            </div>
            <div class="form-group has-feedback">
                <div class="col-sm-9">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-comment"></i></span>
                        <textarea class="form-control" name="komentar"></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-9">
                    <button type="submit" class="btn btn-default">Comment</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </blockquote>
    @endforeach
</div>
@endif
<div class="panel">
    <h1>Add New Comments</h1>
    @if ($errors->any())
    <div class="alert alert-danger fade in">
        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
        <ul>
            {{ implode('', $errors->all('<li class="error">:message</li>')) }}
        </ul>
    </div>
    @endif
    {{ Form::open(array('route' => array('store'),'class'=> 'form-horizontal')) }}
    {{ Form::hidden('slug',$art->slug) }}
    {{ Form::hidden('post_id',$art->id) }}
    <div class="form-group has-feedback">
        <div class="col-sm-6">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control" placeholder="Username Required" name="nama">
            </div>
        </div>
    </div>
    <div class="form-group has-feedback">
        <div class="col-sm-6">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="text" class="form-control" placeholder="Email Required" name="email">
            </div>
        </div>
    </div>
    <div class="form-group has-feedback">
        <div class="col-sm-6">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                <input type="text" class="form-control" placeholder="URL ex:http://example.com" name="url">
            </div>
        </div>
    </div>
    <div class="form-group has-feedback">
        <div class="col-sm-9">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-comment"></i></span>
                <textarea class="form-control" name="komentar"></textarea>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-9">
            <button type="submit" class="btn btn-default">Comment</button>
        </div>
    </div>
</form>

</div>
@stop