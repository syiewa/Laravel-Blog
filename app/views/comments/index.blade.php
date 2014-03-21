@extends('layouts/article')

@section('main')

<h1>All Comments</h1>

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
            <td>
                <p style="font-size: 0.75em"><strong>{{ $com->nama }}</strong></p>
                <p style="font-size: 0.55em">{{ HTML::link($com->email, $com->email) }}</p>
                <p style="font-size: 0.55em">{{ $com->url }}</p>
            </td>
            <td>
                <p style="font-size: 0.55em">Submitted on {{ date('d M Y h:i:s',strtotime($com->created_at)) }}</p>
                <p style="font-size: 0.65em">{{ $com->komentar }}</p>
            </td>
            <td><p style="font-size: 0.65em">{{ $com->artikel->judul }}</p></td>
            <td>{{ link_to_route('admin.artikel.edit', 'Edit', array($com->id), array('class' => 'btn btn-info btn-xs')) }}</td>
            <td>
                {{ Form::open(array('method'
                => 'DELETE', 'route' => array('admin.comments.destroy', $com->id))) }}
                {{ Form::submit('Delete', array('class' => 'btn btn-danger btn-xs')) }}
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