<template>
    <div class="container py-2">
        <div class="row">
            <div class="col l10 m8 s12 offset-l1 col-menu">
                <div class="menu nav-wrapper">
                    <div class="row mb-0 align-items-center">
                        <div class="col s6">
                            <ul class="left-align">
                                <li><a href="/" @click="inicio">Início</a></li>
                                <!--<li>Sobre</li>
                                <li>Pesquisar</li>-->
                                <li><a href="/contato">Contato</a></li>
                            </ul>
                        </div>
                        <div class="col s6">
                            <div class="area-cadastrar">
                                <span>É uma Cooperativa?</span>
                                <!--<a href="https://pt.surveymonkey.com/r/cooperabrasil" target="_blank">Cadastre-se</a>-->
                                <a href="/cadastrar">Cadastre-se</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="menu-mobile">
                    <div id="slide-out" class="sidenav sidenav-mobile">
                        <ul>
                            <i class="material-icons close-btn-sidenav sidenav-close">close</i>
                            <li><a href="/" @click="inicio">Início</a></li>
                            <!--<li>Sobre</li>
                            <li>Pesquisar</li>-->
                            <li style="border-bottom: unset"><a href="/contato">Contato</a></li>
                        </ul>
                        <p style="text-align: center; font-size: 1rem; text-transform: initial;" class="mb-0">
                            É uma cooperativa? <br>
                            <!--<a href="https://pt.surveymonkey.com/r/cooperabrasil" target="_blank" class="btn-small btn-cadastre-mobile">CADASTRE-SE</a>-->
                            <a href="/cadastrar" class="btn-small btn-cadastre-mobile">CADASTRE-SE</a>
                        </p>
                    </div>
                    <a href="#" data-target="slide-out" class="sidenav-trigger" style="float: right"><i
                            class="material-icons menu-icon">menu</i></a>
                </div>
            </div>
        </div>
        <div class="row hide-on-large-only" v-if="!resultado && !contato">
            <div class="col l5 m5 s12 col-titulo">
                <h1 class="titulo">Coopera<strong>Brasil</strong></h1>
                <p class="proposta">
                    Promovendo negócios entre cooperativas brasileiras neste novo cenário.
                </p>
            </div>
        </div>
        <div class="row hide-on-large-only" v-if="contato">
            <div class="col l5 m5 s12 col-titulo">
                <h1 class="titulo">Não achou o que precisa?
                    Dúvidas? Sugestões?
                </h1>
                <p class="proposta">
                    Escreva pra gente!
                    Além de ouvir a sua necessidade, será um prazer ajudar.
                </p>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        created() {
        },
        data() {
            return {
                name: ''
            }
        },
        methods: {
            inicio() {
                localStorage.removeItem('pesquisa');
                localStorage.removeItem('resultado');
                location.reload();
            }
        },
        props: ['resultado', 'contato'],
        computed: {},
    };
</script>



