@extends('admin/layouts/article')

@section('main')

<div class="panel-heading">All Comments</div>
<div class="panel-body">
    {{ Datatable::table()
    ->addColumn('Author','Comments','In Response To')       // these are the column headings to be shown
    ->setUrl(route('api.comment'))   // this is the route where data will be retrieved
    ->render() }}
</div>
@stop