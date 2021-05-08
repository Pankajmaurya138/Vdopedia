<div id="footer_remove">
    <div id="footer-bottom">
        <div class="logo text-center">
            <a href="{{ route('home') }}"><img src="{{ asset('images/logo.jpg')}}" alt="footer logo" width="140px"></a>
        </div>
        <div class="btm-footer-text text-center">
            <p>{{ date('Y') }}© Vdopedia.</p>
        </div>
    </div>

    <script src="{{asset('bower_components/jquery/dist/jquery.js')}}"></script>
    <script src="{{asset('bower_components/what-input/what-input.js')}}"></script>
    <script src="{{asset('bower_components/foundation-sites/dist/foundation.js')}}"></script>
    <script src="{{asset('js/jquery.showmore.src.js')}}"></script>
    <script src="{{asset('js/app.js') }}"></script>

    <script src="{{asset('layerslider/js/greensock.js')}}"></script>
    {{-- LayerSlider script files --}}
    <script src="{{asset('layerslider/js/layerslider.transitions.js')}}"></script>
    <script src="{{asset('layerslider/js/layerslider.kreaturamedia.jquery.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/inewsticker.js')}}"></script>
    <script id="script_remove" src="{{asset('js/jquery.kyco.easyshare.js')}}"></script>
   <script src="{{asset('js/select2.min.js')}}"></script>
    <script src="{{asset('js/custom.js') }}"></script>
    <script src="{{asset('js/promise.min.js')}}"></script>
    <script src="{{asset('js/sweetalert2.all.js')}}"></script>
    <script src="{{asset('js/validate.js')}}"></script>
    <script src="{{asset('js/jquery-3.4.0.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function(){
             var base_url    = "{{ url('/') }}";
        });
      
 

            $(document).ready(function () {
                $("#sidebar").mCustomScrollbar({
                    theme: "minimal",
                });

                $('#dismiss, .overlay').on('click', function () {
                    $('#sidebar').removeClass('active');
                    $('.overlay').removeClass('active');
                });

                $('.sidebarCollapse').on('click', function () {
                    $('#sidebar').addClass('active');
                    $('.overlay').addClass('active');
                    $('.collapse.in').toggleClass('in');
                    $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                });
            });


        </script>
</div>
