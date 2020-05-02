<template>
    <div class="div-geral-1">
        <div class="container">
            <div class="row">
                <div class="col l6 m6 s12">
                    <h2>O que é o<br> CooperaBrasil?</h2>
                </div>
                <div class="col l6 m6 s12">
                    <p class="sobre">
                        Com o intuito de promover negócios entre cooperativas brasileiras dentro do cenário de pandemia,
                        criamos uma plataforma para que cooperativas possam se cadastrar e usuários a partir do nosso
                        banco
                        de dados possam adquirir produtos / serviços, fortalecendo a cadeia produtiva deste modelo de
                        negócio.
                    </p>
                    <a class="waves-effect waves-light btn orange btn-saibamais">SAIBA MAIS</a>
                </div>
            </div>
            <hr class="divisor">
            <div class="row">
                <div class="col l6 m12 s12">
                    <!--<img src="assets/images/mapa.svg" alt="">-->
                    <mapa @getCidades="getCidadesMapa"></mapa>
                </div>
                <div class="col l6 m12 s12">
                    <div class="row">
                        <div class="col s12 center-align">
                            <span class="span-pesquise">Pesquise por região:</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l12 align-items-center">
                            <span class="numero">1</span>
                            <div class="div-select">
                                <label for="estado" class="label">Selecione o seu estado</label>
                                <select v-model="pesquisa.estado" name="estado" id="estado" class="browser-default" @change="getCidades()">
                                    <option selected="selected" value="">...</option>
                                    <option v-for="estado in estados" v-bind:value="estado.ID">{{estado.Nome}} / {{estado.Sigla}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col l12 align-items-center">
                            <span class="numero">2</span>
                            <div class="div-select">
                                <label for="cidade" class="label">Selecione a sua cidade</label>
                                <select name="cidade" id="cidade" class="browser-default">
                                    <option selected="selected" value="">...</option>
                                    <option v-for="cidade in cidadesFiltradas" v-bind:value="cidade.ID">{{cidade.Nome}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col l12 align-items-center">
                            <span class="numero">3</span>
                            <div class="div-select">
                                <label for="ramo" class="label">Qual o ramo?</label>
                                <select name="ramo" id="ramo" class="browser-default">
                                    <option value="teste">Teste</option>
                                </select>
                            </div>
                        </div>
                        <div class="col l12 align-items-center">
                            <span class="numero">4</span>
                            <div class="div-select">
                                <label for="produto" class="label">De qual produto/serviço você precisa?</label>
                                <select name="produto" id="produto" class="browser-default">
                                    <option value="teste">Teste</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import mapa from './Mapa'
    import cidades from '../scripts/Cidades.json'
    import estados from '../scripts/Estados.json'

    export default {
        name: 'Home',
        components: {mapa},
        data() {
            return {
                estados: estados,
                cidades: cidades,
                ramos: [],
                cidadesFiltradas: [],
                pesquisa: {
                    estado: '',
                    cidade: '',
                    ramo: {},
                    produto: {}
                }
            }
        },
        created() {
            this.getRamos();
        },
        methods: {
            getCidades() {
                this.pesquisa.cidade = '';
                this.cidadesFiltradas = [];
                this.cidades.forEach(item => {
                    if(item.Estado == this.pesquisa.estado)
                        this.cidadesFiltradas.push(item);
                });
                console.log(this.cidadesFiltradas);
            },
            getCidadesMapa(estado) {
                console.log('aoba', estado)
                this.pesquisa.estado = estado;
                this.getCidades();
            },
            getRamos(){
                axios.get('/api/ramos').then(response => {
                    console.log(response)
                })
            }
        }
    }
</script>