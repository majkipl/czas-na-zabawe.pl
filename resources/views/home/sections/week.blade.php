<section class="week py-4" id="week">
    <div class="container">
        <div class="row text-center">
            <div class="col-12 my-4" data-aos="fade-up" data-aos-anchor-placement="center-bottom"
                 data-aos-duration="1000">
                <h2>ZGŁOSZENIA TYGODNIA</h2>
            </div>
        </div>
        <div class="row form text-center">
            <div class="col-12 col-sm-8 offset-sm-2 my-3" data-aos="fade-up" data-aos-anchor-placement="center-bottom"
                 data-aos-duration="1000">
                @if($isEndContest)
                    <h6 class="font-weight-normal">Dziękujemy wszystkim za zgłoszenia!</h6>
                @else
                    <h6 class="font-weight-normal">Każdego tygodnia wybieramy autora najciekawszego zgłoszenia i
                        nagradzamy go wyjątkowym aparatem fotograficznym Instax Mini 9. Chcesz znaleźć się w gronie
                        najlepszych? Nie zwlekaj i weź udział w naszym konkursie!</h6>
                @endif
            </div>

            <div class="col-12 my-3 list" data-aos="fade-up" data-aos-anchor-placement="top-bottom"
                 data-aos-duration="1000">
                <div class="row row-eq-height items">
                    @if( count($weeks) > 0 )
                        @foreach($weeks as $week)
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 item">
{{--                                todo: zgłoszenia tygodnia--}}
                            </div>
                        @endforeach
                    @endif

{{--                    {foreach from=$wd key=key item=item}--}}
{{--                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 item">--}}
{{--                        {if $week[$key]|@count gt 0}--}}
{{--                            {if $week[$key].fotoimg}--}}
{{--                                {if $us->isSSL()}--}}
{{--                                    <a class="is-exist"--}}
{{--                                       style="background-image: url({$smarty.const.CANONICAL_URL_HTTPS}{$smarty.const.CSS_UP_DIR}/tip/{$week[$key].fotoimg});"--}}
{{--                                       href="/zgloszenie/id,{$week[$key].id}">--}}
{{--                                        <span>{$week[$key].firstname} {$week[$key].lastname}</span>--}}
{{--                                    </a>--}}
{{--                                {else}--}}
{{--                                    <a class="is-exist"--}}
{{--                                       style="background-image: url({$smarty.const.CANONICAL_URL}{$smarty.const.CSS_UP_DIR}/tip/{$week[$key].fotoimg});"--}}
{{--                                       href="/zgloszenie/id,{$week[$key].id}">--}}
{{--                                        <span>{$week[$key].firstname} {$week[$key].lastname}</span>--}}
{{--                                    </a>--}}
{{--                                {/if}--}}
{{--                            {else}--}}
{{--                                {if $week[0].video_type eq 1}--}}
{{--                                    <a class="is-exist"--}}
{{--                                       style="background-image: url(https://img.youtube.com/vi/{$week[$key].video_image_id}/default.jpg);"--}}
{{--                                       href="/zgloszenie/id,{$week[$key].id}">--}}
{{--                                        <span>{$week[$key].firstname} {$week[$key].lastname}</span>--}}
{{--                                    </a>--}}
{{--                                {/if}--}}
{{--                                {if $week[0].video_type eq 2}--}}
{{--                                    <a class="is-exist"--}}
{{--                                       style="background-image: url(https://i.vimeocdn.com/video/{$week[$key].video_image_id}_640.jpg);"--}}
{{--                                       href="/zgloszenie/id,{$week[$key].id}">--}}
{{--                                        <span>{$week[$key].firstname} {$week[$key].lastname}</span>--}}
{{--                                    </a>--}}
{{--                                {/if}--}}
{{--                                {if $week[0].video_type eq 3}--}}
{{--                                    <a class="is-exist"--}}
{{--                                       style="background-image: url(https://graph.facebook.com/{$week[$key].video_image_id}/picture);"--}}
{{--                                       href="/zgloszenie/id,{$week[$key].id}">--}}
{{--                                        <span>{$week[$key].firstname} {$week[$key].lastname}</span>--}}
{{--                                    </a>--}}
{{--                                {/if}--}}
{{--                            {/if}--}}
{{--                        {else}--}}
{{--                            <div class="c-table">--}}
{{--                                <div class="c-row">--}}
{{--                                    <div class="c-cell">{$item}</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        {/if}--}}
{{--                    </div>--}}
{{--                    {/foreach}--}}
                </div>
            </div>
        </div>
    </div>
</section>
