@php
    $json = json_decode($product->meta);
    $title = 'اثر خط نقاشی و کالیگرافی با عنوان ' . $json->pName . ' اثر حمید نصیرزاده';
    $description = 'اثر نقاشیخط و کالیگرافی با عنوان ' . $json->pName . ' با تکنیک ' . $json->pTechnique . ' اجرا شده در تاریخ ' . $json->pPerformDate . ' اثر استاد حمید نصیرزاده';
@endphp
@extends('layouts.master')
@section('title', App::isLocale('fa') ? $title : 'Arts Of Nasirzadeh')
@section('description', $description)
@section('headSection')
    <link rel="alternate" hreflang="en"
        href="https://arts.nasirzadeh.com/en/gallery/{{ $product->id }}/{{ str_replace(' ', '-', $product->name) }}">
    <link rel="alternate"
        href="https://arts.nasirzadeh.com/gallery/{{ $product->id }}/{{ str_replace(' ', '-', $product->name) }}"
        hreflang="x-default">
    <link rel="canonical"
        href="https://arts.nasirzadeh.com/gallery/{{ $product->id }}/{{ str_replace(' ', '-', $product->name) }}">

    <link rel="stylesheet" href="/css/snackbar.min.css">
    <script src="/js/snackbar.min.js"></script>
@stop
@section('bodySection')

    <div class="singleProductPageContainer">

        <div>

            <div class="singleProductItemContainer">
                <div class="singleProductGallerySection">
                    <div class="galleryBigImage">
                        <img id="setImage" src="{{ $product->image }}" alt="خط نقاشی با عنوان{{ $json->pName }}"
                            title="خط نقاشی با عنوان{{ $json->pName }}">
                    </div>
                    <div class="singleProductGalleryThumbnail">
                        <div onclick="changeImage('{{ $product->image }}' , 0)" class="thumbItem" id="thumb0">
                            <img src="{{ $product->image }}" alt="خط نقاشی با عنوان{{ $json->pName }}"
                                title="خط نقاشی با عنوان{{ $json->pName }}">
                        </div>
                        @foreach ($product->galleries as $image)
                            <div onclick="changeImage('{{ $image->address }}' , {{ $image->id }})" class="thumbItem"
                                id="thumb{{ $image->id }}">
                                <img src="{{ $image->address }}" alt="خط نقاشی با عنوان{{ $json->pName }}"
                                    title="خط نقاشی با عنوان{{ $json->pName }}">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="singleProductDetailSection"
                    style="@php if(count($product->galleries)==0) echo'padding-bottom:32px' @endphp">

                    <div>
                        <h1>{{ __('site.calligraphyWithTitle') }}
                            {{ App::isLocale('fa') ? $json->pName ?? '' : $product->name }}</h1>
                        <p>{{ __('site.size') }}: {{ $json->size }}</p>
                        <p>{{ __('site.technique') }}
                            : {{ App::isLocale('fa') ? $json->pTechnique ?? '' : $json->technique }}</p>
                        <p>{{ __('site.perform_date') }}
                            : {{ App::isLocale('fa') ? $json->pPerformDate ?? '' : $json->performDate }}</p>
                        <p>{{ __('site.price') }}: @if ($product->price == 0)
                            {{ __('site.saled') }} @else{{ number_format($product->price) }}
                            {{ __('site.toman') }}
                        @endif</p>
                        <p>{!! App::isLocale('fa') ? $product->pDescription : '' !!}</p>
                    </div>
                    <div>
                        <input type="text" class="nameInput" name="name" id="name"
                            placeholder="{{ __('site.enter_full_name') }}">
                        <input type="text" class="mobileInput" name="mobile" id="mobile"
                            placeholder="{{ __('site.enter_mail_or_number') }}">
                        <input type="submit" id="submitBtn" class="submitBtn" value="{{ __('site.buy_artwork') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('scriptsSection')

    <script>
        let image;
        (function() {
            $('.thumbItem').css('border-color', 'transparent')
            $(`#thumb0`).css('border-color', '#000')

        })();

        const changeImage = (address, id) => {
            $('#setImage').attr('src', address)
            $('.thumbItem').css('border-color', 'transparent')
            $(`#thumb${id}`).css('border-color', '#000')
        }
    </script>
    <script>
        (function() {
            $('#submitBtn').on('click', function() {
                let name = $('#name').val();
                let mobile = $('#mobile').val();
                if (name == '') {
                    Snackbar.show({
                        pos: 'bottom-center',
                        text: 'Please Enter Your Name'
                    });
                } else if (mobile == '') {
                    Snackbar.show({
                        pos: 'bottom-center',
                        text: 'Please Enter Your Mobile Or Email'
                    });
                } else {
                    Snackbar.show({
                        pos: 'bottom-center',
                        text: 'Please Wait ...'
                    });

                    $.get(`/gallery/{{ $product->id }}/{{ str_replace(' ', '-', $product->name) }}/sendReq`, {
                            name: name,
                            mobile: mobile,
                        },
                        function(data, status) {
                            Snackbar.show({
                                pos: 'bottom-center',
                                text: 'Your request has been submitted!\n We will contact you as soon as possible.'
                            });
                        });
                }
            })

        })();
    </script>
    <script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "Product",
  "name": "اثر کالیگرافی با نام {{App::isLocale('fa')?$json->pName??'':$product->name}}",
  "image": "{{$product->image}}",
  "description": "
  اثر خط نقاشی با عنوان {{App::isLocale('fa')?$json->pName??'':$product->name}} |
  {{ __('site.size') }}: {{$json->size}} |
  {{ __('site.technique') }}
        {{ __('site.perform_date') }}
        : {{App::isLocale('fa')?$json->pPerformDate??'':$json->performDate}} |

        : {{App::isLocale('fa')?$json->pTechnique??'':$json->technique}} |
             اثر استاد حمید نصیرزاده
         |

{!! App::isLocale('fa')?$product->pDescription:'' !!}",
  "sku": "ARTS00{{$product->id}}",
  "offers": {
    "@type": "Offer",
    "url": "https://arts.nasirzadeh.com/{{App::isLocale('en')?'en/':''}}gallery/{{$product->id}}/{{str_replace(' ','-',$product->name)}}
        /{{str_replace(' ','-',$product->name)}}",
    "priceCurrency": "USD",
    "price": "{{$product->price}}",
    "availability": "https://schema.org/PreOrder",
    "itemCondition": "https://schema.org/NewCondition"
  },
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "9.9",
    "bestRating": "10",
    "worstRating": "7",
    "ratingCount": "100"
  }
}




    </script>

    <script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "BreadcrumbList",
  "itemListElement": [{
    "@type": "ListItem",
    "position": 1,
    "name": "کالیگرافی و خط نقاشی نصیرزاده",
    "item": "https://arts.nasirzadeh.com/{{App::isLocale('en')?'en':''}}"
  },{
    "@type": "ListItem",
    "position": 2,
    "name": "آثار",
    "item": "https://arts.nasirzadeh.com/gallery{{App::isLocale('en')?'/en':''}}"
  },
  {
    "@type": "ListItem",
    "position": 3,
    "name":  "اثر نقاشیخط و کالیگرافی با عنوان {{$json->pName}} با تکنیک {{$json->pTechnique}} اجرا شده در تاریخ {{$json->pPerformDate}} اثر استاد حمید نصیرزاده",

    "item": "https://arts.nasirzadeh.com/{{App::isLocale('en')?'en/':''}}gallery/{{$product->id}}/{{str_replace(' ','-',$product->name)}}"
  }]
}


    </script>
@stop
