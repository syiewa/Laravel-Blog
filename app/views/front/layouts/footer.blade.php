<div class='row'>                   
    <div class="col-lg-4">
        <h4>My Bunker</h4>
        <p>
            Some Address 987,<br>
            +34 9054 5455, <br>
            Madrid, Spain.
        </p>
    </div><!-- /col-lg-4 -->

    <div class="col-lg-4">
        <ul class="nav nav-stacked">
            <li><h3 class="highlight">Links <i class="fa fa-tags pull-right"></i></h3></li>
            @foreach ($links as $link)
            <a href="{{ $link->url }}"><i class="fa fa-facebook-square fa-2x"></i> {{ $link->judul }} </a>
            @endforeach
        </ul>
    </div><!-- /col-lg-4 -->

    <div class="col-lg-4">
        <ul class="nav nav-stacked">
            <li><h3 class="highlight">Tags <i class="fa fa-tags pull-right"></i></h3></li>
            @foreach($telo as $t)
            <a href="{{ route('tags',$t->slug) }}"><span class="label label-success">{{ $t->nama }}</span></a>
            @endforeach
        </ul>
    </div><!-- /col-lg-4 -->
</div>