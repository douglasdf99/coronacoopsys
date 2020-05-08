</body>
<script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
<footer>
    <div class="container">
        <div class="row row-footer">
            <div class="col l10 offset-l1 m12 hide-on-med-and-down"
                 style="display: flex;justify-content: space-around;">
                <img src="{{asset('front/assets/images/footer-logos.svg')}}" alt="">
                <div>
                    <a href="https://www.facebook.com/sistemaocb" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com/sistemaocb" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.linkedin.com/company/organiza-o-das-cooperativas-brasileiras-ocb-/" target="_blank"><i class="fab fa-linkedin"></i></a>
                    <a href="http://www.youtube.com/sistemaocb" target="_blank"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="col l0 m0 s12 hide-on-large-only" style="display: flex;justify-content: space-around;">
                <img src="{{asset('front/assets/images/footer-mobile.svg')}}" width="100%">
            </div>
        </div>
    </div>
</footer>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('front/assets/js/materialize.min.js')}}"></script>
<script>
    $('.dropdown-trigger').dropdown();
    $('.sidenav').sidenav();
    $('.collapsible').collapsible();

    function highlight_map_states() {
        if ($(".states_section").length > 0) {
            $(".states_section .list_states .item .link").hover(function () {
                var a = "#state_" + $(this).text().toLowerCase();
                $(a).attr("class", "state hover")
            }, function () {
                var a = "#state_" + $(this).text().toLowerCase();
                $(a).attr("class", "state")
            })
        }
    };
</script>
