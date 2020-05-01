@include('front.head')
<div id="app">
  <div class="geral-header header-1">
    <menu-front></menu-front>
  </div>
  <div class="div-geral-1">
    <div class="container">
      <div class="row">
        <div class="col l6 m6 s12">
          <h2>O que é o<br> CooperaBrasil?</h2>
        </div>
        <div class="col l6 m6 s12">
          <p class="sobre">
            Com o intuito de promover negócios entre cooperativas brasileiras dentro do cenário de pandemia,
            criamos uma plataforma para que cooperativas possam se cadastrar e usuários a partir do nosso banco
            de dados possam adquirir produtos / serviços, fortalecendo a cadeia produtiva deste modelo de
            negócio.
          </p>
          <a class="waves-effect waves-light btn orange btn-saibamais">SAIBA MAIS</a>
        </div>
      </div>
      <hr class="divisor">
      <div class="row">
        <div class="col l6 md6 s12">
          <!--<img src="assets/images/mapa.svg" alt="">-->
          @include('front.mapa')
        </div>
        <div class="col l6 md6 s12">
          <div class="row">
            <div class="col s12 center-align">
              <span class="span-pesquise">Pesquise por região:</span>
            </div>
          </div>
          <div class="row">
            <div class="col l12 align-items-center">
              <span class="numero">1</span>
              <div style="margin-left: 5% ; width: 100%;">
                <label for="estado" class="label">Selecione o seu estado</label>
                <select name="estado" id="estado" class="browser-default">
                  <option value="teste">Teste</option>
                </select>
              </div>
            </div>
            <div class="col l12 align-items-center">
              <span class="numero">2</span>
              <div style="margin-left: 5% ; width: 100%;">
                <label for="estado" class="label">Selecione o seu estado</label>
                <select name="estado" id="estado" class="browser-default">
                  <option value="teste">Teste</option>
                </select>
              </div>
            </div>
            <div class="col l12 align-items-center">
              <span class="numero">3</span>
              <div style="margin-left: 5% ; width: 100%;">
                <label for="estado" class="label">Selecione o seu estado</label>
                <select name="estado" id="estado" class="browser-default">
                  <option value="teste">Teste</option>
                </select>
              </div>
            </div>
            <div class="col l12 align-items-center">
              <span class="numero">4</span>
              <div style="margin-left: 5% ; width: 100%;">
                <label for="estado" class="label">Selecione o seu estado</label>
                <select name="estado" id="estado" class="browser-default">
                  <option value="teste">Teste</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
    $('.dropdown-trigger').dropdown();

    function highlight_map_states(){
        if($(".states_section").length>0){
            $(".states_section .list_states .item .link").hover(function(){
                var a="#state_"+$(this).text().toLowerCase();
                $(a).attr("class","state hover")
            },function(){
                var a="#state_"+$(this).text().toLowerCase();
                $(a).attr("class","state")
            })
        }
    };
</script>
<script src="{{asset('js/app.js')}}"></script>

</body>
