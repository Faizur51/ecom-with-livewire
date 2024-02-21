<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>Rafa Shop</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend')}}/assets/imgs/theme/favicon.ico">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/main.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/icheck-material@1.0.1/icheck-material.min.css">
    @livewireStyles
</head>
<body>
@livewire('header-component')

@livewire('mobile-component')

{{$slot}}

@livewire('footer-component')
<!-- Vendor JS-->
<script src="{{asset('frontend')}}/assets/js/vendor/modernizr-3.6.0.min.js"></script>
<script src="{{asset('frontend')}}/assets/js/vendor/jquery-3.6.0.min.js"></script>
<script src="{{asset('frontend')}}/assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
<script src="{{asset('frontend')}}/assets/js/vendor/bootstrap.bundle.min.js"></script>
<script src="{{asset('frontend')}}/assets/js/plugins/slick.js"></script>
<script src="{{asset('frontend')}}/assets/js/plugins/jquery.syotimer.min.js"></script>
<script src="{{asset('frontend')}}/assets/js/plugins/wow.js"></script>
<script src="{{asset('frontend')}}/assets/js/plugins/jquery-ui.js"></script>
<script src="{{asset('frontend')}}/assets/js/plugins/perfect-scrollbar.js"></script>
<script src="{{asset('frontend')}}/assets/js/plugins/magnific-popup.js"></script>
<script src="{{asset('frontend')}}/assets/js/plugins/select2.min.js"></script>
<script src="{{asset('frontend')}}/assets/js/plugins/waypoints.js"></script>
<script src="{{asset('frontend')}}/assets/js/plugins/counterup.js"></script>
<script src="{{asset('frontend')}}/assets/js/plugins/jquery.countdown.min.js"></script>
<script src="{{asset('frontend')}}/assets/js/plugins/images-loaded.js"></script>
<script src="{{asset('frontend')}}/assets/js/plugins/isotope.js"></script>
<script src="{{asset('frontend')}}/assets/js/plugins/scrollup.js"></script>
<script src="{{asset('frontend')}}/assets/js/plugins/jquery.vticker-min.js"></script>
<script src="{{asset('frontend')}}/assets/js/plugins/jquery.theia.sticky.js"></script>
<script src="{{asset('frontend')}}/assets/js/plugins/jquery.elevatezoom.js"></script>
<!-- Template  JS -->
<script src="{{asset('frontend')}}/assets/js/main.js?v=3.3"></script>
<script src="{{asset('frontend')}}/assets/js/shop.js?v=3.3"></script>

<script src="{{asset('frontend')}}/assets/js/ckeditor/ckeditor.js"></script>

@stack('scripts')
@livewireScripts
<script>
    window.livewire.on('addSliderQuick',()=>{
        $('#addSliderModal').modal('hide');
        $('input[type=file]').val('');
    })
    window.livewire.on('editSlider',()=>{
        $('#editSliderModal').modal('hide');
        $('input[type=file]').val('');

    })

    window.livewire.on('addCategory',()=>{
        $('#addCategoryModal').modal('hide');
        $('input[type=file]').val('');

    })

    window.livewire.on('editCategory',()=>{
        $('#editCategoryModal').modal('hide');
        $('input[type=file]').val('');

    })

    window.livewire.on('editSubcategory',()=>{
        $('#editSubcategoryModal').modal('hide');
        $('input[type=file]').val('');

    })

    window.livewire.on('addProduct',()=>{
        $('input[type=file]').val('');

    })

    window.livewire.on('addShippingAddress',()=>{
        $('#addShippingAddress').modal('hide');
    })

    window.livewire.on('editShippingAddress',()=>{
        $('#editShippingAddress').modal('hide');
    })

    window.livewire.on('editProfileinfo',()=>{
        $('#editProfile').modal('hide');
    })
    window.livewire.on('addReview',()=>{
        $('#productReview').modal('hide');
    })
    window.livewire.on('addSetting',()=>{
        $('#addSettingModal').modal('hide');
    })

    window.livewire.on('updatePicture',()=>{
        $('#editPicture').modal('hide');
    })
    window.addEventListener('show-modal',function (){
        $('#showModal').modal('show')
    })
</script>

<script>
    (function (window, document) {
        var loader = function () {
            var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
            tag.parentNode.insertBefore(script, tag);
        };

        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);
</script>
</body>
</html>
