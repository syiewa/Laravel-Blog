<!-- Left column -->
<strong><i class="glyphicon glyphicon-wrench"></i> Dashboard</strong> 

<hr>
<ul class="nav nav-pills nav-stacked">
    <li @if(isset($active) && $active=="article") class="active" @endif> <a href="#" data-toggle="collapse" data-target="#Article">
            <b> Articles </b><i class="glyphicon glyphicon-chevron-down pull-right"></i>
        </a>
        <ul class="nav nav-pills nav-stacked collapse" id="Article">
            <li> <a href="{{ url('admin/artikel') }}"><i class="fa fa-list-alt fa-fw"></i> All Articles</a></li>
            <li> <a href="{{ url('admin/artikel/create') }}"><i class="fa fa-pencil fa-fw"></i> Create Article</a></li>
        </ul>
    </li>
    <li @if(isset($active) && $active=="users") class="active" @endif> <a href="#" data-toggle="collapse" data-target="#userMenu">
            <b>Users</b> <i class="glyphicon glyphicon-chevron-down pull-right"></i>
        </a>
        <ul class="nav nav-pills nav-stacked collapse" id="userMenu">
            <li> <a href="{{ url('admin/users') }}"><i class="fa fa-users fa-fw"></i> All Users</a></li>
            <li> <a href="{{ url('admin/users/create') }}"><i class="fa fa-pencil-square-o fa-fw"></i> Create Users</a></li>
        </ul>
    </li>
    <li @if(isset($active) && $active=="links") class="active" @endif> <a href="#" data-toggle="collapse" data-target="#link">
            <b>Links</b> <i class="glyphicon glyphicon-chevron-down pull-right"></i>
        </a>
        <ul class="nav nav-pills nav-stacked collapse" id="link">
            <li> <a href="{{ url('admin/links') }}"><i class="fa fa-link fa-fw"></i> All Links</a></li>
            <li> <a href="{{ url('admin/links/create') }}"><i class="fa fa-external-link fa-fw"></i> Create Link</a></li>
        </ul>
    </li>
    <li class=" "> <a href="{{ url('logout') }}">
            <b>Logout</b> 
        </a>
    </li>
</ul>

<hr>