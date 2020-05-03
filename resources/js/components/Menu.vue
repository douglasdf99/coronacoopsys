<template>
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
<style scoped>
    @media (max-width: 768px){
        .menu {display: none}
    }
</style>



