@php
    $json = json_decode($product->meta);
    $title = 'اثر ساز سنتور و کالیگرافی با عنوان ' . $json->pName . ' اثر حمید نصیرزاده';
    $description = 'ساز سنتور با عنوان ' . $json->pName . ' با چوب ' . $json->pWoodType . ' ساخته شده در تاریخ ' . $json->pBuildDate . ' ساخت استاد حمید نصیرزاده';
@endphp
@extends('layouts.master')
@section('title', App::isLocale('fa') ? $title : 'Arts Of Nasirzadeh')
@section('description', $description)
@section('headSection')
    <link rel="alternate" hreflang="en"
        href="https://arts.nasirzadeh.com/en/santoor/{{ $product->id }}/{{ str_replace(' ', '-', $product->name) }}">
    <link rel="alternate"
        href="https://arts.nasirzadeh.com/santoor/{{ $product->id }}/{{ str_replace(' ', '-', $product->name) }}"
        hreflang="x-default">
    <link rel="canonical"
        href="https://arts.nasirzadeh.com/santoor/{{ $product->id }}/{{ str_replace(' ', '-', $product->name) }}">

    <link rel="stylesheet" href="/css/snackbar.min.css">
    <script src="/js/snackbar.min.js"></script>
@stop
@section('bodySection')

    <div class="singleProductPageContainer">

        <div>

            <div class="singleProductItemContainer">
                <div class="singleProductGallerySection">
                    <div class="galleryBigImage">
                        <img id="setImage" src="{{ $product->image }}" alt="ساز سنتور با عنوان{{ $json->pName }}"
                            title="ساز سنتور با عنوان{{ $json->pName }}">
                        <div id="setVideo" style="display:none;">
                            <style>
                                .h_iframe-aparat_embed_frame {
                                    position: relative;
                                }

                                .h_iframe-aparat_embed_frame .ratio {
                                    display: block;
                                    width: 100%;
                                    height: auto;
                                }

                                .h_iframe-aparat_embed_frame iframe {
                                    position: absolute;
                                    top: 0;
                                    left: 0;
                                    width: 100%;
                                    height: 100%;
                                }
                            </style>
                            <div class="h_iframe-aparat_embed_frame"><span
                                    style="display: block;padding-top: 57%"></span><iframe
                                    src="https://www.aparat.com/video/video/embed/videohash/{{ $product->video }}/vt/frame"
                                    allowFullScreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="singleProductGalleryThumbnail">
                        <div onclick="changeImage('{{ $product->image }}' , 0)" class="thumbItem" id="thumb0">
                            <img src="{{ $product->image }}" alt="ساز سنتور با عنوان{{ $json->pName }}"
                                title="ساز سنتور با عنوان{{ $json->pName }}">
                        </div>
                        @if ($product->video)
                            <div onclick="changeImage('{{ $product->video }}' , 1000 , true)" class="thumbItem"
                                id="thumb1000">
                                <img src="{{ $product->image }}" alt="ساز سنتور با عنوان{{ $json->pName }}"
                                    title="ساز سنتور با عنوان{{ $json->pName }}" />

                                    <div class="imageVideoOverlay">
                                        <img src="/images/playIcon.png"/>

                                    </div>

                            </div>
                        @endif
                        @foreach ($product->galleries as $image)
                            <div onclick="changeImage('{{ $image->address }}' , {{ $image->id }})" class="thumbItem"
                                id="thumb{{ $image->id }}">
                                <img src="{{ $image->address }}" alt="ساز سنتور با عنوان{{ $json->pName }}"
                                    title="ساز سنتور با عنوان{{ $json->pName }}">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="singleProductDetailSection"
                    style="@php if(count($product->galleries)==0) echo'padding-bottom:32px' @endphp">

                    <div>
                        <h1>{{ __('site.santoorWithTitle') }}
                            {{ App::isLocale('fa') ? $json->pName ?? '' : $product->name }}</h1>
                        <p>{{ __('site.santoorType') }}:
                            {{ App::isLocale('fa') ? $json->pInstrumentType ?? '' : $product->instrumentType }}</p>
                        <p>{{ __('site.woodType') }}
                            : {{ App::isLocale('fa') ? $json->pWoodType ?? '' : $product->WoodType }}</p>
                        <p>{{ __('site.buildDate') }}
                            : {{ App::isLocale('fa') ? $json->pBuildDate ?? '' : $product->buildDate }}</p>
                        <p>{{ __('site.price') }}: {{ number_format($product->price) }} {{ __('site.toman') }}</p>
                        <p>{!! App::isLocale('fa') ? $product->description : '' !!}</p>
                    </div>

                    <div>
                        <input type="text" class="nameInput" name="name" id="name"
                            placeholder="{{ __('site.enter_full_name') }}">
                        <input type="text" class="mobileInput" name="mobile" id="mobile"
                            placeholder="{{ __('site.enter_mail_or_number') }}">
                        <input type="submit" id="submitBtn" class="submitBtn" value="{{ __('site.buy_santoor') }}">
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

        const changeImage = (address, id, isVideo = false) => {
            if (isVideo) {
                $('#setImage').attr('src', "")

                $('#setVideo').css("display", 'block')
                $('#setImage').css("display", 'none')
                $('.thumbItem').css('border-color', 'transparent')
                $(`#thumb${id}`).css('border-color', '#000')
            } else {
                $('#setImage').attr('src', address)
                $('#setVideo').css("display", 'none')
                $('#setImage').css("display", 'block')
                $('.thumbItem').css('border-color', 'transparent')
                $(`#thumb${id}`).css('border-color', '#000')
            }

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

                    $.get(`/santoor/{{ $product->id }}/{{ str_replace(' ', '-', $product->name) }}/sendReq`, {
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
  "name": "ساز سنتور با نام {{App::isLocale('fa')?$json->pName??'':$product->name}}",
  "image": "{{$product->image}}",
  "description": "
  اثر ساز سنتور با عنوان {{App::isLocale('fa')?$json->pName??'':$product->name}} |
  {{ __('site.santoorType') }}: {{$json->pInstrumentType}} |
  {{ __('site.santoorType') }}
        {{ __('site.buildDate') }}
        : {{App::isLocale('fa')?$json->pBuildDate??'':$product->buildDate}} |

        : {{App::isLocale('fa')?$json->pWoodType??'':$product->WoodType}} |
             ساخت استاد حمید نصیرزاده
         |

{!! App::isLocale('fa')?$product->pDescription:'' !!}",
  "sku": "ARTS00{{$product->id}}",
  "offers": {
    "@type": "Offer",
    "url": "https://arts.nasirzadeh.com/{{App::isLocale('en')?'en/':''}}santoor/{{$product->id}}/{{str_replace(' ','-',$product->name)}}
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
    "name": "کالیگرافی و ساز سنتور نصیرزاده",
    "item": "https://arts.nasirzadeh.com/{{App::isLocale('en')?'en':''}}"
  },{
    "@type": "ListItem",
    "position": 2,
    "name": "سنتور",
    "item": "https://arts.nasirzadeh.com/santoor{{App::isLocale('en')?'/en':''}}"
  },
  {
    "@type": "ListItem",
    "position": 3,
    "name":  "ساز سنتور با عنوان {{$json->pName}} با چوب {{$json->pWoodType}} ساخته شده در تاریخ {{$json->pBuildDate}} ساخته استاد حمید نصیرزاده",

    "item": "https://arts.nasirzadeh.com/{{App::isLocale('en')?'en/':''}}santoor/{{$product->id}}/{{str_replace(' ','-',$product->name)}}"
  }]
}


    </script>
@stop
