@include('front.head')
<div id="app">
    <contato></contato>
</div>
@include('front.footer')
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('front/assets/js/materialize.min.js')}}"></script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v7.0&appId=358057404575901&autoLogAppEvents=1"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-164891606-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-164891606-1');
</script>
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
