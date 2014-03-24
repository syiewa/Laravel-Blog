@extends('admin/layouts/article')

@section('main')

<div class="panel-heading">All Comments</div>
<div class="panel-body">
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
                    <p><strong>{{ $com->nama }}</strong></p>
                    <p>{{ HTML::link($com->url, $com->url) }}</p>
                    <p>{{ $com->email }}</p>
                </td>
                <td>
                    <p>Submitted on {{ date('d M Y h:i:s',strtotime($com->created_at)) }}</p>
                    <p>{{ $com->komentar }}</p>
                    <div>
                        {{ Form::open(array('method'
                        => 'DELETE', 'route' => array('admin.comments.destroy', $com->id))) }}
                        {{ HTML::link('','Edit') }} |
                        {{ link_to_route('admin.comments.store','Reply','',$attributes = array('class' => 'reply','id'=> $com->id.'-'.$com->post_id)) }} | {{ Form::submit('Delete', array('class' => 'btn btn-danger btn-xs')) }}
                        {{ Form::close() }}
                    </div>
                </td>
                <td><p>{{ $com->artikel->judul }}</p></td>
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
</div>
@stop