<div class="footerContainer">

    <div class="footer">
        <div>
            <h4>{{__('site.address')}}</h4>
            <p>
                {!! __('site.address_text')!!}
            </p>
        </div>
        <div>
            <h4>{{__('site.contact')}}</h4>
            <a title="اطلاعات تماس" href="tel:+982188932768">
                {{App::isLocale('fa')?enToFa('+98 21 88932768'):'+98 21 88932768'}}
            </a>
            <a title="اطلاعات تماس" href="tel:+989121331044">
                {{App::isLocale('fa')?enToFa('+98 912 1331044'):'+98 912 1331044'}}
            </a>
        </div>
        <div>
            <h4>{{__('site.email')}}</h4>
            <a title="اطلاعات تماس" href="mailto:arts@nasirzadeh.com">arts[at]nasirzadeh[dot]com</a>
        </div>
        <div>
            <h4>{{__('site.newsletter')}}</h4>
            <p>{{__('site.get_updated_with_us')}}</p>
            <input type="text" name="" id="" placeholder="{{__('site.enter_your_email')}}">
            <button>{{__('site.submit')}}</button>
        </div>
    </div>
    <div class="footerDivider"></div>
    <div class="copyRightSection">
        <div><p>© 2021 {{__('site.copyright')}}</p></div>
        <div>
            <a title="خانه" href="/{{App::isLocale('en')?'en/':''}}">{{__('site.home')}}</a>
            <span>/</span>
            <a title="بیوگرافی" href="/{{App::isLocale('en')?'en/':''}}biography">{{__('site.biography')}}</a>
            <span>/</span>
            <a title="گالری" href="/{{App::isLocale('en')?'en/':''}}gallery">{{__('site.gallery')}}</a>
            <span>/</span>
            <a title="سنتور" href="/{{App::isLocale('en')?'en/':''}}santoor">{{__('site.santoor')}}</a>
            <span>/</span>
            <a title="رویداد ها" href="/{{App::isLocale('en')?'en/':''}}events">{{__('site.events')}}</a>
            <span>/</span>
            <a title="تماس با ما" href="/{{App::isLocale('en')?'en/':''}}contact">{{__('site.contact')}}</a>
        </div>
        <div>
            <a title="اینستاگرام" target="_blank" href="https://www.instagram.com/arts.nasirzadeh/"><img title="اینستاگرام" src="/images/instagram.svg"
                                                                                      alt="اینستاگرام"></a>
            <a title="پینترست" target="_blank" href="https://www.pinterest.com/artsnasirzadeh/"><img title="پینترست" src="/images/pinterest.svg" alt="پینترست"></a>

        </div>
    </div>
</div>