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
        </tr>
    </thead>
    <tbody>
        @foreach ($comments as $com)
        <tr>
            <td>
                <p style="font-size: 0.75em"><strong>{{ $com->nama }}</strong></p>
                <p style="font-size: 0.55em">{{ HTML::link($com->url, $com->url) }}</p>
                <p style="font-size: 0.55em">{{ $com->email }}</p>
            </td>
            <td>
                <p style="font-size: 0.55em">Submitted on {{ date('d M Y h:i:s',strtotime($com->created_at)) }}</p>
                <p style="font-size: 0.65em">{{ $com->komentar }}</p>
                <div>
                    {{ Form::open(array('method'
                    => 'DELETE', 'route' => array('admin.comments.destroy', $com->id))) }}
                    {{ HTML::link('','Edit') }} |
                    {{ link_to_route('admin.comments.store','Reply','',$attributes = array('class' => 'reply','id'=> $com->id.'-'.$com->post_id)) }} | {{ Form::submit('Delete', array('class' => 'btn btn-danger btn-xs')) }}
                    {{ Form::close() }}
                </div>
            </td>
            <td><p style="font-size: 0.65em">{{ $com->artikel->judul }}</p></td>
        </tr>
        @endforeach

    </tbody>

</table>
<div id="telo">
</div>
<br />
<div id='pagination'>
    {{ $comments->links() }}
</div>
@else
There are no users
@endif
@stop