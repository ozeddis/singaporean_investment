<?php
  require "include/server.inc.php";
?>
<?php
  if(isset($_POST['login'])){
    $email = htmlentities(trim(mysqli_real_escape_string))
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Members Area Login - Avon Investment Services</title>

  <link rel="shortcut icon" type="image/x-icon" href="images/logo.png">

  <link rel="stylesheet" href="file/bootstrap4.css">

  <link rel="stylesheet" href="file/libraries.css">

  <link rel="stylesheet" href="file/base.css">

  <link rel="stylesheet" href="file/Avon%20Investment%20Services%20LTDFontsNew.php">

  <link rel="stylesheet" href="file/header.css">

  <link rel="stylesheet" href="file/components.css">

  <link rel="stylesheet" href="file/footer.css">

  <link rel="stylesheet" href="file/accountTables.css">

  <link rel="stylesheet" href="file/loyalty.css">

  <link rel="stylesheet" href="file/maintenance.css">

  <link rel="stylesheet" href="file/Avon%20Investment%20Services%20LTDCards.php">

  <link rel="stylesheet" href="file/liveEducation.css">

  <link rel="stylesheet" href="file/temp.css">



  <script src="file/1620834084807082.js" async=""></script><script async="" src="file/fbevents.js"></script><script async="" src="file/fbds.js"></script><script type="text/javascript" async="" src="file/uwt.js"></script><script type="text/javascript" async="" src="file/conversion_async.js"></script><script type="text/javascript" async="" src="file/analytics.js"></script><script async="" src="file/gtm.js"></script><script async="" src="file/5f02ecd861c3b80014ccf015.js"></script><script src="file/html5shiv.js"></script>

  <script src="file/respond.js"></script>




  <script src="file/sharethis.js"></script>





                      <script async="" src="file/aksb.js"></script><script>var w=window;if(w.performance||w.mozPerformance||w.msPerformance||w.webkitPerformance){var d=document;AKSB=w.AKSB||{},AKSB.q=AKSB.q||[],AKSB.mark=AKSB.mark||function(e,_){AKSB.q.push(["mark",e,_||(new Date).getTime()])},AKSB.measure=AKSB.measure||function(e,_,t){AKSB.q.push(["measure",e,_,t||(new Date).getTime()])},AKSB.done=AKSB.done||function(e){AKSB.q.push(["done",e])},AKSB.mark("firstbyte",(new Date).getTime()),AKSB.prof={custid:"562237",ustr:"cookiepresent",originlat:"0",clientrtt:"153",ghostip:"92.123.142.22",ipv6:false,pct:"10",clientip:"197.210.226.81",requestid:"30a582",region:"23789",protocol:"",blver:14,akM:"a",akN:"ae",akTT:"O",akTX:"1",akTI:"30a582",ai:"289017",ra:"true",pmgn:"Avon Investment Services LTD",pmgi:"",pmp:"",qc:""},function(e){var _=d.createElement("script");_.async="async",_.src=e;var t=d.getElementsByTagName("script"),t=t[t.length-1];t.parentNode.insertBefore(_,t)}(("https:"===d.location.protocol?"https:":"http:")+"//ds-aksb-a.akamaihd.net/aksb.min.js")}</script>
                      <script src="file/a.php"></script>
  			<!-- Smartsupp Live Chat script -->
  <script type="text/javascript">
  var _smartsupp = _smartsupp || {};
  _smartsupp.key = '6d27c1d4c898348960a64916f19d4ed30cdb00ef';
  window.smartsupp||(function(d) {
    var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
    s=d.getElementsByTagName('script')[0];c=d.createElement('script');
    c.type='text/javascript';c.charset='utf-8';c.async=true;
    c.src='../www.smartsuppchat.com/loaderd41d.js?';s.parentNode.insertBefore(c,s);
  })(document);
  </script>
					</head>

<body class="tmp-forgotPassword members_area Avon Investment Services LTDbz ">
                        <!-- Google Tag Manager -->
<noscript>
  <iframe src="http://www.googletagmanager.com/ns.php?id=GTM-MQZHW9" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            '../www.googletagmanager.com/gtm5445.php?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-MQZHW9');</script>
<!-- End Google Tag Manager -->


    <button type="button" class="scroll-top" style="display: none;"><i class="fa fa-angle-up"></i></button>

        <div class="page-wrapper">
        <div class="page-layout" style="min-height: 750px;">

                <div class="slidemenu slidemenu--right">

</div>

<header class="main-header">
    <div class="main-header__nav-row">
                <div class="container">
            <div class="d-flex align-items-center justify-content-center justify-content-lg-between">
                    <div class="text-nowrap">


    <a class="main-header__logo" href="index-2.php">
        <img src="images/logo.png" alt="Avon Investment Services LTD Logo" width="120" height="48">
    </a>

    </div>

                            </div>
        </div>

    </div>
</header>
            <section class="page-content">
                <div class="container">




    <h1 class="text-center capitalize">
        Login Area
    </h1>
    <p class="text-center mb-275">
                    Use your Email and password to log in to the Members Area.
            </p>




    <div class="row justify-content-center">
        <div class="col-sm-9 col-md-7 col-lg-5 col-xl-4">
            <form action="#" method="POST">

				                <div class="form-group has-feedback">
                    <label for="login_user" style="height: 20px;">
                                                    Email Address
                                            </label>
                    <input class="form-control" name="login_user" type="email" placeholder="Email Address" value="" autocomplete="off">
                    <div class="has-feedback__icon"></div>
                </div>
                <div class="form-group has-feedback">
                    <label for="login_pass" style="height: 20px;">
                        Password
                    </label>
                    <input class="form-control" name="login_pass" placeholder="Password" type="password" value="" autocomplete="off">
                    <div class="has-feedback__icon"></div>
                </div>
                <div class="row">
                    <div class="col-sm mb-125 mb-sm-0">
                        <a class="text--secondary" href="forget_password.php">
                            Forgot your password?
                        </a>
                    </div>
                    <div class="col-sm-auto">
                        <button class="btn btn--primary btn-block" type="submit" name="login">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <hr class="my-300">

            <div class="row justify-content-center">
            <div class="col-sm-10 col-md-8 col-xl-7">
                <h2 class="text-center">New to Avon Investment Services LTD?</h2>
                <div class="row">
                    <div class="col-lg-6">
                        <a href="register.php" class="btn btn--primary-o  btn-block">
                            OPEN AN ACCOUNT
                        </a>
                    </div>
                </div>
            </div>
        </div>
                    </div>
            </section>
 <footer class="main-footer">
            <div class="container">
            <div class="d-none d-lg-block">
                <div class="row justify-content-between align-items-center pt-325 pb-200 px-100">


            <div class="col-lg-8 col-xl-9">
            <div class="row justify-content-between align-items-center flex-nowrap">
                <div class="col-auto">
                    <img src="file/meta-quotes.png" alt="metaquotes" width="136" height="26">
                </div>
                <div class="col-auto">
                    <img src="file/verisign.png" alt="verisign" width="131" height="38">
                </div>
                <div class="col-auto">
                    <img src="file/unicef.png" alt="unicef" width="110" height="40">
                </div>
                <div class="col-auto">
                    <img src="file/investors-gold.png" alt="investors" width="189" height="39">
                </div>
            </div>
        </div>
        <div class="col-auto main-footer__socialicons">
        <p class="mb-0">
               <a href="#" rel="nofollow noopener noreferrer" target="_blank">
                    <a href="#">support@avonservicesltd.com</a>
                </a>

                                                    </p>
    </div>

            <!--<div class="col-auto main-footer__socialicons">
        <p class="mb-025">Follow us:</p>
        <p class="mb-0">
                                            <a href="goto/facebook" rel="nofollow noopener noreferrer" target="_blank">
                    <i class="fa fa-facebook"></i>
                </a>
                                    <a href="goto/twitter" rel="nofollow noopener noreferrer" target="_blank">
                        <i class="fa fa-twitter"></i>
                    </a>
                                <a href="goto/youtube" rel="nofollow noopener noreferrer" target="_blank">
                    <i class="fa fa-youtube-play"></i>
                </a>
                                    <a href="goto/instagram" rel="nofollow noopener noreferrer" target="_blank">
                        <i class="fa fa-instagram"></i>
                    </a>
                    <a href="https://www.linkedin.com/company-beta/2930073/" rel="nofollow noopener noreferrer" target="_blank">
                        <i class="fa fa-linkedin"></i>
                    </a>
                                                    </p>
    </div>-->
    </div>
                <hr>
            </div>
          </div>
</div>

<!-- New Modal code -END-->

<!-- Shows the cookie bar IF not all cookies are enabled -->



<script src="file/jquery.js"></script>

<script src="file/popper.js"></script>

<script src="file/bootstrap.js"></script>

<script src="file/datatables.js"></script>

<script src="file/slick.js"></script>

<script src="file/select2.js"></script>

<script src="file/main.js"></script>




<link rel="stylesheet" href="file/jquery-ui.css">



<script src="file/jquery_cookie.js"></script>
<script>
        var host = window.location.host,
            protocol = window.location.protocol,
            currentUrl = window.location.href,
            htmlLang = $('html').attr('lang'),
            domainsNoPrefix = ['en', 'id', 'ar'],
            domainName = ".Avon Investment Services LTD.com",
            hostName = "https://www.avoninvestmentsltd.com/";

        switch(htmlLang) {
            case 'ja':      htmlLang = 'jp'; break;
            case 'ms':      htmlLang = 'my'; break;
            case 'zh_CN':   htmlLang = 'cn'; break;
            case 'sv':      htmlLang = 'se'; break;
            case 'ko':      htmlLang = 'kr'; break;
            case 'hi':      htmlLang = 'in'; break;
            case 'cs':      htmlLang = 'cz'; break;
        }

        allActiveLangs = [
            'en',
            'jp',
            'my',
            'cn',
            'el',
            'hu',
            'ru',
            'id',
            'fr',
            'it',
            'se',
            'de',
            'pl',
            'ar',
            'es',
            'kr',
            'pt',
            'tr',
            'vn',
            'th',
            'ph',
            'nl',
            'cz',
            'fa',
            'bn',
            'tw'
        ];
    </script>

<script src="file/common.js"></script>


<script src="file/jquery-ui.js"></script>


<script src="file/forms.js"></script>


<script>
$(document).ready(function() {

    $(document).find(':submit').attr('disabled',false);

    var pleaseWait = "Please wait..";

    $.validator.setDefaults({ ignore: '' });
    $('.btn-group .btn.btn-default').on('change', function() {
        $(this).find('input').valid();
    });

    $.validator.addMethod("pattern2", function(value, element, params) {
        return this.optional(element) || params.test(value);
    }, $.validator.format(""));



        $('form#report').each(function () {

            $(this).validate({


                rules: {
                                            "report_period": {
                                                    required: true,
                                                 },
                                            "start_date": {
                                                    required: true,
                                                 },
                                            "end_date": {
                                                    required: true,
                                                 },
                                    },

                messages: {
                                            "report_period": {
                                                                                    required: "The\u0020\u003Cstrong\u003EReport\u0020period\u003C\/strong\u003E\u0020field\u0020is\u0020required",
                                                                             },
                                            "start_date": {
                                                                                    required: "The\u0020\u003Cstrong\u003EDate\u0020from\u003C\/strong\u003E\u0020field\u0020is\u0020required",
                                                                             },
                                            "end_date": {
                                                                                    required: "The\u0020\u003Cstrong\u003EDate\u0020to\u003C\/strong\u003E\u0020field\u0020is\u0020required",
                                                                             },
                                    },

                ignore: '.ignore_validation',

                highlight: function (element, errorClass, validClass) {
                    if ($(element).attr('type') == 'file') {
                        $(element)
                            .closest('.form-group')
                            .removeClass('has-success')
                            .addClass('has-error');
                    }
                    else {
                        if ($(element).attr('type') != 'radio' && $(element).attr('type') != 'hidden') {
                            $(element)
                                .closest('.form-group')
                                .removeClass('has-success')
                                .addClass('has-error');
                        } else if ($(element).attr('type') == 'radio') {
                            $(element)
                                .closest('.has-feedback')
                                .removeClass('has-success')
                                .addClass('has-error');
                        }
                    }
                },

                unhighlight: function (element, errorClass, validClass) {

                    if ($(element).attr('type') == 'file') {
                        $(element)
                            .closest('.form-group')
                            .removeClass('has-error')
                            .addClass('has-success');

                        if ($(element).hasClass('file_upload_group')) {
                            $('.file_upload_group').each(function() {
                                if (!$(this).val()) {
                                    $(this)
                                        .closest('.form-group')
                                        .removeClass('has-error')
                                        .removeClass('has-success')
                                        .end()
                                        .siblings('label.error').remove();
                                }
                            });
                        }
                    }
                    else {
                        if ($(element).attr('type') != 'radio' && $(element).attr('type') != 'file' && $(element).attr('type') != 'hidden' && !($(element).attr('type') == 'text' && $(element).siblings('.input-group-btn').length > 0)) {
                            $(element)
                                .closest('.form-group')
                                .removeClass('has-error')
                                .addClass('has-success');
                        } else if ($(element).attr('type') == 'radio') {
                            $(element)
                                .closest('form')
                                .removeClass('has-error')
                                .addClass('has-success');
                        }
                    }
                },

                errorPlacement: function (error, element) {
                    error.addClass('has-feedback__label');


                    if (element.siblings('.input-group-addon').length > 0) {
                        $(element)
                            .closest('.input-group')
                            .after(error);
                    }

                    else if (element.closest('.form-group').find('.btn-group').length > 0) {
                        $(element)
                            .closest('.form-group').find('.btn-group')
                            .after(error);
                    }

                    else if (element.attr('type') == 'file') {
                        $(element)
                            .closest('.input-group')
                            .after(error);
                    }

                    else if (element.attr('type') == 'checkbox') {
                        $(element)
                            .closest('.has-feedback')
                            .append(error);
                    }

                    else if (element.closest('.radio-group').find('.controls--radio').length > 0) {
                        $(element)
                            .closest('.radio-group')
                            .after(error);
                    }

                    else if ($(element).hasClass('select2-hidden-accessible')) {
                        error.insertAfter(element.parent().find('.has-feedback__icon'));
                    }

                    else if (element.is('textarea')) {
                        error.insertAfter(element);
                    }

                    else {
                        error.insertAfter(element.next('.has-feedback__icon'));
                    }
                },

                invalidHandler: function (form, validator) {
                    scrollToObject($(validator.errorList[0].element));
                },

                submitHandler: function (form) {
                                            $(form).find('button[type="submit"]').text(pleaseWait).attr('disabled', true);
                        form.submit();
                        return false;
                                    }
            });
        });

        $('form#pre-chat-form,#pre-chat-form-member').each(function () {

            $(this).validate({


                rules: {
                                            "first_name": {
                                                    required: true,
                                                 },
                                            "last_name": {
                                                    required: true,
                                                 },
                                            "email": {
                                                    required: true,
                                                    email: true,
                                                 },
                                            "user_id": {
                                                    required: true,
                                                    regex: /^[0-9]+$/,
                                                 },
                                            "preferred_language": {
                                                    required: true,
                                                 },
                                    },

                messages: {
                                            "first_name": {
                                                                                    required: "The\u0020\u003Cstrong\u003EFirst\u0020Name\u003A\u003C\/strong\u003E\u0020field\u0020is\u0020required",
                                                                             },
                                            "last_name": {
                                                                                    required: "The\u0020\u003Cstrong\u003ELast\u0020Name\u003A\u003C\/strong\u003E\u0020field\u0020is\u0020required",
                                                                             },
                                            "email": {
                                                                                    required: "The\u0020\u003Cstrong\u003EEmail\u003A\u003C\/strong\u003E\u0020field\u0020is\u0020required",
                                                                                                                email: "The\u0020E\u002Dmail\u0020Address\u0020field\u0020is\u0020not\u0020valid",
                                                                             },
                                            "user_id": {
                                                                                    required: "The\u0020\u003Cstrong\u003EUser\u0020ID\u003C\/strong\u003E\u0020field\u0020is\u0020required",
                                                                                                                regex: "The\u0020User\u0020ID\u0020field\u0020is\u0020not\u0020valid",
                                                                             },
                                            "preferred_language": {
                                                                                    required: "The\u0020\u003Cstrong\u003EPreferred\u0020Language\u003C\/strong\u003E\u0020field\u0020is\u0020required",
                                                                             },
                                    },

                ignore: '.ignore_validation',

                highlight: function (element, errorClass, validClass) {
                    if ($(element).attr('type') == 'file') {
                        $(element)
                            .closest('.form-group')
                            .removeClass('has-success')
                            .addClass('has-error');
                    }
                    else {
                        if ($(element).attr('type') != 'radio' && $(element).attr('type') != 'hidden') {
                            $(element)
                                .closest('.form-group')
                                .removeClass('has-success')
                                .addClass('has-error');
                        } else if ($(element).attr('type') == 'radio') {
                            $(element)
                                .closest('.has-feedback')
                                .removeClass('has-success')
                                .addClass('has-error');
                        }
                    }
                },

                unhighlight: function (element, errorClass, validClass) {

                    if ($(element).attr('type') == 'file') {
                        $(element)
                            .closest('.form-group')
                            .removeClass('has-error')
                            .addClass('has-success');

                        if ($(element).hasClass('file_upload_group')) {
                            $('.file_upload_group').each(function() {
                                if (!$(this).val()) {
                                    $(this)
                                        .closest('.form-group')
                                        .removeClass('has-error')
                                        .removeClass('has-success')
                                        .end()
                                        .siblings('label.error').remove();
                                }
                            });
                        }
                    }
                    else {
                        if ($(element).attr('type') != 'radio' && $(element).attr('type') != 'file' && $(element).attr('type') != 'hidden' && !($(element).attr('type') == 'text' && $(element).siblings('.input-group-btn').length > 0)) {
                            $(element)
                                .closest('.form-group')
                                .removeClass('has-error')
                                .addClass('has-success');
                        } else if ($(element).attr('type') == 'radio') {
                            $(element)
                                .closest('form')
                                .removeClass('has-error')
                                .addClass('has-success');
                        }
                    }
                },

                errorPlacement: function (error, element) {
                    error.addClass('has-feedback__label');


                    if (element.siblings('.input-group-addon').length > 0) {
                        $(element)
                            .closest('.input-group')
                            .after(error);
                    }

                    else if (element.closest('.form-group').find('.btn-group').length > 0) {
                        $(element)
                            .closest('.form-group').find('.btn-group')
                            .after(error);
                    }

                    else if (element.attr('type') == 'file') {
                        $(element)
                            .closest('.input-group')
                            .after(error);
                    }

                    else if (element.attr('type') == 'checkbox') {
                        $(element)
                            .closest('.has-feedback')
                            .append(error);
                    }

                    else if (element.closest('.radio-group').find('.controls--radio').length > 0) {
                        $(element)
                            .closest('.radio-group')
                            .after(error);
                    }

                    else if ($(element).hasClass('select2-hidden-accessible')) {
                        error.insertAfter(element.parent().find('.has-feedback__icon'));
                    }

                    else if (element.is('textarea')) {
                        error.insertAfter(element);
                    }

                    else {
                        error.insertAfter(element.next('.has-feedback__icon'));
                    }
                },

                invalidHandler: function (form, validator) {
                    scrollToObject($(validator.errorList[0].element));
                },

                submitHandler: function (form) {
                                            $(form).find('button[type="submit"]').text(pleaseWait).attr('disabled', true);
                        form.submit();
                        return false;
                                    }
            });
        });
    });
</script>


<script src="file/autonumeric.js"></script>
    <script type="text/javascript">
    $(document).ready(function () {
        $('#amount, #base').autoNumeric('init',{aSep: '', nBracket: '{,}', lZero: 'deny', aForm: false});
    });
</script>

    <script>
    $(document).ready(function() {
        $('[data-financial="refresh"]').on('click', function() {
            var refresh = $('[data-financial="refresh"]'),
                refreshIcon = $('[data-financial="refresh"] i.fa-refresh');
            refresh.prop('disabled', true);
            refreshIcon.addClass('fa-spin');

            $.ajax({
                url: '/client_side/refreshFinancials',
                type: 'post',
                dataType: 'json',
                success: function(data, textStatus, xhr) {
                    $.each(data, function(accountId, financials) {
                        replaceFinancials(accountId, financials);
                    });
                },
                complete: function() {
                    refresh.prop('disabled', false);
                    refreshIcon.removeClass('fa-spin');
                },
            });
        });

        function replaceFinancials(accountId, financials) {
            if (financials['is_active']) {
                $('[data-financial="account"]').text('(' + accountId + ')');

                $('span[data-financial="balance"]').text(getNumberFormat(financials['balance'], 2));

                var convertedCurrenciesHtml = '';
                $.each(financials['converted_balances'], function(index, item){
                    convertedCurrenciesHtml = convertedCurrenciesHtml + '<a class="dropdown-item" href="#">' + item + '</a>';
                });
                $('.balanceDropdown').php(convertedCurrenciesHtml);
            }

            $('[data-financial="' + accountId + '"] [data-financial="credit"]').text(getNumberFormat(financials['credit'], 2));
            $('[data-financial="' + accountId + '"] [data-financial="balance"]').text(getNumberFormat(financials['balance'], 2));
            $('[data-financial="' + accountId + '"] [data-financial="equity"]').text(getNumberFormat(financials['equity'], 2));
            $('[data-financial="' + accountId + '"] [data-financial="free_margin"]').text(getNumberFormat(financials['free_margin'], 2));
            $('[data-financial="' + accountId + '"] [data-financial="margin"]').text(getNumberFormat(financials['margin'], 2));
            $('[data-financial="' + accountId + '"] [data-financial="margin_level"]').text(getNumberFormat(financials['margin_level'], 2) + '%');
            $('[data-financial="' + accountId + '"] [data-financial="unrealized_pl"]').text(getNumberFormat(financials['profit'], 2));
        }

        function getNumberFormat(number, decimal)
        {
            var dec = '.',
                thous = ',',
                zero = '0.00';
            if (number === 0) {
                return zero.replace('.', dec);
            }

            var multiplier = Math.pow(10, decimal),
                multiNumber = number * multiplier,
                intMultiNumber = ~~multiNumber;
            number = intMultiNumber / multiplier + '';

            var x = number.split('.'),
                x1 = x[0],
                x2,
                rgx = /(\d+)(\d{3})/;
            if (x.length === 1) {
                x2 = dec + new Array(decimal + 1).join('0');
            } else {
                x2 = dec + x[1] + new Array(decimal + 1 - x[1].length).join('0');
            }

            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + thous + '$2');
            }
            return x1 + x2;
        }
    });
</script>



<script>
    $(document).ready(function() {
        $( ".expandAccountOverview" ).click(function() {
            $( ".collapse" ).addClass( "show" );
            $( ".expandAccountOverview" ).addClass( "d-none" );
            $( ".collapseAccountOverview" ).removeClass( "d-none" );
        });
        $( ".collapseAccountOverview" ).click(function() {
            $( ".collapse" ).removeClass( "show" );
            $( ".collapseAccountOverview" ).addClass( "d-none" );
            $( ".expandAccountOverview" ).removeClass( "d-none" );
        });
    });
</script>
<div id="custom-livechat" style="display: none; max-height: 750px;">
    <div class="custom-livechat__header">
        <h3 class="fs-6 mb-0">Avon Investment Services LTD Live Chat</h3>
        <button id="close-prechat-form" class="text-gray pull-right"><i class="fa fa-times"></i></button>
    </div>
    <div class="custom-livechat__body">
        <!--First Step-->
        <div class="j-first-step">
            <p>By clicking the "Enter" button, you agree for your
personal data provided via live chat to be processed by Avon Investment Services LTD, as per the
Company's <a href="privacy-policy.php" target="_blank" style="color:#d51820;">Privacy Policy</a>, which serves the purpose of you receiving assistance from our Customer Support Department.</p>
            <p>If you do not give your consent to the above, you may alternatively contact us via the Members Area or at <a href="mailto:support@avonservicesltd.com" style="color:#d51820;">support@avonservicesltd.com</a>.</p>
                        <div class="text-right">
                <a href="#" id="go-to-second-step" class="btn btn--primary btn-block">
                    Enter
                </a>
            </div>
        </div>
        <!--Second Step-->
        <div class="j-second-step" style="display: none;">
            <p class="j-hide-if-logged-in">Please enter your contact
information. If you already have an Avon Investment Services LTD account, please your account ID
so that our support team can provide you with the best service possible.</p>
            <ul class="custom-livechat__tabs j-hide-if-logged-in" data-group="livechatNav">
                <li class="tab-link active" data-target="existingClient"><a href="#">Existing Client</a></li>
                <li class="tab-link" data-target="newClient"><a href="#">New Client</a></li>
            </ul>

            <div data-group="livechatNav">
                <div id="existing-member" class="tab-content" data-content="existingClient">
                    <form id="pre-chat-form-member" action="#" method="post" novalidate="novalidate">
                        <input type="hidden" name="pre-chat-form-value" value="1">
                        <div class="form-group has-feedback j-hide-if-logged-in">
                            <label for="user_id" class="label--required js-noAutoHeight">MT4/MT5 ID (Real Account)</label>
                            <input class="form-control j-user-id" id="user_id" name="user_id" data-cip-id="user_id" type="text">
                            <div class="has-feedback__icon"></div>
                            <label for="user_id" class="error has-feedback__label j-alert-message" style="display: none">
                                The MT4/MT5 ID and email address provided do not correspond to an Avon Investment Services LTD real trading account.
                            </label>
                        </div>
                        <div class="form-group has-feedback j-hide-if-logged-in">
                            <label for="email_existing_member" class="label--required js-noAutoHeight">Email</label>
                            <input class="form-control j-email" id="email_existing_member" name="email" type="text">
                            <div class="has-feedback__icon"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="preferred_language" class="label--required js-noAutoHeight">
                                Language
                                <i class="fa fa-spinner fa-spin"></i>
                            </label>
                            <select id="preferred_language" name="preferred_language" class="form-control j-preferred-language"></select>
                            <div class="has-feedback__icon"></div>
                        </div>
                        <div class="text-right">
                            <a href="#" id="start-chat" class="btn btn--primary btn-block">
                                Start chat
                            </a>
                        </div>
                    </form>
                </div>
                <div id="visitor-user" class="tab-content d-none" data-content="newClient">
                    <form id="pre-chat-form" novalidate="novalidate">
                        <div class="form-group has-feedback j-hide-if-logged-in">
                            <label for="first_name" class="label--required js-noAutoHeight">First Name:</label>
                            <input class="form-control j-first-name" id="first_name" name="first_name" data-cip-id="first_name" type="text">
                            <div class="has-feedback__icon"></div>
                        </div>
                        <div class="form-group has-feedback j-hide-if-logged-in">
                            <label for="last_name" class="label--required js-noAutoHeight">Last Name:</label>
                            <input class="form-control j-last-name" id="last_name" name="last_name" data-cip-id="last_name" type="text">
                            <div class="has-feedback__icon"></div>
                        </div>
                        <div class="form-group has-feedback j-hide-if-logged-in">
                            <label for="email_visitor" class="label--required js-noAutoHeight">Email</label>
                            <input class="form-control j-email" id="email_visitor" name="email" type="text">
                            <div class="has-feedback__icon"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="preferred_language_visitor" class="label--required js-noAutoHeight">
                                Language
                                <i class="fa fa-spinner fa-spin"></i>
                            </label>
                            <select id="preferred_language_visitor" name="preferred_language" class="form-control j-preferred-language"></select>
                            <div class="has-feedback__icon"></div>
                        </div>
                        <div class="text-right">
                            <a href="#" id="start-chat" class="btn btn--primary btn-block">
                                Start chat
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    (function ($) {

        var initialParameters = {
            apiUrl: 'files/scripts/validations/livechat/livechat.api.php',
            tradingAccount: "",
            brandId: 'Avon Investment Services LTDBZ',
            authenticatedCountry: 'NG',
            languageCode: 'en',
            userDetails: {
                userFirstName: null,
                userLastName: null,
                userEmail: null
            },
            keyVisitorEngaged: 'Avon Investment Services LTD-liveChat-visitorEngaged',
            keyCacheData: 'Avon Investment Services LTD-liveChat-cacheData',
            livechatUrl: 'livechat/support.php?lang=en&brand_id=Avon Investment Services LTDbz&country=NG',
            autostart: getQueryStringValue('open') === 'livechat',
        };

        /**
         * Get value of a single key available in the QueryString
         */
        function getQueryStringValue(key) {
            return decodeURIComponent(window.location.search.replace(new RegExp("^(?:.*[&\\?]" + encodeURIComponent(key).replace(/[\.\+\*]/g, "\\$&") + "(?:\\=([^&]*))?)?.*$", "i"), "$1"));
        }

        /**
         * @param {string} action
         * @param {object} data
         * @return {jqXHR}
         * @private
         */
        function callApi(action, data) {
            return $.ajax({
                url: initialParameters.apiUrl,
                method: "POST",
                data: JSON.stringify({action: action, data: data}),
                dataType: 'json',
                contentType: "application/json; charset=utf-8",
                xhrFields: {
                    withCredentials: true
                },
                crossDomain: true
            });
        }

        /**
         * @param {number} chatGroup
         * @param {Array<{name: string, value: string}>} livechatCustomVariables
         * @param {Object<{ name: string, email: string }>} visitorInfo
         */
        function LivechatModelClass(chatGroup, livechatCustomVariables, visitorInfo) {
            // Protect from duplicated load the livechat library
            if (LivechatModelClass.prototype.hasInstance) {
                throw "Can not create LivechatAPI again";
            }
            LivechatModelClass.prototype.hasInstance = true;

            _init(chatGroup, livechatCustomVariables, visitorInfo);

            // PUBLIC METHODS
            this.chatWindowToggle = function () {
                if (window.LC_API.chat_window_maximized()) {
                    window.LC_API.minimize_chat_window()
                } else {
                    window.LC_API.open_chat_window();
                }
            };

            // PRIVATE METHODS
            function _init(chatGroup, livechatCustomVariables, visitorInfo) {
                window.LC_API = window.LC_API || {};
                window.__lc = window.__lc || {};
                window.__lc.license = 5419421;
                window.__lc.group = chatGroup;
                window.__lc.params = livechatCustomVariables;
                window.__lc.visitor = visitorInfo;

                window.LC_API.on_after_load = function () {
                    window.LC_API.open_chat_window();
                };

                window.LC_API.on_chat_started = function () {
                    LivechatModelClass.prototype.setVisitorEngaged(true);
                };

                window.LC_API.on_chat_ended = function () {
                    LivechatModelClass.prototype.setVisitorEngaged(false);
                };

                // load the livechat library
                (function () {
                    var lc = document.createElement('script');
                    lc.type = 'text/javascript';
                    lc.async = true;
                    lc.src = ('https:' === document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
                    var s = document.getElementsByTagName('script')[0];
                    s.parentNode.insertBefore(lc, s);
                })();
            }
        }

        LivechatModelClass.prototype.hasInstance = false;

        /**
         * @param {boolean} engaged
         */
        LivechatModelClass.prototype.setVisitorEngaged = function (engaged) {
            sessionStorage.setItem(initialParameters.keyVisitorEngaged, JSON.stringify(engaged));
        };

        /**
         * @return {boolean}
         */
        LivechatModelClass.prototype.getVisitorEngaged = function () {
            return !!JSON.parse(sessionStorage.getItem(initialParameters.keyVisitorEngaged));
        };

        function LivechatControllerClass() {
            // PRIVATE PROPERTIES
            var _livechatModel = null;
            var _$customLivechat = $("#custom-livechat");
            var _isLanguagesBusy = false;

            if (LivechatModelClass.prototype.getVisitorEngaged()) {
                var cacheData = _getCacheData();
                _livechatModel = new LivechatModelClass(cacheData.preferredLanguage, cacheData.customParameters, cacheData.visitorInfo);
            }

            // PUBLIC METHODS
            this.openChat = function () {
                if (_livechatModel) {
                    _livechatModel.chatWindowToggle();
                } else {
                    _loadGroupLanguagesSettings();
                    _$customLivechat.show();
                }
            };

            this.closeCustomForm = function () {
                _$customLivechat.hide();
            };

            this.startNewChat = function (formData) {
                if (formData.user_id) {
                    formData.brandId = initialParameters.brandId;
                    callApi('getAccountDetails', formData)
                        .done(function (response) {
                            _startNewChat(formData, response.result);
                        })
                        .fail(function () {
                            $('.j-alert-message').show();
                            $('.j-user-id')
                                .removeClass('valid')
                                .addClass('error')
                                .parent()
                                .removeClass('has-success')
                                .addClass('has-error');
                        });
                } else {
                    _startNewChat(formData, initialParameters.userDetails);
                }
            };

            // PRIVATE METHODS

            /**
             * @param {object} formData
             * @param {object} [userDetails]
             * @private
             */
            function _startNewChat(formData, userDetails) {
                var userFirstName = formData.first_name || (userDetails && userDetails.userFirstName) || '';
                var userLastName = formData.last_name || (userDetails && userDetails.userLastName) || '';
                var userEmail = formData.email || (userDetails && userDetails.userEmail) || '';
                var customParameters = [
                    {
                        name: 'Brand_id',
                        value: (userDetails && userDetails.brandName) || initialParameters.brandId || ''
                    },
                    {
                        name: 'Country',
                        value: (userDetails && userDetails.authenticatedAccountCountry) || initialParameters.authenticatedCountry || ''
                    },
                    {name: 'First Name', value: userFirstName},
                    {name: 'Last Name', value: userLastName},
                    {name: 'Email', value: userEmail},
                    {name: 'Language', value: formData.preferred_language || ''},
                    {
                        name: 'InvestmentAccount',
                        value: (userDetails && userDetails.userAccount) || initialParameters.tradingAccount || formData.user_id || ''
                    },
                    {name: 'browserInfo', value: navigator && navigator.userAgent || 'unknown'}
                ];
                var visitorInfo = {name: userFirstName, email: userEmail};
                _setCacheData({
                    customParameters: customParameters,
                    visitorInfo: visitorInfo,
                    preferredLanguage: formData.preferred_language
                });
                _livechatModel = new LivechatModelClass(formData.preferred_language, customParameters, visitorInfo);
                _$customLivechat.hide();
            }

            function _setCacheData(data) {
                sessionStorage.setItem(initialParameters.keyCacheData, JSON.stringify(data));
            }

            function _getCacheData() {
                return JSON.parse(sessionStorage.getItem(initialParameters.keyCacheData));
            }

            function _loadGroupLanguagesSettings() {
                if (_isLanguagesBusy) {
                    return;
                }
                $('#custom-livechat .fa-spinner').show();
                _isLanguagesBusy = true;
                var data = {
                    languageCode: initialParameters.languageCode,
                    countryCode: initialParameters.authenticatedCountry,
                    brandId: initialParameters.brandId,
                };
                callApi('getLanguageGroupStatus', data)
                    .done(function (response) {

                        var sessionData = response.result.sessionData;
                        if (sessionData.tradingAccount) {

                            initialParameters.tradingAccount = sessionData.tradingAccount;
                            initialParameters.userDetails.userFirstName = sessionData.userDetails.userFirstName;
                            initialParameters.userDetails.userLastName = sessionData.userDetails.userLastName;
                            initialParameters.userDetails.userEmail = sessionData.userDetails.userEmail;

                            $('.custom-livechat__body .j-user-id')
                                .val(initialParameters.tradingAccount)
                                .prop('readonly', true);
                            $('.custom-livechat__body .j-email')
                                .val(initialParameters.userDetails.userEmail)
                                .prop('readonly', true);
                            $('.custom-livechat__body .j-first-name')
                                .val(initialParameters.userDetails.userFirstName)
                                .prop('readonly', true);
                            $('.custom-livechat__body .j-last-name')
                                .val(initialParameters.userDetails.userLastName)
                                .prop('readonly', true);

                            $('#existing-member').removeClass('active');
                            $('#visitor-user').addClass('active');

                            $('.j-hide-if-logged-in').hide();
                        }

                        _renderLanguagesSelectBox(response.result.mGroupsDetails);
                    })
                    .always(function () {
                        _isLanguagesBusy = false;
                        $('#custom-livechat .fa-spinner').hide();
                    });
            }

            /**
             * @param {Array<Object>} languages
             * @private
             */
            function _renderLanguagesSelectBox(languages) {
                if (!Array.isArray(languages)) {
                    console.warn('Languages has to be an array');
                    return;
                }
                var $options = $();
                languages.forEach(function (langObj) {
                    $options = $options.add(
                        '<option value="' + langObj['mGroupId'] + '">' +
                        langObj['mNativeLanguage'] + ' (' + langObj['mStatus'] + ')' +
                        '</option>'
                    );
                });
                $('.j-preferred-language').php($options);
            }
        }

        $(function () {
            var livechatController = new LivechatControllerClass();
            var $document = $(document);

            function openChat() {
                livechatController.openChat();
            }

            if (initialParameters.autostart) {
                openChat();
            }

            $document.on('click', ".js-livechatOpen", function () {
                openChat();
            });

            $document.on('click', "#close-prechat-form", function () {
                livechatController.closeCustomForm();
            });

            $document.on('click', "#start-chat, #start-chat-member", function () {
                var formId = $(this).closest("form").attr('id');
                var $form = $('#' + formId);
                if ($form.valid()) {
                    var formData = {};
                    $form.serializeArray().forEach(function (item) {
                        formData[item.name] = item.value;
                    });
                    livechatController.startNewChat(formData);
                }
            });

            $document.on('click', "#go-to-second-step", function () {
                $('.j-first-step').hide();
                $('.j-second-step').show();
            });
        });
    })(jQuery);
</script>




        <script>
    $(document).ready(function() {
        if ($('#report-panel').length > 0) {
            $('html, body').animate({
                scrollTop: $('#report-panel').offset().top
            }, 0);
        }

        var startDate = '#start_date',
            endDate = '#end_date',
            reportForm = '#report',
            currentDate = '12/08/2020',
            reportBtn = '#btn-report';

        var prevOneMonthDateFrom = '',
            prevThreeMonthsDateFrom = '',
            prevSiAvon Investment Services LTDonthsDateFrom = '';
            prevTwelveMonthsDateFrom = '';


        $(startDate)
            .keypress(function (event) {
                event.preventDefault();
            })
            .datepicker({
                autoOpen: false,
                dateFormat: 'dd/mm/yy',
                maxDate: 0,
                minDate: new Date(2020, 6, 31),
                changeMonth: true,
                changeYear: true,
                onSelect: function(selected) {
                    $(endDate).datepicker('option', 'minDate', selected);
                                        $(startDate).valid();
                                    }
            });

        $(endDate)
            .keypress(function (event) {
                event.preventDefault();
            })
            .datepicker({
                autoOpen: false,
                dateFormat: 'dd/mm/yy',
                maxDate: 0,
                minDate: new Date(2020, 6, 31),
                changeMonth: true,
                changeYear: true,
                onSelect: function(selected) {
                    $(startDate).datepicker('option', 'maxDate', selected);
                                        $(endDate).valid();
                                    }
            });

        if ($('#report_period').val() == 'custom_period') {
            $(startDate).removeAttr('disabled');
            $(endDate).removeAttr('disabled');
            $(reportBtn).removeAttr('disabled');
        } else {
            $(reportBtn).attr('disabled', 'disabled');
        }

        $('#report_period').on('change', function () {
            switch ($(this).val()){
                case 'today':
                    $(startDate).val(currentDate);
                    $(endDate).val(currentDate);
                    break;
                case 'last_month':
                    $(startDate).val(prevOneMonthDateFrom);
                    $(endDate).val(currentDate);
                    break;
                case 'last_three_months':
                    $(startDate).val(prevThreeMonthsDateFrom);
                    $(endDate).val(currentDate);
                    break;
                case 'last_six_months':
                    $(startDate).val(prevSiAvon Investment Services LTDonthsDateFrom);
                    $(endDate).val(currentDate);
                    break;
                case 'last_twelve_months':
                    $(startDate).val(prevTwelveMonthsDateFrom);
                    $(endDate).val(currentDate);
                    break;
                case 'custom_period':
                    $(startDate).removeAttr('disabled');
                    $(endDate).removeAttr('disabled');
                    $(reportBtn).removeAttr('disabled');
                    return true;
                    break;
                default:
                    return true;
                    break;
            }

            $(startDate).removeAttr('disabled');
            $(endDate).removeAttr('disabled');
            $(reportBtn).removeAttr('disabled');

            $(reportForm).submit();
        });

    });
</script>


<script type="text/javascript">var _cf = _cf || []; _cf.push(['_setFsp', true]);  _cf.push(['_setBm', true]);  _cf.push(['_setAu', '/resources/c7b1c34b3frn174e344d9f659790db30']); </script>
<script type="text/javascript" src="file/c7b1c34b3frn174e344d9f659790db30.php"></script>
<div id="ui-datepicker-div" class="ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all"></div>
<iframe src="file/portal-v2.php" id="st_gdpr_iframe" title="GDPR Consent Management" style="width: 0px; height: 0px; position: absolute; left: -5000px;"></iframe>
<script type="text/javascript" id="">(function(){var a=window._fbq||(window._fbq=[]);if(!a.loaded){var b=document.createElement("script");b.async=!0;b.src="../connect.facebook.net/en_US/fbds.js";var c=document.getElementsByTagName("script")[0];c.parentNode.insertBefore(b,c);a.loaded=!0}a.push(["addPixelId","799304580152586"])})();window._fbq=window._fbq||[];window._fbq.push(["track","PixelInitialized",{}]);</script>


<script type="text/javascript" id="">!function(b,e,f,g,a,c,d){b.fbq||(a=b.fbq=function(){a.callMethod?a.callMethod.apply(a,arguments):a.queue.push(arguments)},b._fbq||(b._fbq=a),a.push=a,a.loaded=!0,a.version="2.0",a.queue=[],c=e.createElement(f),c.async=!0,c.src=g,d=e.getElementsByTagName(f)[0],d.parentNode.insertBefore(c,d))}(window,document,"script","../connect.facebook.net/en_US/fbevents.js");fbq("init","1620834084807082");fbq("track","PageView");</script>

<script type="text/javascript" id="">function setCookie(b,d,c){var a=new Date;a.setTime(a.getTime()+864E5*c);c="; expires\x3d"+a.toGMTString();a=new RegExp(/[^.]+\.([a-zA-Z]{3,}|[a-zA-Z]{2}\.[a-zA-Z]{2})$/);var e=window.location.host;a="; domain\x3d."+e.match(a)[0];document.cookie=b+"\x3d"+d+c+a+";path\x3d/"}function getParam(b){return(b=RegExp("[?\x26]"+b+"\x3d([^\x26]*)").exec(window.location.search))&&decodeURIComponent(b[1].replace(/\+/g," "))}var gclid=getParam("gclid");
if(gclid){var gclsrc=getParam("gclsrc");gclsrc&&-1===gclsrc.indexOf("aw")||setCookie("gclid",gclid,90)}dataLayer.push({event:"gclid_ready"});</script>
<script src="file/adsct.php" type="text/javascript"></script>
<script type="text/javascript" id="">function setCookie(b,d,c){var a=new Date;a.setTime(a.getTime()+864E5*c);c="; expires\x3d"+a.toGMTString();a=new RegExp(/[^.]+\.([a-zA-Z]{3,}|[a-zA-Z]{2}\.[a-zA-Z]{2})$/);var e=window.location.host;a="; domain\x3d."+e.match(a)[0];document.cookie=b+"\x3d"+d+c+a+";path\x3d/"}function getParam(b){return(b=RegExp("[?\x26]"+b+"\x3d([^\x26]*)").exec(window.location.search))&&decodeURIComponent(b[1].replace(/\+/g," "))}var gclid=getParam("gclid");
if(gclid){var gclsrc=getParam("gclsrc");gclsrc&&-1===gclsrc.indexOf("aw")||setCookie("gclid",gclid,90)}dataLayer.push({event:"gclid_ready"});</script>

<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "+443455280144‬", // WhatsApp number
            call_to_action: "Message us", // Call to action
            position: "left", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
</body>

<!-- Mirrored from avonservicesltd.com/login.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Oct 2022 15:30:58 GMT -->
</html>
