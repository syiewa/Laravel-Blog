<div id="sidebar">
    <ul class="nav nav-stacked">
        <li><h3 class="highlight">Archieve <i class="glyphicon glyphicon-dashboard pull-right"></i></h3></li>
    </ul>
    <ul class="nav nav-stacked">
        <li><h3 class="highlight">Tags <i class="glyphicon glyphicon-dashboard pull-right"></i></h3></li>
        @foreach($telo as $t)
        <span class="label label-success"> {{ $t->nama }}</span>
        @endforeach
    </ul>
</div>