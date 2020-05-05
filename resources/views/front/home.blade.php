@include('front.head')
<div id="app">
    <home :produtos="{{$produtos}}"></home>
</div>
@include('front.footer')
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
</body>
