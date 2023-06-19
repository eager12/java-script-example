@extends('layouts.master')
@section('title', App::isLocale('fa')?'کالیگرافی ، نقاشی و خط نقاشی حمید نصیرزاده | اطلاعات تماس':'Arts Of Nasirzadeh')
@section('description', 'Hamid Nasirzadeh')
@section('headSection')
    <link rel="alternate" hreflang="en" href="https://arts.nasirzadeh.com/en/contact">
    <link rel="alternate" href="https://arts.nasirzadeh.com/contact" hreflang="x-default">
    <link rel="canonical" href="https://arts.nasirzadeh.com/contact">

    <style>
        .contactPageIntroContainer {
            background-image: url('{{findObjectByPos($template,'contactHeader')->value}}');
        }

    </style>

@stop
@section('bodySection')

    <div class="contactPageIntroContainer">
        <div class="contactPageIntro">
            <div>


                <div class="contactFormContainer">
                    <div class="contactFormForm">
                        <form action="/contact/send" method="post">
                            @csrf
                            <input required type="text" name="name" id="name"
                                   placeholder=" {{ __('site.your_name') }} *">
                            <input required type="email" name="email" id="email"
                                   placeholder=" {{ __('site.your_email') }} *">
                            <textarea
                                    name="message"
                                    id="message"
                                    cols="30"
                                    rows="10"
                                    placeholder=" {{ __('site.your_message') }} *"></textarea>
                            <input type="submit" name="submit" id="submit" value=" {{ __('site.submit') }}">
                        </form>
                    </div>
                    <div class="contactEmailContainer">

                        <div class="contactTitleText">
                            {{ __('site.stay_connected') }}
                        </div>
                        <div class="contactConItems">
                            <h4> {!!  __('site.address')  !!}</h4>
                            <p>
                                {!! __('site.address_text') !!}
                            </p>
                        </div>
                        <div class="contactConItems">
                            <h4> {{ __('site.contact') }}</h4>
                            <a title="اطلاعات تماس" href="tel:+982188932768">
                                {{App::isLocale('fa')?enToFa('+98 21 88932768'):'+98 21 88932768'}}
                            </a>
                            <a title="اطلاعات تماس" href="tel:+989121331044">
                                {{App::isLocale('fa')?enToFa('+98 912 1331044'):'+98 912 1331044'}}
                            </a>
                        </div>
                        <div class="contactConItems">
                            <h4> {{ __('site.email') }}</h4>
                            <a title="اطلاعات تماس" href="mailto:arts@nasirzadeh.com">arts[at]nasirzadeh[dot]com</a>
                        </div>
                        {{--                        <div class="emailGrandContainer">--}}
                        {{--                            <div>--}}
                        {{--                                <img src="/images/emailIcon.svg" alt="">--}}
                        {{--                            </div>--}}
                        {{--                            <div>--}}
                        {{--                                <p>SAY HELLO</p>--}}
                        {{--                                <a href="mailto:arts@nasirzadeh.com">arts[at]nasirzadeh[dot]com</a>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('scriptsSection')
    <script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "BreadcrumbList",
  "itemListElement": [{
    "@type": "ListItem",
    "position": 1,
    "name": "کالیگرافی و خط نقاشی نصیرزاده",
    "item": "https://arts.nasirzadeh.com"
  },{
    "@type": "ListItem",
    "position": 2,
    "name": "تماس با ما",
    "item": "https://arts.nasirzadeh.com/contact"
  }]
}
</script>

@stop