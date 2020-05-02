@include('front.head')
<div id="app">
    <div class="geral-header header-1">
        <menu-front></menu-front>
    </div>
    <home></home>
</div>
@include('front.footer')
<script>
    $('.dropdown-trigger').dropdown();

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
<script src="{{asset('js/app.js')}}"></script>

</body>
