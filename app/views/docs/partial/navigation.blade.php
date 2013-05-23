<div class="span3 sidebar">
    <div class="section-menu">
        <ul class="nav nav-list">
            <li class="{{Request::is('docs/about') ? 'active' : ''}}">
                <a href="{{URL::action('DocsController@getAbout')}}" class="first">
                    About
                </a>
            </li>
            <li class="{{Request::is('docs/legal') ? 'active' : ''}}">
                <a href="{{URL::action('DocsController@getLegal')}}">
                    Legal
                </a>
            </li>
            <li class="{{Request::is('docs/privacy') ? 'active' : ''}}">
                <a href="{{URL::action('DocsController@getPrivacy')}}">
                    Privacy
                </a>
            </li>
            <li class="{{Request::is('docs/terms') ? 'active' : ''}}">
                <a href="{{URL::action('DocsController@getTerms')}}">
                    Terms
                </a>
            </li>
        </ul>
    </div>
</div>
