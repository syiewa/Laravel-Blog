@extends('admin/layouts/article')

@section('main')
<div class="panel-heading">All Articles</div>
<div class="panel-body">
    <p>{{ link_to_route('admin.artikel.create', '+ Add new article','',array('class' => 'btn btn-success btn-sm')) }}</p>
    {{ Datatable::table()
    ->addColumn('Judul','Created At','Edit','Delete')       // these are the column headings to be shown
    ->setUrl(route('api.artikel'))   // this is the route where data will be retrieved
    ->render() }}
</div>
@stop