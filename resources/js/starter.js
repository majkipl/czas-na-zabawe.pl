import $ from "jquery";
import AOS from 'aos';
import moment from 'moment';

(function ($) {
    $.fn.matchMaxHeight = function () {
        var items = $(this);
        $(items).attr('style', '');
        $(items).css({});
        var max = 0;
        for (var i = 0; i < items.length; i++) {
            max = max < $(items[i]).height() ?
                $(items[i]).height() : max;

        }
        $(items).css({'display': 'block', 'height': '' + max + 'px'});
    }
})(jQuery);

$(window).on("load", () => {
    starter.main.init();
    starter.main.resize();
    starter.main.autoscroll();
    starter.effects.hideLoader();
});

$(window).on("resize", () => {
    starter.main.resize();
});

$(window).scroll(() => {
    starter.main.scroll();
    starter.main.menu_light();
});

const starter = {
    _var: {
        owl_products: null,
        owl_baners: null,
        owl_popup: null,
        window_is_load: false,
        error: []
    },

    main: {
        init: function () {
            starter.main.onClick();
            starter.main.onChange();
            starter.main.onSubmit();
            starter.main.owl();
            starter.main.selectbox();

            starter.datepicker.init();

            AOS.init();
        },
        resize: function () {
            starter.effects.matchMaxHeight();
        },
        onClick: function () {
            $(document).on('click', '#baner .steps .step', function () {
                starter._var.owl_baners.trigger('to.owl.carousel', [$(this).attr('data-s'), 500]);
                return false;
            });

            $(document).on('click', '#products .owl-carousel-prev', function () {
                starter._var.owl_products.trigger('prev.owl.carousel');
                return false;
            });

            $(document).on('click', '#products .owl-carousel-next', function () {
                starter._var.owl_products.trigger('next.owl.carousel');
                return false;
            });

            $(document).on('click', '#products .item .text', function () {
                window.open($(this).attr('data-url'), '_blank').focus();
                return false;
            });

            $(document).on('click', 'a.popup-open', function () {
                const popup = $('section#popup_' + $(this).data('popup'));
                popup.addClass('popup-show').fadeIn();

                const navElement = [
                    '<img src="/images/parrow.png" alt="prev" class="nav-prev-img" />',
                    '<img src="/images/parrow.png" alt="next" class="nav-next-img" />'
                ];

                if ($(".popup .owl-carousel").length > 0) {
                    starter._var.owl_popup = $(".popup .owl-carousel").owlCarousel({
                        loop: true,
                        margin: 0,
                        nav: true,
                        navText: navElement,
                        dots: false,
                        items: 1,
                        slideBy: 1,
                        autoplay: true,
                        autoplayTimeout: 9000,
                    });
                }

                starter.effects.set_scroll_container_popup(popup.find('.popup-scroll'));

                starter.effects.disableScrolling();

                return false;
            });

            $(document).on('click', 'a.popup-close, a.popup-back', function () {
                var popup = $(this).parents('section');

                popup.removeClass('popup-show').fadeOut();

                starter.effects.enableScrolling();

                return false;
            });

            $(document).on('click', '.scroll-to-top', function () {
                const offset = Math.abs($('#top').position().top);
                $('html, body').animate({scrollTop: offset}, 1000);

                return false;
            });

            $(document).on('click', '#i_want_more', function () {
                if ($(this).hasClass("is_active")) {
                    $(this).removeClass('is_active');
                    $('#form .hideOn').fadeOut(500);
                    $('#i_want').val('');
                } else {
                    $(this).addClass('is_active');
                    $('#form .hideOn').fadeIn(500);
                    $('#i_want').val('yes');
                }

                return false;
            });

            $(document).on("click", "button.button-uploads", function () {
                $(this).prev().find("input[type=file]").trigger("click");
            });

            $(document).on('click', '#form .submit', function () {
                $('#form form#save').submit();

                return false;
            });

            $(document).on('click', '#contact a.send', function () {
                $(this).closest('form').submit();
                return false;
            });
        },
        onChange: function () {
            $(document).on('change', '.input, .textarea, .checkbox, .file', function () {
                const item = $(this);
                const value = $(this).val().trim();
                const name = $(this).attr('name');
                const iWant = $('#i_want').val() ? 1 : 0;

                if (item.hasClass('upload-file')) {
                    const fileUpload = item[0].files[0];
                    const fieldId = item.attr('id');

                    const errorDiv = $(`.error-${fieldId}`);

                    errorDiv.text('');

                    if (fileUpload) {
                        if (fileUpload.size <= 4 * 1024 * 1024) {
                            const extension = fileUpload.name.split('.').pop().toLowerCase();
                            if (['jpg', 'jpeg', 'png'].indexOf(extension) !== -1) {
                                let reader = new FileReader();
                                reader.onload = function (event) {
                                    $(`#${fieldId}_thumb`).attr('src', event.target.result).parent().removeClass('hidden').next().addClass('hidden');
                                }
                                reader.readAsDataURL(fileUpload);
                            }
                        }
                    }
                }

                const valid = () => {
                    switch (name) {
                        case 'name':
                            return starter.main.validator.isName(value, 'Imię i nazwisko');
                        case 'firstname':
                            return starter.main.validator.isName(value, 'Imię');
                        case 'lastname':
                            return starter.main.validator.isName(value, 'Nazwisko');
                        case 'email':
                            return starter.main.validator.isEmail(value, 'Adres e-mail');
                        case 'product':
                            return starter.main.validator.isName(value, 'Zakupiony produkt');
                        case 'shop':
                            return starter.main.validator.isName(value, 'Rodzaj sklepu');
                        case 'whence':
                            return starter.main.validator.isWhere(value, 'Skąd dowiedziałeś się o promocji?');
                        case 'legal_1':
                            return starter.main.validator.isLegal(item);
                        case 'legal_2':
                            return starter.main.validator.isLegal(item);
                        case 'legal_3':
                            return starter.main.validator.isLegal(item);
                        case 'legal_5':
                            return starter.main.validator.isLegal(item);
                        case 'title':
                            return iWant ? starter.main.validator.isName(value, 'Tytuł zgłoszenia') : true;
                        case 'message':
                            return iWant ? starter.main.validator.isMessage(value, 'Wiadomość') : true;
                        case 'video_url':
                            return iWant ? starter.main.validator.isVideoUrl(value, 'Link do filmu') : true;
                        case 'img_tip':
                            return iWant ? starter.main.validator.isImgTip(item, 'Zdjęcie porady') : true;
                        case 'img_receipt':
                            return starter.main.validator.isFile(item, 'Zdjęcie paragonu');
                        case 'contact_message':
                            return starter.main.validator.isMessage(value, 'Wiadomość');
                        default:
                            return true;
                    }
                }

                if (valid() !== true) {
                    $(`.error-${name}`).text(valid());
                    starter._var.error[name] = valid();
                } else {
                    $(`.error-${name}`).text('');
                    delete starter._var.error[name];
                }
            });
        },

        onSubmit: function () {
            $(document).on('submit', '#formContact form', function () {
                $('.input, .textarea, .checkbox, .file').trigger('change');

                if (Object.keys(starter._var.error).length === 0) {
                    const fields = starter.getFields($(this).closest('form'));
                    const url = $(this).closest('form').attr('action');
                    const formData = new FormData();

                    for (const field in fields) {
                        formData.append(field, fields[field]);
                    }

                    axios({
                        method: 'post',
                        url: url,
                        headers: {
                            'content-type': 'multipart/form-data',
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: formData,
                    }).then(function (response) {
                        $('#contact h3').html(response.data.results.message);
                        $('#contact .form').hide();
                    }).catch(function (error) {
                        $(`.error-post`).text('');

                        if (error.response) {
                            Object.keys(error.response.data.errors).map((item) => {
                                $(`.error-${item}`).text(error.response.data.errors[item][0]);
                            });
                        } else if (error.request) {
                            console.log(error.request);
                        } else {
                            console.log('Error', error.message);
                        }
                    });
                } else {
                    $('.error-post').text('');
                    for (let key in starter._var.error) {
                        if (starter._var.error.hasOwnProperty(key)) {
                            let value = starter._var.error[key];
                            $('.error-' + key).text(value);
                        }
                    }
                }




                return false;
            });

            $(document).on('submit', '#form form', function () {
                $('.input, .textarea, .checkbox, .file').trigger('change');

                if (Object.keys(starter._var.error).length === 0) {
                    const fields = starter.getFields($(this).closest('form'));
                    const url = $(this).closest('form').attr('action');
                    const formData = new FormData();

                    for (const field in fields) {
                        formData.append(field, fields[field]);
                    }

                    axios({
                        method: 'post',
                        url: url,
                        headers: {
                            'content-type': 'multipart/form-data',
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: formData,
                    }).then(function (response) {
                        window.location = response.data.results.url;
                    }).catch(function (error) {
                        $(`.error-post`).text('');
                        if (error.response) {
                            Object.keys(error.response.data.errors).map((item) => {
                                $(`.error-${item}`).text(error.response.data.errors[item][0]);
                            });
                        } else if (error.request) {
                            console.log(error.request);
                        } else {
                            console.log('Error', error.message);
                        }
                    });
                } else {
                    $('.error-post').text('');
                    for (let key in starter._var.error) {
                        if (starter._var.error.hasOwnProperty(key)) {
                            let value = starter._var.error[key];
                            $('.error-' + key).text(value);
                        }
                    }
                }

                return false;
            });
        },
        scroll: function () {
            if ($(window).scrollTop() > 40) {
                $('section#top').addClass('small');
                $('.scroll-to-top').addClass('show-me');
            } else {
                $('section#top').removeClass('small');
                $('.scroll-to-top').removeClass('show-me');
            }
        },
        owl: function () {
            if ($("#products .owl-carousel").length > 0) {
                starter._var.owl_products = $("#products .owl-carousel").owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: false,
                    dots: false,
                    responsive: {
                        0: {
                            items: 1,
                            slideBy: 1,
                        },
                        768: {
                            items: 2,
                            slideBy: 1,
                        },
                        992: {
                            items: 3,
                            slideBy: 1,
                        },
                        1200: {
                            items: 3,
                            slideBy: 1,
                        }
                    }
                });
            }
            if ($("#baner .owl-carousel").length > 0) {
                starter._var.owl_baners = $("#baner .owl-carousel").owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: false,
                    dots: false,
                    items: 1,
                    slideBy: 1,
                    autoplay: true,
                    autoplayTimeout: 9000,
                });

                starter._var.owl_baners.on('changed.owl.carousel', function (e) {
                    $('#baner .steps .step').removeClass('active');
                    $('#baner .steps .step[data-s=' + (e.property.value - 2) + ']').addClass('active');
                });
            }
        },
        autoscroll: function () {
            let attri = undefined;

            switch (window.location.pathname) {
                case '/nagrody':
                    attri = '#prizes';
                    break;
                case '/wez-udzial':
                    attri = '#take';
                    break;
                case '/zgloszenia':
                    attri = '#applications';
                    break;
                case '/zgloszenia-tygodnia':
                    attri = '#week';
                    break;
                case '/nasze-produkty':
                    attri = '#products';
                    break;
                case '/kontakt':
                    attri = '#contact';
                    break;
                case '/poradnik':
                    attri = '#tips';
                    break;
                case '/produkty':
                    attri = '#products';

            }

            if ((attri !== undefined) && ($(attri).length > 0)) {
                const offset = Math.abs($(attri).position().top) - $('section#top').height() + 38;

                $('html, body').animate({scrollTop: offset}, 1000);
            }

            starter._var.window_is_load = true;
        },
        menu_light: function () {
            $('.navbar ul.navbar-nav li').removeClass('active');
            if (starter._var.window_is_load) {
                starter.main.menu_light_section('#baner');
                starter.main.menu_light_section('#prizes');
                starter.main.menu_light_section('#take');
                starter.main.menu_light_section('#statute');
                starter.main.menu_light_section('#week');
                starter.main.menu_light_section('#tips');
                starter.main.menu_light_section('#applications');
                starter.main.menu_light_section('#products');
                starter.main.menu_light_section('#contact');
            }
        },
        menu_light_section: function (section) {
            let height = $(window).scrollTop() + $(window).height() / 2;
            let pathname = '/';

            if ($(section).length > 0) {
                if (height > $(section).position().top && height < $(section).position().top + $(section).height()) {
                    if ($('.navbar ul.navbar-nav li a[data-href="' + section + '"]').length > 0) {
                        const ob = $('.navbar ul.navbar-nav li a[data-href="' + section + '"]');
                        ob.parent().addClass('active');
                        pathname = ob.attr("href");
                    }

                    event.preventDefault();
                    history.pushState(null, null, pathname);
                }
            }

        },
        selectbox: function () {
            const selectElement = $("#form select");
            if (selectElement.length > 0) {
                selectElement.selectbox({
                    onOpen: function (inst) {
                        $('select#where option').removeAttr('selected');
                        $('#sbHolder_' + inst.uid).addClass('focus');
                        console.log(inst);
                    },
                    onClose: function (inst) {
                        console.log('onClose');
                        $('#sbHolder_' + inst.uid).removeClass('focus');
                    },
                    effect: "slide"
                });
            }
        },

        validator: {
            isName: (value, name) => {
                if (value === "") {
                    return `Pole ${name} jest wymagane.`;
                } else if (value.length < 3 || value.length > 128) {
                    return `Pole ${name} musi mieć od 3 do 128 znaków.`;
                } else if (!/^[\p{L}\s-]+$/u.test(value)) {
                    return `Pole ${name} może zawierać tylko litery.`;
                } else {
                    return true;
                }
            },
            isEmail: (value, name) => {
                if (value === "") {
                    return `Pole ${name} jest wymagane.`;
                } else if (value.length > 255) {
                    return `Pole ${name} może mieć maksymalnie 255 znaków.`;
                } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) {
                    return 'Wprowadź poprawny adres email.';
                } else {
                    return true;
                }
            },
            isWhere: (value, name) => {
                if (value === "") {
                    return `Pole ${name} jest wymagane.`;
                } else if (isNaN(value) || parseInt(value) < 1 || parseInt(value) > 7) {
                    return 'Wybierz opcje.';
                } else {
                    return true;
                }
            },
            isLegal: (item) => {
                if (item.val() === "") {
                    return `Pole jest wymagane.`;
                } else if (!item.prop('checked')) {
                    return `Pole jest wymagane.`;
                } else {
                    return true;
                }
            },
            isMessage: (value, name) => {
                if (value === "") {
                    return `Pole ${name} jest wymagane.`;
                } else if (value.length < 3 || value.length > 4096) {
                    return `Pole ${name} musi mieć od 3 do 4096 znaków.`;
                } else {
                    return true;
                }
            },
            isVideoUrl: (value, name) => {
                const urlPattern = /^(https?:\/\/)?(www\.)?(youtube\.com|vimeo\.com)\/(watch\?v=|video\/)?([a-zA-Z0-9_-]{11}|[0-9]{5,11})$/;

                const file = $('input#img_tip');

                if (file[0].files[0]) {
                    if (value === "") {
                        return true;
                    } else {
                        return `Twoje zgłoszenie może zawierać tekst ze zdjęciem lub tekst z video.`;
                    }
                } else {
                    if (value === "") {
                        return `Pole ${name} jest wymagane.`;
                    } else if (value.length > 255) {
                        return `Pole ${name} musi mieć max. 255 znaków.`;
                    } else if (!urlPattern.test(value)) {
                        return `Pole ${name} przyjmuje linki z Youtube lub Vimeo.`;
                    } else {
                        return true;
                    }
                }
            },
            isFile: (file, name) => {
                const extension = file[0]?.files[0]?.name.split('.').pop().toLowerCase();
                if (file[0].files.length === 0) {
                    return `Pole ${name} jest wymagane.`;
                } else if (file[0].files[0].size > 4 * 1024 * 1024) {
                    return `Rozmiar pliku nie może przekraczać 4 MB`;
                } else if (['jpg', 'jpeg', 'png'].indexOf(extension) === -1) {
                    return `Można wybrać tylko pliki graficzne JPG, JPEG lub PNG`;
                } else {
                    return true;
                }
            },
            isImgTip: (file, name) => {
                const extension = file[0]?.files[0]?.name.split('.').pop().toLowerCase();
                const videoUrl = $('#video_url');

                if (videoUrl.val() === "" && file[0].files.length === 0) {
                    return `Pole ${name} jest wymagane.`;
                } else if (videoUrl.val() !== "" && file[0].files.length !== 0) {
                    return `Twoje zgłoszenie może zawierać tekst ze zdjęciem lub tekst z video.`;
                } else if (file[0].files[0].size > 4 * 1024 * 1024) {
                    return `Rozmiar pliku nie może przekraczać 4 MB`;
                } else if (['jpg', 'jpeg', 'png'].indexOf(extension) === -1) {
                    return `Można wybrać tylko pliki graficzne JPG, JPEG lub PNG`;
                } else {
                    return true;
                }
            },
        },
    },

    getFields: function ($form) {
        const inputs = $form.find('.input');
        const textareas = $form.find('.textarea');
        const checkboxes = $form.find('.checkbox');
        const files = $form.find('.file');
        const fields = {};

        $.each(inputs, function (index, item) {
            fields[$(item).attr('name')] = $(item).val();
        });

        $.each(textareas, function (index, item) {
            fields[$(item).attr('name')] = $(item).val();
        });

        $.each(checkboxes, function (index, item) {
            if ($(item).prop('checked')) {
                fields[$(item).attr('name')] = $(item).val();
            }
        });

        $.each(files, function (index, item) {
            if (item.files[0]) {
                fields[$(item).attr('name')] = item.files[0];
            }
        })

        fields['_token'] = $form.find('input[name=_token]').val();

        return fields;
    },

    datepicker: {
        init: function () {
            if ($('input#birthday').length) {
                $('#birthday').datetimepicker({
                    format: 'DD-MM-YYYY',
                    inline: true,
                    locale: 'pl',
                    maxDate: moment().subtract(18, 'years')
                });
                $('input#firstname').focus();
            }
        }
    },

    effects: {
        hideLoader: function () {
            $('#loader').fadeOut();
        },
        popupContainerRow: function () {
            $('.popup-container-row').css({
                'height': $(window).height() - 40 + 'px'
            });
        },
        popupContainerRowCol: function () {
            $('.popup-container-row-col').matchMaxHeight();
        },
        set_scroll_container_popup: function (obj) {
            obj.mCustomScrollbar();
        },
        disableScrolling: function () {
            const x = window.scrollX;
            const y = window.scrollY;
            window.onscroll = function () {
                window.scrollTo(x, y);
            };
        },
        enableScrolling: function () {
            window.onscroll = function () {
            };
        },
        matchMaxHeight: function () {
            $('#products .item h4').matchMaxHeight();
            $('#products .item ul').matchMaxHeight();
        },
    }
}
