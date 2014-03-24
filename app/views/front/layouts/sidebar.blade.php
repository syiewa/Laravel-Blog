<div id="sidebar">
    <ul class="nav nav-stacked hidden-xs">
        <li><h3 class="highlight">Archieves <i class="fa fa-archive pull-right"></i></h3></li>
        @foreach($arsip as $year => $months)
        <ul class="nav nav-pills nav-stacked hidden-xs" id="lg-menu">
            <li> <a href="#" data-toggle="collapse" data-target={{ '"#'.$year.'"'}}>
                    <b> {{ $year }} </b><i class="pull-right fa fa-chevron-down"></i>
                </a>
                <ul class="nav nav-pills nav-stacked collapse" id={{ '"'.$year.'"'}}>
                    @foreach ($months as $monthNumber => $month)
                    <li> <a href="{{ url('admin/artikel') }}">{{ $month['monthname'] }} ({{ $month['count'] }})</a></li>
                    @endforeach 
                </ul>
            </li>
        </ul>
        @endforeach
    </ul>
    <ul class="nav nav-stacked hidden-xs">
        <li><h3 class="highlight">Tags <i class="fa fa-tags pull-right"></i></h3></li>
        @foreach($telo as $t)
        <span class="label label-success"> {{ $t->nama }}</span>
        @endforeach
    </ul>
</div>