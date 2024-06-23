<header class="header_section">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
            <a class="navbar-brand" href="{{ route('home', app()->getLocale()) }}">
                <span>{{ __('messages.healet') }}</span>
            </a>
            <div class="" id="">
                <div class="custom_menu-btn">
                    <button onclick="openNav()">
                        <span class="s-1"> </span>
                        <span class="s-2"> </span>
                        <span class="s-3"> </span>
                    </button>
                    <div id="myNav" class="overlay">
                        <div class="overlay-content">
                            <a href="{{ route('home', app()->getLocale()) }}">{{ __('messages.home') }}</a>
                            <a href="{{ route('about', app()->getLocale()) }}">{{ __('messages.about') }}</a>
                            <a href="{{ route('shop', app()->getLocale()) }}">{{ __('messages.shop') }}</a>
                            <a href="{{ route('blog', app()->getLocale()) }}">{{ __('messages.blog') }}</a>
                            <!-- Language Switch Links -->
                            <a href="{{ LaravelLocalization::getLocalizedURL('en') }}">{{ __('messages.english') }}</a>
                            <a href="{{ LaravelLocalization::getLocalizedURL('ar') }}">{{ __('messages.arabic') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>

<script>
    function openNav() {
        document.getElementById("myNav").style.width = "100%";
    }
    function closeNav() {
        document.getElementById("myNav").style.width = "0%";
    }

    document.documentElement.setAttribute('dir', '{{ app()->getLocale() == "ar" ? "rtl" : "ltr" }}');
</script>
