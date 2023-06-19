<div class="langContainer">
    <div>
        @if (App::isLocale('en'))
            <a title="زبان فارسی" href="/">Fa</a>

        @else
            <a title="زبان انگلیسی" href="/en">En</a>

        @endif
    </div>
</div>
<div class="headerContainer">
    <div class="header">
        <div class="logoContainer">
            <a title="حمید نصیرزاده" href="/{{App::isLocale('en')?'en/':''}}">
                <img src="/images/logoWhite.svg" alt="nasirzadeh logo" title="لوگو هنر نصیرزاده">
                <p>{{ __('site.name_of_owner') }}</p>
            </a>
        </div>
        <div class="resMenuToggle"><i class="fa fa-bars"></i></div>
        <ul class="navBar">

            <li><a title="خانه" href="/{{App::isLocale('en')?'en/':''}}">{{ __('site.home') }}</a></li>
            <li><a title="بیوگرافی" href="/{{App::isLocale('en')?'en/':''}}biography">{{ __('site.biography') }}</a></li>
            <li><a title="گالری" href="/{{App::isLocale('en')?'en/':''}}gallery">{{ __('site.gallery') }}</a></li>
            <li><a title="سنتور" href="/{{App::isLocale('en')?'en/':''}}santoor">{{ __('site.santoor') }}</a></li>
            <li><a title="رویداد ها" href="/{{App::isLocale('en')?'en/':''}}events">{{ __('site.events') }}</a></li>
            <li><a title="تماس با ما" href="/{{App::isLocale('en')?'en/':''}}contact">{{ __('site.contact') }}</a></li>
        </ul>
    </div>
</div>