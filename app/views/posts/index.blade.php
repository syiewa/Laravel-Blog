@extends('layouts/user')

@section('main')

<h1>All Artikel</h1>
<p>{{ link_to_route('artikel.create', 'Add new user') }}</p>

@if ($artikel->count())
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Judul</th>
            <th>Created At</th>
            <th>Published Date</th>
            <th>Status</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($artikel as $art)
        <tr>
            <td>{{ $art->judul }}</td>
            <td>{{ date('d M Y',strtotime($art->tgl)) }}</td>
            <td>{{ date('d M Y',strtotime($art->pubdate)) }}</td>
            <td>{{ $stat[$art->status] }}</td>
            <td>{{ link_to_route('artikel.edit', 'Edit', array($art->id), array('class' => 'btn btn-info')) }}</td>
            <td>
                {{ Form::open(array('method'
                => 'DELETE', 'route' => array('artikel.destroy', $art->id))) }}
                {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </td>
        </tr>
        @endforeach

    </tbody>

</table>
<div id='pagination'>
    {{ $artikel->links() }}
</div>
@else
There are no users
@endif
@stop