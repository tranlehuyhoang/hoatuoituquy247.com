<!DOCTYPE html>
@php
    $settings = App\Models\Setting::first(); // Truy vấn model Settings
@endphp
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google" content="notranslate">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:url" content="{{ request()->fullUrl() }}">
    <meta name="twitter:url" content="{{ request()->fullUrl() }}">
    <meta property="og:image" content="/assets/wp-content/uploads/2020/03/default-website-banner.jpg.webp">
    <meta name="google-site-verification" content="W1Wf5_b9Yoc5PaKmRkfDJB0bzRUGDkcn2rDUhja0skU" />
    <link rel="shortcut icon" href="/assets/logo/Asset 6.png" type="image/png">
    <meta name="description"
        content="Hoa Tươi Tứ Quý là shop hoa tươi hỗ trợ đặt hoa online, giao hoa tận nơi miễn phí vào các dịp: Hoa sinh nhật, Hoa khai trương, hoa chia buồn đám tang,...">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @livewireStyles
</head>

<body>

    {{ $slot }}

    @livewireScripts
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/assets_client/frontend/common/js/slick.min.js?v=1721231848" defer></script>
    <x-livewire-alert::scripts />

</body>
<div id="w2w-widget-flyout" class="w2w-pos-fixed w2w-pinkBg">
    <div id="button-contact-vr" class="pos-right">
        <div id="gom-all-in-one">
            <!-- v3 -->

            <!-- tiktok -->
            <!-- end tiktok -->

            <!-- youtube -->
            <!-- end youtube -->




            <!-- fanpage -->
            <div id="fanpage-vr" class="button-contact">
                <div class="phone-vr">
                    <div class="phone-vr-circle-fill"></div>
                    <div class="phone-vr-img-circle">
                        <a target="_blank" href="https://www.messenger.com/t/488146577715033">
                            <img alt="Facebook"
                                src="/fb-messenger.svg" />
                        </a>
                    </div>
                </div>
            </div>
            <!-- end fanpage -->

            <!-- zalo -->
            <div id="zalo-vr" class="button-contact">
                <div class="phone-vr">
                    <div class="phone-vr-circle-fill"></div>
                    <div class="phone-vr-img-circle">
                        <a target="_blank" href="https://zalo.me/0853114114">
                            <img alt="zalo"
                                src="/icon-zalo.png" />
                        </a>
                    </div>
                </div>
            </div>
            <!-- end zalo -->



            <!-- Phone -->
            <div id="phone-vr" class="button-contact">
                <div class="phone-vr">
                    <div class="phone-vr-circle-fill"></div>
                    <div class="phone-vr-img-circle">
                        <a target="_blank" href="tel:+84853114114 ">
                            <img alt="Phone"
                                src="/phone.png">
                        </a>
                    </div>
                </div>
            </div>
        </div><!-- end v3 class gom-all-in-one -->

    </div>
</div>
<style>
    #w2w-widget-flyout.w2w-pos-fixed {
    position: fixed;
    z-index: 999;
}
#w2w-widget-flyout {
    bottom: 50px;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    /* box-shadow: 0 5px 5px rgba(0,0,0,.1); */
    cursor: pointer;
    right: 50px;
    font-family: -apple-system,BlinkMacSystemFont,segoe ui,Roboto,helvetica neue,Arial,noto sans,sans-serif,apple color emoji,segoe ui emoji,segoe ui symbol,noto color emoji;
}
#button-contact-vr {
    position: fixed;
    bottom: 0;
    z-index: 99999;
    left: 10px;
}
.pos-right {
    left: unset !important;
    right: 15px;
}
#w2w-widget-flyout {
    bottom: 50px;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    /* box-shadow: 0 5px 5px rgba(0,0,0,.1); */
    cursor: pointer;
    right: 50px;
    font-family: -apple-system,BlinkMacSystemFont,segoe ui,Roboto,helvetica neue,Arial,noto sans,sans-serif,apple color emoji,segoe ui emoji,segoe ui symbol,noto color emoji;
}
#gom-all-in-one .button-contact {
    transition: 1.6s all;
    -moz-transition: 1.6s all;
    -webkit-transition: 1.6s all;
}
#button-contact-vr .button-contact {
    position: relative;
    margin-top: -5px;
}
#button-contact-vr .button-contact .phone-vr {
    position: relative;
    visibility: visible;
    background-color: transparent;
    width: 90px;
    height: 90px;
    cursor: pointer;
    z-index: 11;
    -webkit-backface-visibility: hidden;
    -webkit-transform: translateZ(0);
    transition: visibility .5s;
    left: 0;
    bottom: 0;
    display: block;
}
#w2w-widget-flyout {
    bottom: 50px;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    /* box-shadow: 0 5px 5px rgba(0,0,0,.1); */
    cursor: pointer;
    right: 50px;
    font-family: -apple-system,BlinkMacSystemFont,segoe ui,Roboto,helvetica neue,Arial,noto sans,sans-serif,apple color emoji,segoe ui emoji,segoe ui symbol,noto color emoji;
}
#fanpage-vr .phone-vr-circle-fill {
    box-shadow: 0 0 0 0 rgb(24 119 242 / 65%);
    background-color: rgb(24 119 242 / 70%);
}
.phone-vr-circle-fill {
    width: 65px;
    height: 65px;
    top: 12px;
    left: 12px;
    position: absolute;
    box-shadow: 0 0 0 0 #c31d1d;
    background-color: rgba(230, 8, 8, 0.7);
    border-radius: 50%;
    border: 2px solid transparent;
    -webkit-animation: phone-vr-circle-fill 2.3s infinite ease-in-out;
    animation: phone-vr-circle-fill 2.3s infinite ease-in-out;
    transition: all .5s;
    -webkit-transform-origin: 50% 50%;
    -ms-transform-origin: 50% 50%;
    transform-origin: 50% 50%;
    -webkit-animuiion: zoom 1.3s infinite;
    animation: zoom 1.3s infinite;
}
@-webkit-keyframes zoom{0%{transform:scale(.9)}70%{transform:scale(1);box-shadow:0 0 0 15px transparent}100%{transform:scale(.9);box-shadow:0 0 0 0 transparent}}@keyframes zoom{0%{transform:scale(.9)}70%{transform:scale(1);box-shadow:0 0 0 15px transparent}100%{transform:scale(.9);box-shadow:0 0 0 0 transparent}}
.phone-bar a {
    position: absolute;
    margin-top: -65px;
    left: 30px;
    z-index: -1;
    color: #fff;
    font-size: 16px;
    padding: 7px 15px 7px 50px;
    border-radius: 100px;
    white-space: nowrap;
}
#fanpage-vr .phone-vr-img-circle {
    background-color: #1877f2;
}
.phone-vr-img-circle {
    background-color: #e60808;
    width: 40px;
    height: 40px;
    line-height: 40px;
    top: 25px;
    left: 25px;
    position: absolute;
    border-radius: 50%;
    overflow: hidden;
    display: flex;
    justify-content: center;
    -webkit-animation: phonering-alo-circle-img-anim 1s infinite ease-in-out;
    animation: phone-vr-circle-fill 1s infinite ease-in-out;
}
#button-contact-vr .button-contact .phone-vr {
    position: relative;
    visibility: visible;
    background-color: transparent;
    width: 90px;
    height: 90px;
    cursor: pointer;
    z-index: 11;
    -webkit-backface-visibility: hidden;
    -webkit-transform: translateZ(0);
    transition: visibility .5s;
    left: 0;
    bottom: 0;
    display: block;
}
#w2w-widget-flyout {
    bottom: 50px;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    /* box-shadow: 0 5px 5px rgba(0,0,0,.1); */
    cursor: pointer;
    right: 50px;
    font-family: -apple-system,BlinkMacSystemFont,segoe ui,Roboto,helvetica neue,Arial,noto sans,sans-serif,apple color emoji,segoe ui emoji,segoe ui symbol,noto color emoji;
}
@-webkit-keyframes phone-vr-circle-fill {
  0% {-webkit-transform: rotate(0) scale(1) skew(1deg);  }
  10% {-webkit-transform: rotate(-25deg) scale(1) skew(1deg);}
  20% {-webkit-transform: rotate(25deg) scale(1) skew(1deg);}
  30% {-webkit-transform: rotate(-25deg) scale(1) skew(1deg);}
  40% {-webkit-transform: rotate(25deg) scale(1) skew(1deg);}
  50% {-webkit-transform: rotate(0) scale(1) skew(1deg);}
  100% {-webkit-transform: rotate(0) scale(1) skew(1deg);}
}
@-webkit-keyframes zoom{0%{transform:scale(.9)}70%{transform:scale(1);box-shadow:0 0 0 15px transparent}100%{transform:scale(.9);box-shadow:0 0 0 0 transparent}}@keyframes zoom{0%{transform:scale(.9)}70%{transform:scale(1);box-shadow:0 0 0 15px transparent}100%{transform:scale(.9);box-shadow:0 0 0 0 transparent}}
.phone-bar a {
    position: absolute;
    margin-top: -65px;
    left: 30px;
    z-index: -1;
    color: #fff;
    font-size: 16px;
    padding: 7px 15px 7px 50px;
    border-radius: 100px;
    white-space: nowrap;
}
.phone-vr-img-circle a {
    display: block;
    line-height: 37px;
}
#fanpage-vr img {
    max-width: 35px;
    max-height: 35px;
}
.phone-vr-img-circle img {
    max-height: 25px;
    max-width: 27px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    -moz-transform: translate(-50%,-50%);
    -webkit-transform: translate(-50%,-50%);
    -o-transform: translate(-50%,-50%);
}
#zalo-vr .phone-vr-circle-fill {
    box-shadow: 0 0 0 0 #2196F3;
    background-color: rgba(33, 150, 243, 0.7);
}
#zalo-vr .phone-vr-img-circle {
    background-color: #2196F3;
}
</style>
</html>
