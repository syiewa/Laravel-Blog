<!-- Left column -->
<strong><i class="glyphicon glyphicon-wrench"></i> Dashboard</strong> 

<hr>

<ul class="list-group">
    <li class="nav-header list-group-item"> <a href="#" data-toggle="collapse" data-target="#Article">
            <h5>Settings <i class="glyphicon glyphicon-chevron-down"></i></h5>
        </a>
        <ul class="list-unstyled collapse in" id="Article">
            <li> <a href="{{ url('artikel') }}"><i class="glyphicon glyphicon-home"></i> All Articles</a></li>
            <li> <a href="{{ url('artikel/create') }}"><i class="glyphicon glyphicon-user"></i> Create Article</a></li>
        </ul>
    </li>
    <li class="nav-header list-group-item"> <a href="#" data-toggle="collapse" data-target="#userMenu">
            <h5>Users <i class="glyphicon glyphicon-chevron-down"></i></h5>
        </a>
        <ul class="list-unstyled collapse in" id="userMenu">
            <li> <a href="{{ url('users') }}"><i class="glyphicon glyphicon-home"></i> All Users</a></li>
            <li> <a href="{{ url('users/create') }}"><i class="glyphicon glyphicon-user"></i> Create Users</a></li>
        </ul>
    </li>
</ul>

<hr>