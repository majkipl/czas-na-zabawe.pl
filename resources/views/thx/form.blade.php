@extends('layouts.front')

@section('content')
    <section class="thx" id="thx">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-10 offset-lg-1 text-center thx-container py-5">
                    <img src="{{ asset('images/thx-form-compressor.png') }}" alt="img" class="thx-img my-5"/>

                    <h1 class="text-uppercase pb-5">Dziękujemy za zgłoszenie</h1>

                    <p>Na Twój adres e-mail wysłaliśmy właśnie prośbę o weryfikację adresu i potwierdzenie
                        zgłoszenia.<br/>Sprawdź swoją skrzynkę i wróć do nas poprzez podany w wiadomości link. Chociaż
                        tego nie lubimy, czasami wpadamy do SPAMu – sprawdź również tę zakładkę. Jeżeli mail
                        weryfikacyjny do Ciebie nie dotarł, napisz do nas wiadomość. </p>

                    <a href="{{ route('front.home') }}" class="cta-button mt-5"><span>STRONA GŁÓWNA</span></a>
                </div>
            </div>
        </div>
    </section>
@endsection
