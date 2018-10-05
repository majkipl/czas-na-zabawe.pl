<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style>
        u + .body {
            line-height: 100% !important;
        }
    </style>
</head>
<body>
<table id="promotion" width="600" border="0" cellpadding="0" cellspacing="0"
       style="margin: 0 auto; font-family: Arial;">
    <tr>
        <td>
            <img id="promotion_01"
                 src="{{ asset('images/mail/mail-compressor.jpg') }}" width="600"
                 height="370" border="0" alt="Czas na zabawe" style="float: left;"/>
        </td>
    </tr>
    <tr>
        <td style="background-color: #ffffff; text-align: center;">
            <h2 style="color: #041442;font-size: 36px;text-transform: uppercase;font-weight: 700;margin-top: 50px;margin-bottom: 50px;">
                potwierdzenie udziału <br/>w promocji</h2>
        </td>
    </tr>
    <tr>
        <td style="background-color: #ffffff; text-align: center;">
            <p style="font-size: 18px;color: #041442;margin-top: 15px;margin-bottom: 30px;font-weight: 700;">Dziękujemy
                za udział w naszej promocji!</p>
        </td>
    </tr>
    <tr>
        <td style="background-color: #ffffff; text-align: center;">
            <p style="font-size: 16px;color: #041442; margin-top: 15px; margin-bottom: 50px;">Jesteś już blisko! Od
                otrzymania voucheru do home&you dzieli Cię tylko jeden krok! Potwierdź swoje zgłoszenie do promocji
                klikając w poniższy link:</p>
        </td>
    </tr>
    <tr>
        <td style="background-color: #ffffff; text-align: center;">
            <a href="{{ route('front.confirm.application', $details) }}"
               title="POTWIERDZAM ZGŁOSZENIE"
               style="background-color: #efc700;font-size: 24px;color: #041442;font-weight: 700;text-transform: uppercase;text-decoration: none;padding: 15px 20px;margin-bottom: 50px;display: inline-block; width: auto;">Potwierdź
                Zgłoszenie</a>
        </td>
    </tr>
    <tr>
        <td style="background-color: #ffffff; text-align: center;">
            <p style="font-size: 16px;color: #041442;margin-top: 15px;margin-bottom: 30px;font-weight: 700;">Voucher do
                home&you zostanie wysłany na podany przez Ciebie adres e-mail w ciągu 14 dni roboczych od daty
                wpłynięcia kompletnego zgłoszenia.</p>
        </td>
    </tr>
    <tr>
        <td style="background-color: #ffffff; text-align: center;">
            <p style="font-size: 16px;color: #041442;margin-top: 15px;margin-bottom: 30px;">Pozdrawiamy<br/>Zespół VARTA
            </p>
        </td>
    </tr>
</table>
</body>
</html>
