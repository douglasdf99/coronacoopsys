@include('front.head')
<div id="app">
    <div class="geral-header header-1">
        <menu-front></menu-front>
    </div>
    <home></home>
</div>
<script src="{{asset('front/assets/js/materialize.min.js')}}"></script>
@include('front.footer')
<script>
    $(document).ready(function () {
        $('.dropdown-trigger').dropdown();
        $('input.autocomplete').autocomplete({
            data: self.produtos,
        });
    });

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
