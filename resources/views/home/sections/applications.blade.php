<section class="applications py-4" id="applications">
    <div class="container">
        <div class="row text-center">
            <div class="col-12 my-4" data-aos="fade-up" data-aos-anchor-placement="center-bottom"
                 data-aos-duration="1000">
                <h2>ZGŁOSZENIA</h2>
            </div>
        </div>
        <div class="row form text-center">
            <div class="col-12 col-sm-8 offset-sm-2 my-3" data-aos="fade-up" data-aos-anchor-placement="center-bottom"
                 data-aos-duration="1000">
                @if($isEndContest)
                    <h6 class="font-weight-normal">Dziękujemy wszystkim za zgłoszenia!</h6>
                @else
                    <h6 class="font-weight-normal">Wiemy, że nie ma nic lepszego niż czas spędzony z rodziną i
                        przyjaciółmi. Pokaż nam, jaki jest Twój patent na wspólne chwile pełne radości, śmiechu i dobrej
                        zabawy. Uwiecznij ten bezcenny czas i podziel się nim z innymi! Zawalcz o atrakcyjne nagrody
                        tygodnia – aparaty Instax Mini 9 i wygraj wyjazd do Tropical Islands! Czekamy na Twoje
                        zgłoszenie.</h6>
                @endif
            </div>
            <div class="col-12 col-sm-6 offset-sm-3 my-4 search" data-aos="fade-up"
                 data-aos-anchor-placement="center-bottom" data-aos-duration="1000">
                <input type="text" name="find" id="find" value="" placeholder="wyszukiwarka zgłoszeń"
                       autocomplete="off"/>
                <a href="#" class="submit"></a>
            </div>
            <div class="col-12 my-3 list" data-aos="fade-up" data-aos-anchor-placement="center-bottom"
                 data-aos-duration="1000">
                <div class="row items"></div>
            </div>
            <div class="col-12 text-center" data-aos="fade-up" data-aos-anchor-placement="center-bottom"
                 data-aos-duration="1000">
                <a href="#" id="getMoreItem" class="cta-button px-4">WIĘCEJ</a>
            </div>
        </div>
    </div>
</section>
