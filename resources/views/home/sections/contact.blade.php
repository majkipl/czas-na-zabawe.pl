<section class="contact py-4" id="contact">
    <div class="container">
        <div class="row text-center">
            <div class="col-12 my-4" data-aos="fade-up" data-aos-anchor-placement="center-bottom"
                 data-aos-duration="1000">
                <h2>KONTAKT</h2>
            </div>
        </div>
        <div class="row form text-center" id="formContact">
            <form class="form row" method="post" action="{{ route('front.contact.send') }}">
                @csrf
                <div class="col-12 col-sm-8 offset-sm-2 my-3" data-aos="fade-up"
                     data-aos-anchor-placement="center-bottom"
                     data-aos-duration="1000">
                    <h6 class="font-weight-normal">Masz pytania w związku z naszą akcją? Skorzystaj z formularza i
                        wyślij nam wiadomość!</h6>
                </div>
                <div class="col-12 col-sm-8 offset-sm-2 my-3" data-aos="fade-up"
                     data-aos-anchor-placement="center-bottom"
                     data-aos-duration="1000">
                    @component('components.forms.input.text', [
                        'name' => 'name',
                        'value' => '',
                        'placeholder' => 'Imię i nazwisko',
                        'required' => true,
                        'max' => 128,
                        'error' => ''
                    ])
                    @endcomponent
                </div>
                <div class="col-12 col-sm-8 offset-sm-2 my-3" data-aos="fade-up"
                     data-aos-anchor-placement="center-bottom"
                     data-aos-duration="1000">
                    @component('components.forms.input.email', [
                            'name' => 'email',
                            'value' => '',
                            'placeholder' => 'E-MAIL',
                            'required' => true,
                            'max' => 255,
                            'error' => ''
                    ])
                    @endcomponent
                </div>
                <div class="col-12 col-sm-8 offset-sm-2 my-3" data-aos="fade-up"
                     data-aos-anchor-placement="center-bottom"
                     data-aos-duration="1000">
                    @component('components.forms.textarea', [
                        'name' => 'contact_message',
                        'value' => '',
                        'placeholder' => 'Treść wiadomości',
                        'required' => true,
                        'max' => 1024,
                        'error' => ''
                    ])
                    @endcomponent
                </div>
                <div class="col-12 col-sm-8 offset-sm-2 my-3" data-aos="fade-up"
                     data-aos-anchor-placement="center-bottom"
                     data-aos-duration="1000">
                    @component('components.forms.input.checkbox', [
                        'name' => 'legal_5',
                        'required' => true,
                        'error' => ''
                    ])
                        Wyrażam zgodę na przetwarzanie moich danych osobowych zawartych w wypełnionym przeze mnie
                        formularzu kontaktowym, dla potrzeb niezbędnych do odpowiedzi - zgodnie z Ustawą z dnia 29
                        sierpnia 1997 r. o ochronie danych osobowych (Dz. U. z 2002 r. Nr 101, poz. 926 z późn. zm.).
                    @endcomponent
                </div>
                <div class="col-12 col-sm-8 offset-sm-2 my-3" data-aos="fade-up"
                     data-aos-anchor-placement="center-bottom"
                     data-aos-duration="1000">
                    <a href="#" class="send cta-button">wyślij</a>
                </div>
            </form>
        </div>
        <div class="row text-center">
            <div class="col-12 my-4">
                <h3></h3>
            </div>
        </div>
    </div>
</section>
