
<div class="span3 sidebar">
    <div class="section-menu">
        <ul class="nav nav-list">
            <li class="{{Request::is('admin/home') ? 'active' : ''}}">
                {{Html::linkAction('AdminHomeController@getIndex', 'Home', null, array('class' => 'first'))}}
            </li>
            <li class="{{Request::is('admin/object') ? 'active' : ''}}">
                {{Html::linkAction('AdminObjectController@index', 'Objects')}}
            </li>
            <li class="{{Request::is('admin/key') ? 'active' : ''}}">
                {{Html::linkAction('AdminKeyController@index', 'Keys')}}
            </li>
            <li class="{{Request::is('admin/billing') ? 'active' : ''}}">
                {{Html::linkAction('AdminBillingController@index', 'Billing')}}
            </li>
            <li class="{{Request::is('admin/user') ? 'active' : ''}}">
                {{Html::linkAction('AdminUserController@index', 'Users')}}
            </li>
        </ul>
    </div>
</div>