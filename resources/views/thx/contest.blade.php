@extends('layouts.front')

@section('content')
    <section class="thx" id="thx">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-10 offset-lg-1 text-center thx-container py-5">
                    <img src="{{ asset('images/thx-mail-compressor.png') }}" alt="img" class="thx-img my-5"/>

                    <h1 class="text-uppercase pb-5">Potwierdzenie zgłoszenia <br/>do promocji i konkursu</h1>

                    <h6 class="pb-4">Dziękujemy Ci za potwierdzenie zgłoszenia!</h6>

                    <p>Nasz Moderator już niedługo sprawdzi poprawność Twojego zgłoszenia. Jeżeli dopatrzy się jakiś
                        braków – skontaktujemy się z Tobą. <strong>Voucher do home&you zostanie wysłany na podany przez
                            Ciebie adres e-mail w ciągu 14 dni roboczych od daty wpłynięcia kompletnego
                            zgłoszenia.</strong> <br/>Ale nie przejmuj się, postaramy się skrócić ten czas do minimum!</p>

                    <p>Twoje zgłoszenie zostanie opublikowane na naszej stronie po akceptacji przez Moderatora. <br/>Trzymamy
                        kciuki, aby zaproszenie do Tropical Islands trafiło do Ciebie i Twoich najbliższych!</p>

                    <p><strong>Wyniki konkursu pojawią się na naszej stronie 18 stycznia 2019 r.</strong></p>

                    <p class="highlighted">Nie zapomnij też odwiedzić naszej strony w każdy czwartek - nagroda tygodnia:
                        aparat Instax Mini 9 może trafić w Twoje ręce!</p>

                    <a href="{{ route('front.home') }}" class="cta-button mt-5"><span>STRONA GŁÓWNA</span></a>
                </div>
            </div>
        </div>
    </section>
@endsection
