<?php header("Content-type: application/xml");
?>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
        xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">

    {{--    static pages--}}
    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ \Carbon\Carbon::now()->tz('Asia/Tehran')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1</priority>
    </url>
    <url>
        <loc>{{ url('/en') }}</loc>
        <lastmod>{{ \Carbon\Carbon::now()->tz('Asia/Tehran')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1</priority>
    </url>

    <url>
        <loc>{{ url('/biography') }}</loc>
        <lastmod>{{ \Carbon\Carbon::now()->tz('Asia/Tehran')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc>{{ url('/en/biography') }}</loc>
        <lastmod>{{ \Carbon\Carbon::now()->tz('Asia/Tehran')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.7</priority>
    </url>

    <url>
        <loc>{{ url('/gallery') }}</loc>
        <lastmod>{{ \Carbon\Carbon::now()->tz('Asia/Tehran')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1</priority>
    </url>
    <url>
        <loc>{{ url('/en/gallery') }}</loc>
        <lastmod>{{ \Carbon\Carbon::now()->tz('Asia/Tehran')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1</priority>
    </url>

    <url>
        <loc>{{ url('/events') }}</loc>
        <lastmod>{{ \Carbon\Carbon::now()->tz('Asia/Tehran')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1</priority>
    </url>
    <url>
        <loc>{{ url('/en/events') }}</loc>
        <lastmod>{{ \Carbon\Carbon::now()->tz('Asia/Tehran')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1</priority>
    </url>

    <url>
        <loc>{{ url('/contact') }}</loc>
        <lastmod>{{ \Carbon\Carbon::now()->tz('Asia/Tehran')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.6</priority>
    </url>
    <url>
        <loc>{{ url('/en/contact') }}</loc>
        <lastmod>{{ \Carbon\Carbon::now()->tz('Asia/Tehran')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.6</priority>
    </url>

    {{--events--}}
    @foreach ($events  as $event)
        <url>
            <loc>{{ url('/') }}/en/events/{{$event->id}}/{{str_replace(' ','-',$event->title)}}</loc>
            <lastmod>{{ $event->created_at->tz('Asia/Tehran')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
            <image:image>
                <image:loc>{{$event->banner}}</image:loc>
                <image:title>{{$event->title}}</image:title>
            </image:image>
        </url>
        <url>
            <loc>{{ url('/') }}/events/{{$event->id}}/{{str_replace(' ','-',$event->title)}}</loc>
            <lastmod>{{ $event->created_at->tz('Asia/Tehran')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
            <image:image>
                <image:loc>{{$event->banner}}</image:loc>
                <image:title>{{json_decode($event->meta)->pTitle}}</image:title>
            </image:image>
        </url>
        <url>
            <loc>{{ url('/') }}/events/{{$event->id}}/{{str_replace(' ','-',json_decode($event->meta)->pTitle)}}</loc>
            <lastmod>{{ $event->created_at->tz('Asia/Tehran')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
            <image:image>
                <image:loc>{{$event->banner}}</image:loc>
                <image:title>{{json_decode($event->meta)->pTitle}}</image:title>
            </image:image>
        </url>
    @endforeach

    {{--gallery--}}
    @foreach ($galleries  as $gallery)
        <url>
            <loc>{{ url('/') }}/en/gallery/{{$gallery->id}}/{{str_replace(' ','-',$gallery->name)}}</loc>
            <lastmod>{{ $gallery->created_at->tz('Asia/Tehran')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
            <image:image>
                <image:loc>{{$gallery->image}}</image:loc>
                <image:title>calligraphy with title: {{$gallery->name}}</image:title>
            </image:image>
        </url>
        <url>
            <loc>{{ url('/') }}/gallery/{{$gallery->id}}/{{str_replace(' ','-',$gallery->name)}}</loc>
            <lastmod>{{ $gallery->created_at->tz('Asia/Tehran')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
            <image:image>
                <image:loc>{{$gallery->image}}</image:loc>
                <image:title> نقاشیخط با عنوان {{json_decode($gallery->meta)->pName}}</image:title>
                @foreach($gallery->galleries as $item)
                    <image:loc>{{$item->address}}</image:loc>
                    <image:title> کالیگرافی با عنوان {{json_decode($gallery->meta)->pName}}</image:title>
                @endforeach
            </image:image>
        </url>
        <url>
            <loc>{{ url('/') }}/gallery/{{$gallery->id}}/{{str_replace(' ','-',json_decode($gallery->meta)->pName)}}</loc>
            <lastmod>{{ $gallery->created_at->tz('Asia/Tehran')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
            <image:image>
                <image:loc>{{$gallery->image}}</image:loc>
                <image:title> نقاشیخط با عنوان {{json_decode($gallery->meta)->pName}}</image:title>
                @foreach($gallery->galleries as $item)
                    <image:loc>{{$item->address}}</image:loc>
                    <image:title> کالیگرافی با عنوان {{json_decode($gallery->meta)->pName}}</image:title>
                @endforeach
            </image:image>
        </url>
    @endforeach
</urlset>