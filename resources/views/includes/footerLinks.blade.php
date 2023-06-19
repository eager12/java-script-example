<script src="/js/jquery.js"></script>
<script>
    (function () {
        // your page initialization code here
        // the DOM will be available here
        $('.galleryHeader').css('height', document.body.clientWidth * 0.2891)
        $('.contactHeader').css('height', document.body.clientWidth * 0.2891)
        $('.eventsHeader').css('height', document.body.clientWidth * 0.2891)

        $(window).on('resize', function () {
            $('.galleryHeader').css('height', document.body.clientWidth * 0.2891)
            $('.contactHeader').css('height', document.body.clientWidth * 0.2891)
            $('.eventsHeader').css('height', document.body.clientWidth * 0.2891)
        });

        $('.resMenuToggle').on('click',function (){
            $('.navBar').toggleClass('openMenu')
        })
        $('.navbar li').on('click',function (){
            $('.navBar').removeClass('openMenu')
        })
    })();
</script>
