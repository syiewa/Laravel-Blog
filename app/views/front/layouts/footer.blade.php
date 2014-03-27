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
        <h4>My Links</h4>
        <p>
            @foreach ($links as $link)
            <a href="{{ $link->url }}"><i class="fa fa-facebook-square fa-2x"></i> {{ $link->judul }} </a>
            @endforeach
        </p>
    </div><!-- /col-lg-4 -->

    <div class="col-lg-4">
        <h4>About Stanley</h4>
        <p>This cute theme was created to showcase your work in a simple way. Use it wisely.</p>
    </div><!-- /col-lg-4 -->
</div>