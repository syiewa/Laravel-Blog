@extends('layouts/article')

@section('main')

<h1>All Links</h1>
<p>{{ link_to_route('admin.links.create', 'Add new link') }}</p>
@if (!empty($links))
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Title</th>
            <th>Type</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($links as $link)
        <tr>
            <td>{{ $link->judul }}</td>
            <td>{{ $link->type }}</td>
            <td>{{ date('d M Y',strtotime($link->created_at)) }}</td>
            <td>{{ date('d M Y',strtotime($link->ubdated_at)) }}</td>
            <td>{{ link_to_route('admin.links.edit', 'Edit', array($link->id), array('class' => 'btn btn-info')) }}</td>
            <td>
                {{ Form::open(array('method'
                => 'DELETE', 'route' => array('admin.links.destroy', $link->id))) }}
                {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </td>
        </tr>
        @endforeach

    </tbody>

</table>
@else
There are no links
@endif
@stop