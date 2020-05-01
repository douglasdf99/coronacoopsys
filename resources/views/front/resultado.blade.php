@include('front.head')
<div class="geral-header header-2">
    <div class="container py-2">
        <div class="row">
            <div class="col l10 m8 s12 offset-l1">
                <div class="menu nav-wrapper">
                    <div class="row mb-0 align-items-center">
                        <div class="col l8">
                            <ul class="left-align">
                                <li>Início</li>
                                <li>Sobre</li>
                                <li>Pesquisar</li>
                                <li>Contato</li>
                            </ul>
                        </div>
                        <div class="col l4">
                            <div class="area-cadastrar">
                                <span>É uma Cooperativa?</span>
                                <a href="#">Cadastre-se</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col l5 m5 s12">
                <h1 class="titulo">Coopera<strong>Brasil</strong></h1>
                <p class="proposta">
                    Promovendo negócios entre cooperativas brasileiras neste novo cenário.
                </p>
            </div>
        </div>
    </div>
</div>
<div class="div-geral-1">
    <div class="container">
        <div class="row">
            <div class="col l10 offset-l1 m12 s12">
                <div class="row">
                    <div class="col l12">
                        <span class="span-pesquise">Filtro:</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col l3 m3 s6">
                        <label for="estado" class="label">Estado</label>
                        <select name="estado" id="estado" class="browser-default">
                            <button>tesste</button>
                            <option value="teste">Teste</option>
                            <option value="teste">Lucas</option>
                        </select>
                    </div>
                    <div class="col l3 m3 s6">
                        <label for="estado" class="label">Cidade</label>
                        <select name="estado" id="estado" class="browser-default">
                            <option value="teste">Teste</option>
                        </select>
                    </div>
                    <div class="col l3 m3 s6">
                        <label for="estado" class="label">Ramo</label>
                        <select name="estado" id="estado" class="browser-default">
                            <option value="teste">Teste</option>
                        </select>
                    </div>
                    <div class="col l3 m3 s6">
                        <label for="estado" class="label">Produto / Serviço</label>
                        <select name="estado" id="estado" class="browser-default">
                            <option value="teste">Teste</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-resultado">
            <div class="col l12">
                <span class="span-resultado">Cooperativas encontradas</span>
            </div>
        </div>
        <div class="row">
            <div class="col l10 offset-l1 m12 s12">
                <div class="row">
                    <div class="col l7">
                        <ul class="div-produto collapsible">
                            <li>
                                <div class="row collapsible-header">
                                    <div class="col l4 center-align">
                                        <img src="assets/images/sem-produto.svg" width="140">
                                    </div>
                                    <div class="col l6">
                                        <p class="nome-cooperativa">NOME DA COOPERATIVA</p>
                                        <p class="area">
                                            Área de atuação
                                        </p>
                                        <div class="align-items-center div-checkbox">
                                            <label>
                                                <input type="checkbox"/>
                                                <span>Red</span>
                                            </label>
                                            <label>
                                                <input type="checkbox"/>
                                                <span>Red</span>
                                            </label>
                                            <label>
                                                <input type="checkbox"/>
                                                <span>Red</span>
                                            </label>
                                        </div>
                                        <p class="area">
                                            Área de atuação
                                            <span>Café</span>
                                        </p>
                                    </div>
                                    <div class="col l2 right-align">
                                        <i class="material-icons btn-add" style="font-size: 2.3rem;">add_box</i>
                                    </div>
                                </div>
                                <div class="row collapsible-body">
                                    <div class="corpo">
                                        <p class="area">
                                            Tipos de entrega
                                        </p>
                                        <p class="area">
                                            Produtos comercializados
                                        </p>
                                        <p class="area">
                                            Contatos comerciais
                                        </p>
                                    </div>
                                    <div class="col s12 right-align">
                                        <p class="area mb-0 align-items-center" style="float: right">Compartilhar <i class="material-icons btn-share">share</i></p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.collapsible').collapsible();
</script>