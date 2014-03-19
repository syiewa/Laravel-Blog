<!-- Left column -->
<strong><i class="glyphicon glyphicon-wrench"></i> Dashboard</strong> 

<hr>

<ul class="list-group">
    <li class="nav-header list-group-item"> <a href="#" data-toggle="collapse" data-target="#Article">
            <h5>Articles <i class="glyphicon glyphicon-chevron-down"></i></h5>
        </a>
        <ul class="list-unstyled collapse" id="Article">
            <li> <a href="{{ url('admin/artikel') }}"><i class="glyphicon glyphicon-home"></i> All Articles</a></li>
            <li> <a href="{{ url('admin/artikel/create') }}"><i class="glyphicon glyphicon-user"></i> Create Article</a></li>
        </ul>
    </li>
    <li class="nav-header list-group-item"> <a href="#" data-toggle="collapse" data-target="#userMenu">
            <h5>Users <i class="glyphicon glyphicon-chevron-down"></i></h5>
        </a>
        <ul class="list-unstyled collapse" id="userMenu">
            <li> <a href="{{ url('admin/users') }}"><i class="glyphicon glyphicon-home"></i> All Users</a></li>
            <li> <a href="{{ url('admin/users/create') }}"><i class="glyphicon glyphicon-user"></i> Create Users</a></li>
        </ul>
    </li>
    <li class="nav-header list-group-item"> <a href="#" data-toggle="collapse" data-target="#link">
            <h5>Links <i class="glyphicon glyphicon-chevron-down"></i></h5>
        </a>
        <ul class="list-unstyled collapse" id="link">
            <li> <a href="{{ url('admin/links') }}"><i class="glyphicon glyphicon-home"></i> All Links</a></li>
            <li> <a href="{{ url('admin/links/create') }}"><i class="glyphicon glyphicon-user"></i> Create Link</a></li>
        </ul>
    </li>
    <li class="nav-header list-group-item"> 
        <h5><a href="{{ url('logout') }}"> Logout</a></h5>
    </li>
</ul>

<hr>