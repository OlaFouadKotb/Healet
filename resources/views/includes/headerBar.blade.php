<header class="header_section">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
            <a class="navbar-brand" href="{{ route('home', app()->getLocale()) }}">
                <span>{{ __('messages.healet') }}</span>
            </a>
            <button class="navbar-toggler" type="button" onclick="openNav()">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home', app()->getLocale()) }}">{{ __('messages.home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about', app()->getLocale()) }}">{{ __('messages.about') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('shop', app()->getLocale()) }}">{{ __('messages.shop') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('blog', app()->getLocale()) }}">{{ __('messages.blog') }}</a>
                    </li>
                    <!-- Language Switch Links -->
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ strtoupper(app()->getLocale()) }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL('en') }}">{{ __('messages.english') }}</a>
                            <a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL('ar') }}">{{ __('messages.arabic') }}</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
