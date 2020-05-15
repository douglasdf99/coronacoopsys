</body>
<script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
<footer>
    <div class="container">
        <div class="row row-footer">
            <div class="col l10 offset-l1 m12 hide-on-med-and-down"
                 style="display: flex;justify-content: space-around;">
                <div>
                    {{--<img src="{{asset('front/assets/images/footer-logos.svg')}}" alt="">--}}
                    <a style="margin: 0 1.5rem" href="https://somos.coop.br" target="_blank"><img src="{{asset('front/assets/images/logo-coop.svg')}}" alt=""></a>
                    <a style="margin: 0 1.5rem" href="https://somoscooperativismo.coop.br" target="_blank"><img src="{{asset('front/assets/images/logo-ocb.svg')}}" alt=""></a>
                </div>
                <div>
                    <a href="https://www.facebook.com/sistemaocb" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com/sistemaocb" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.linkedin.com/company/organiza-o-das-cooperativas-brasileiras-ocb-/"
                       target="_blank"><i class="fab fa-linkedin"></i></a>
                    <a href="http://www.youtube.com/sistemaocb" target="_blank"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="col l0 m0 s12 hide-on-large-only" style="display: flex;justify-content: space-around;">
                <img src="{{asset('front/assets/images/footer-mobile.svg')}}" width="100%">
            </div>
        </div>
    </div>
</footer>
