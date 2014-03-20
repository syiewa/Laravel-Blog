@extends('layouts/article')

@section('main')

<h1>All Articles</h1>
<p>{{ link_to_route('admin.artikel.create', 'Add new article') }}</p>

@if (!empty($comments))
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Author</th>
            <th>Comments</th>
            <th>In Response To</th>
            <th>Status</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($comments as $com)
        <tr>
            <td>{{ $com->nama }}<br />
                {{ $com->email }}<br />
                {{ $com->url }}<br />
            </td>
            <td>Submitted on {{ date('d M Y h:i:s',strtotime($com->created_at)) }}
                <p>{{ $com->komentar }}</p>
            </td>
            <td>{{ $com->artikel->judul }}</td>
            <td>{{ link_to_route('admin.artikel.edit', 'Edit', array($com->id), array('class' => 'btn btn-info')) }}</td>
            <td>
                {{ Form::open(array('method'
                => 'DELETE', 'route' => array('admin.artikel.destroy', $com->id))) }}
                {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </td>
        </tr>
        @endforeach

    </tbody>

</table>
<div id='pagination'>
    {{ $comments->links() }}
</div>
@else
There are no users
@endif
@stop