
<div class="span3 sidebar">
    <div class="section-menu">
        <ul class="nav nav-list">
            <li class="{{Request::is('admin/home*') ? 'active' : ''}}">
                {{HTML::linkAction('AdminHomeController@getIndex', 'Home', null, array('class' => 'first'))}}
            </li>
            <li class="{{Request::is('admin/log*') ? 'active' : ''}}">
                {{HTML::linkAction('AdminLogController@index', 'Logs')}}
            </li>
            <li class="{{Request::is('admin/object*') ? 'active' : ''}}">
                {{HTML::linkAction('AdminObjectController@index', 'Objects')}}
            </li>
            <li class="{{Request::is('admin/key*') ? 'active' : ''}}">
                {{HTML::linkAction('AdminKeyController@index', 'Keys')}}
            </li>
            <li class="{{Request::is('admin/user*') ? 'active' : ''}}">
                {{HTML::linkAction('AdminUserController@index', 'Users')}}
            </li>
        </ul>
    </div>
</div>
