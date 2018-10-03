<footer class="pb-5 pt-4 text-center text-md-left">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-3 mt-4">
                <a href="{{ route('front.home') }}" class="d-block" title="STRONA GŁÓWNA">STRONA GŁÓWNA</a>
                <a href="{{ asset('/uploads/regulamin-promocji.pdf') }}" class="d-block" title="REGULAMIN PROMOCJI" target="_blank">REGULAMIN PROMOCJI</a>
                <a href="{{ asset('/uploads/regulamin-konkurs.pdf') }}" class="d-block" title="REGULAMIN KONKURSU" target="_blank">REGULAMIN KONKURSU</a>
                <a href="{{ route('front.cookies') }}" class="d-block" title="POLITYKA COOKIES">POLITYKA COOKIES</a>
                <a href="{{ route('front.imprint') }}" class="d-block" title="IMPRINT">IMPRINT</a>
            </div>
            <div class="col-12 col-md-6 col-lg-2 mt-4">
                <h6>NAPISZ DO NAS</h6>
                <a href="{{ route('front.home.contact') }}" title="Napisz do nas" class="contact float-md-left"></a>
                <a href="https://www.facebook.com/VARTA.ConsumerPL/" title="Napisz do nas" target="black" class="facebook float-md-left" target="_blank"></a>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mt-4 socials">
                <h6>UDOSTĘPNIJ NASZĄ STRONĘ</h6>
                <a href="https://www.facebook.com/sharer/sharer.php?u=http%3a%2f%2fwww.czas-na-zabawe.pl" title="facebook.com" class="fb float-md-left"></a>
                <a href="https://plus.google.com/share?url=http%3a%2f%2fwww.czas-na-zabawe.pl" title="google.com" class="gp float-md-left"></a>
                <a href="https://www.linkedin.com/shareArticle?mini=true&url=http%3a%2f%2fwww.czas-na-zabawe.pl&title=STRONA%20G%C5%81%C3%93WNA&summary=&source=" title="instagram.com" class="in float-md-left"></a>
                <a href="https://twitter.com/home?status=http%3a%2f%2fwww.czas-na-zabawe.pl" title="twiter.com" class="tw float-md-left"></a>
                <a href="https://www.xing.com/spi/shares/new?url=http%3a%2f%2fwww.czas-na-zabawe.pl" title="xing.com" class="xi float-md-left"></a>
            </div>
        </div>
    </div>
</footer>

<a href="/" class="scroll-to-top">
    <span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
</a>

{{--todo: dodoać cookies--}}
{{--{include file="../common/cookies.tpl"}--}}
