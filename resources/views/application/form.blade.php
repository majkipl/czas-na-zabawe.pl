@extends('layouts.front')

@section('content')
    <section class="form" id="form">
        <div class="container">

            <div class="row">
                <div class="col-12 col-lg-8 offset-lg-2">
                    <form id="save" method="POST" action="{{ route('front.application.save') }}">
                        @csrf

                        <div class="row">
                            <div class="col-xs-12 text-center min-padding">
                                <h1 class="text-uppercase">formularz zgłoszeniowy</h1>
                                <p class="py-4">Wypełnij formularz, zarejestruj swoje zakupy i odbierz NAGRODĘ
                                    GWARANTOWANĄ! Dla pierwszych 2000 uczestników naszej promocji przygotowaliśmy
                                    vouchery do home&you o wartości 10 zł.</p>
                            </div>
                        </div>

                        <div class="row fieldset">
                            <div class="col-12 py-4">
                                <h4 class="text-uppercase">Dane uczestnika</h4>
                            </div>
                            <div class="col-12">
                                @component('components.forms.input.text', [
                                    'name' => 'firstname',
                                    'value' => '',
                                    'placeholder' => 'IMIĘ',
                                    'required' => true,
                                    'max' => 128,
                                    'error' => ''])
                                @endcomponent
                            </div>
                            <div class="col-12">
                                @component('components.forms.input.text', [
                                    'name' => 'lastname',
                                    'value' => '',
                                    'placeholder' => 'NAZWISKO',
                                    'required' => true,
                                    'max' => 128,
                                    'error' => ''])
                                @endcomponent
                            </div>
                            <div class="col-12 birthday-col">
                                @component('components.forms.input.text', [
                                    'name' => 'birthday',
                                    'value' => '',
                                    'placeholder' => 'DATA URODZENIA [DD-MM-YYYY]',
                                    'required' => true,
                                    'max' => 10,
                                    'error' => ''])
                                @endcomponent
                            </div>
                            <div class="col-12">
                                @component('components.forms.input.email', [
                                    'name' => 'email',
                                    'value' => '',
                                    'placeholder' => 'E-MAIL',
                                    'required' => true,
                                    'max' => 255,
                                    'error' => ''])
                                @endcomponent
                            </div>
                            <div class="col-12">
                                @component('components.forms.input.text', [
                                    'name' => 'product',
                                    'value' => '',
                                    'placeholder' => 'ZAKUPIONY PRODUKT',
                                    'required' => true,
                                    'max' => 128,
                                    'error' => ''])
                                @endcomponent
                            </div>
                            <div class="col-12">
                                @component('components.forms.input.text', [
                                    'name' => 'shop',
                                    'value' => '',
                                    'placeholder' => 'SKLEP',
                                    'required' => true,
                                    'max' => 128,
                                    'error' => ''])
                                @endcomponent
                            </div>
                            <div class="col-12">
                                @component('components.forms.select', [
                                    'name' => 'whence',
                                    'value' => '',
                                    'placeholder' => 'SKĄD WIESZ O AKCJI?',
                                    'required' => true,
                                    'error' => '',
                                    'items' => $whences])
                                @endcomponent
                            </div>
                        </div>

                        <div class="row fieldset">
                            <div class="col-12 col-md-6 offset-md-3">
                                @component('components.forms.input.file', [
                                    'name' => 'img_receipt',
                                    'required' => true,
                                    'error' => ''])
                                    WGRAJ ZDJĘCIE PARAGONU (max 4MB)
                                @endcomponent
                            </div>
                        </div>

                        @if(!$isEndContest)
                            <div class="row fieldset text-center">
                                <div class="col-12 py-4">
                                    <a href="#" class="i-want cta-button" id="i_want_more">chcę
                                        wygrać więcej</a>
                                </div>
                            </div>
                            <div class="hideOn">
                                <div class="row fieldset">
                                    <div class="col-12 py-4">
                                        <p>Uwolnij swoją kreatywność, pokaż, jak zabawnie może być razem i wygraj
                                            atrakcyjne nagrody!<br/>Dla 5 osób oraz ich najbliższych przygotowaliśmy
                                            pełen wrażeń weekend pod palmami w Tropical Islands!</p>
                                        <p>Dodatkowo czeka aż 12 Nagród Tygodnia – aparatów fotograficznych Instax Mini
                                            9. Jest o co walczyć!</p>
                                    </div>
                                    <div class="col-12 pb-4">
                                        <h4 class="text-uppercase">praca konkursowa</h4>
                                    </div>
                                    <div class="col-12">
                                        @component('components.forms.input.text', [
                                            'name' => 'title',
                                            'value' => '',
                                            'placeholder' => 'TYTUŁ (min. 5 i max. 128 znaków)',
                                            'required' => true,
                                            'max' => 128,
                                            'error' => ''])
                                        @endcomponent
                                    </div>

                                    <div class="col-12">
                                        @component('components.forms.textarea', [
                                        'name' => 'message',
                                        'value' => '',
                                        'placeholder' => 'OPIS (max. 500 znaków)',
                                        'required' => true,
                                        'max' => 500,
                                        'error' => ''])
                                        @endcomponent
                                    </div>
                                    <div class="col-12 col-md-6">
                                        @component('components.forms.input.file', [
                                            'name' => 'img_tip',
                                            'required' => true,
                                            'error' => ''])
                                            WGRAJ ZDJĘCIE (max 4MB)
                                        @endcomponent
                                    </div>
                                    <div class="col-12 col-md-6">
                                        @component('components.forms.input.text', [
                                            'name' => 'video_url',
                                            'value' => '',
                                            'placeholder' => 'Link do filmu Vimeo lub YouTube',
                                            'required' => true,
                                            'max' => 128,
                                            'error' => ''])
                                        @endcomponent
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="row fieldset">
                            <div class="col-12">
                                @component('components.forms.input.checkbox', [
                                    'name' => 'legal_1',
                                    'required' => true,
                                    'error' => ''
                                ])
                                    Oświadczam, że zapoznałam/em się i akceptuję regulamin.
                                @endcomponent
                            </div>
                            <div class="col-12">
                                @component('components.forms.input.checkbox', [
                                    'name' => 'legal_2',
                                    'required' => true,
                                    'error' => ''
                                ])
                                    Oświadczam, że zapoznałam/em się i akceptuję Politykę Prywatności.
                                @endcomponent
                            </div>
                            <div class="col-12">
                                @component('components.forms.input.checkbox', [
                                    'name' => 'legal_3',
                                    'required' => true,
                                    'error' => ''
                                ])
                                    Wyrażam zgodę na przetwarzanie moich danych osobowych w celu realizacji obowiązków
                                    wynikających z organizacji i przeprowadzenia akcji „Czas na zabawę” przez Highlite
                                    Bielecka, Jellinek Spółka Jawna z siedzibą we Wrocławiu, przy ul. Pomorskiej 55/2.
                                @endcomponent
                            </div>
                            <div class="col-12">
                                @component('components.forms.input.checkbox', [
                                    'name' => 'legal_4',
                                    'required' => false,
                                    'error' => ''
                                ])
                                    Wyrażam zgodę na przetwarzanie moich danych osobowych: imienia, nazwiska, adresu
                                    e-mail w celach marketingowych przez Spectrum Brands Polska Sp. z o.o. z siedzibą w
                                    Warszawie, przy ul. Bitwy Warszawskiej 1920 r. 7a.
                                @endcomponent
                            </div>
                        </div>

                        <div class="row fieldset">
                            <div class="col-12 text-center py-5">
                                <input type="hidden" name="i_want" id="i_want" class="input"/>
                                <a href="#" class="cta-button submit">
                                    <span>WYŚLIJ ZGŁOSZENIE</span>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
