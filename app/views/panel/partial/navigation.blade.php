
<div class="span3 sidebar">
    <div class="section-menu">
        <ul class="nav nav-list">
            <li class="{{Request::is('panel/user') ? 'active' : ''}}"><a href="/panel/user" class="first">Home
                    <small>Overview of your account</small>
                    <i class="icon-angle-right"></i></a></li>
            <li class="{{Request::is('panel/object') ? 'active' : ''}}"><a href="/panel/object">Objects
                    <small>All of your files</small>
                    <i class="icon-angle-right"></i></a></li>
            <li class="{{Request::is('panel/keys') ? 'active' : ''}}"><a href="/panel/keys">Keys
                    <small>Your access keys</small>
                    <i class="icon-angle-right"></i></a></li>
            <li class="{{Request::is('panel/billing') ? 'active' : ''}}"><a href="/panel/billing">Billing
                    <small>Your billing area</small>
                    <i class="icon-angle-right"></i></a></li>
            <li class="{{Request::is('panel/settings') ? 'active' : ''}}"><a href="/panel/settings">Settings
                    <small>Account settings</small>
                    <i class="icon-angle-right"></i></a></li>
        </ul>
    </div>
</div>
