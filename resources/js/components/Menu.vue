<template>
    <div class="container py-2">
        <div class="row">
            <div class="col l10 m8 s12 offset-l1 col-menu">
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
                <div class="menu-mobile">
                    <ul id="slide-out" class="sidenav">
                        <li><div class="user-view">
                            <div class="background">
                                <img src="images/office.jpg">
                            </div>
                            <a href="#user"><img class="circle" src="images/yuna.jpg"></a>
                            <a href="#name"><span class="white-text name">John Doe</span></a>
                            <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
                        </div></li>
                        <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
                        <li><a href="#!">Second Link</a></li>
                        <li><div class="divider"></div></li>
                        <li><a class="subheader">Subheader</a></li>
                        <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
                    </ul>
                    <a href="#" data-target="slide-out" class="sidenav-trigger" style="float: right"><i class="material-icons menu-icon">menu</i></a>
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
        },
        computed: {
        },
    };
</script>



