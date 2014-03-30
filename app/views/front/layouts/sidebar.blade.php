<div id="sidebar">
    <ul class="nav nav-stacked">
        <li><h3 class="highlight">Archieves <i class="fa fa-archive pull-right"></i></h3></li>
        @foreach($arsip as $year => $months)
        <ul class="nav nav-pills nav-stacked" id="lg-menu">
            <li> <a href="#" data-toggle="collapse" data-target={{ '"#'.$year.'"'}}>
                    <b> {{ $year }} </b><i class="pull-right fa fa-chevron-down"></i>
                </a>
                <ul class="nav nav-pills nav-stacked collapse" id={{ '"'.$year.'"'}}>
                    @foreach ($months as $monthNumber => $month)
                    <li> <a href="{{ route('month',array($year,$month['monthname'])) }}">{{ $month['monthname'] }} ({{ $month['count'] }})</a></li>
                    @endforeach 
                </ul>
            </li>
        </ul>
        @endforeach
    </ul>
</div>