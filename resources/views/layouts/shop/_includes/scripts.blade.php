<script src="{{ asset('shop/js/jquery.js') }}"></script>
<script src="{{ asset('shop/js/popper.min.js') }}"></script>
<script src="{{ asset('shop/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('shop/js/magnific-popup.min.js') }}"></script>
<script src="{{ asset('shop/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('shop/js/appear.js') }}"></script>
<script src="{{ asset('shop/js/parallax.min.js') }}"></script>
<script src="{{ asset('shop/js/tilt.jquery.min.js') }}"></script>
<script src="{{ asset('shop/js/jquery.paroller.min.js') }}"></script>
<script src="{{ asset('shop/js/owl.js') }}"></script>
<script src="{{ asset('shop/js/wow.js') }}"></script>
<script src="{{ asset('shop/js/swiper.min.js') }}"></script>
<script src="{{ asset('shop/js/touchspin.js') }}"></script>
<script src="{{ asset('shop/js/odometer.js') }}"></script>
<script src="{{ asset('shop/js/mixitup.js') }}"></script>
<script src="{{ asset('shop/js/backToTop.js') }}"></script>
<script src="{{ asset('shop/js/jquery.marquee.min.js') }}"></script>
<script src="{{ asset('shop/js/nav-tool.js') }}"></script>
<script src="{{ asset('shop/js/jquery-ui.js') }}"></script>
<script src="{{ asset('shop/js/script.js') }}"></script>
<script src="{{ asset('shop/sweetalert/sweetalert2.all.min.js') }}"></script>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
    @if (session()->has('success'))
        Toast.fire({
            icon: 'success',
            title: '{{ session('success') }}'
        })
    @endif

    @if (session()->has('error'))
        Toast.fire({
            icon: 'error',
            title: '{{ session('error') }}'
        })
    @endif
</script>
