<template>
    <div>
        <div v-if="resultado.data">
            <div class="geral-header header-2">
                <menu-front :resultado="resultado.data.length > 0"></menu-front>
            </div>
            <div class="div-geral-1">
                <div class="container">
                    <div class="row">
                        <div class="col s12">
                            <div class="row">
                                <div class="col l12">
                                    <span class="span-pesquise">Filtro:</span>
                                </div>
                            </div>
                            <div class="row inputs-resultado">
                                <div class="col s6">
                                    <label for="estado" class="label">Selecione o seu estado</label>
                                    <select v-model="pesquisa.estado" name="estado" id="estado" class="browser-default"
                                            @change="getCidades()">
                                        <option selected="selected" value="">...</option>
                                        <option v-for="estado in estados" v-bind:value="estado.ID">{{estado.Nome}} /
                                            {{estado.Sigla}}
                                        </option>
                                    </select>
                                </div>
                                <div class="col s6">
                                    <label for="cidade" class="label">Selecione a sua cidade</label>
                                    <select name="cidade" id="cidade" class="browser-default" v-model="pesquisa.cidade">
                                        <option selected="selected" value="">...</option>
                                        <option v-for="cidade in cidadesFiltradas" v-bind:value="cidade.ID">
                                            {{cidade.Nome}}
                                        </option>
                                    </select>
                                </div>
                                <div class="col s6 mt-1">
                                    <label for="ramo" class="label">Qual o ramo?</label>
                                    <select name="ramo" id="ramo" class="browser-default" v-model="pesquisa.ramo">
                                        <option selected="selected" value="">...</option>
                                        <option v-for="ramo in ramos" v-bind:value="ramo.descricao">{{ramo.descricao}}
                                        </option>
                                    </select>
                                </div>
                                <div class="col s6 mt-1">
                                    <label for="produto" class="label">Produto/serviço</label>
                                    <select name="produto" id="produto" class="browser-default"
                                            v-model="pesquisa.produto">
                                        <option selected="selected" value="">...</option>
                                        <option v-for="produto in produtos" v-bind:value="produto.descricao">
                                            {{produto.descricao}}
                                        </option>
                                    </select>
                                </div>
                                <div class="col s12">
                                    <button class="btn btn-success btn-buscar mt-1" @click="buscar(false)">Buscar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-resultado">
                        <div class="col s12">
                            <span class="span-resultado">Cooperativas encontradas</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="row">
                                <div class="col l8 m12 s12">
                                    <ul class="div-produto collapsible" v-if="resultado.data.length > 0">
                                        <li v-for="result in resultado.data">
                                            <div class="row collapsible-header" style="padding: 0">
                                                <div class="col s4 center-align">
                                                    <img :src="url_redirect('front/assets/images/sem-produto.svg')"
                                                         width="140" class="hide-on-med-and-down">
                                                    <img :src="url_redirect('front/assets/images/sem-produto.svg')"
                                                         width="80" class="hide-on-large-only">
                                                </div>
                                                <div class="col s6">
                                                    <p class="nome-cooperativa">{{result.razao ? result.razao.substring(0, 70) : ''}}</p>
                                                    <p class="area hide-on-med-and-down">
                                                        Área de atuação
                                                    </p>
                                                    <div class="align-items-center div-checkbox hide-on-med-and-down">
                                                        <label>
                                                            <input type="checkbox" checked="checked" readonly
                                                                   disabled="disabled"/>
                                                            <span>Nacional</span>
                                                        </label>
                                                        <label>
                                                            <input type="checkbox" readonly disabled="disabled"/>
                                                            <span>Estadual</span>
                                                        </label>
                                                        <label>
                                                            <input type="checkbox" readonly disabled="disabled"/>
                                                            <span>Municipal</span>
                                                        </label>
                                                    </div>
                                                    <p class="area">
                                                        Produto:
                                                        <span class="span-produto">{{search.produto}}</span>
                                                    </p>
                                                </div>
                                                <div class="col s2 right-align">
                                                    <i class="material-icons btn-add"
                                                       style="font-size: 2.3rem;">add_box</i>
                                                </div>
                                            </div>
                                            <div class="row collapsible-body">
                                                <div class="corpo">
                                                    <p class="area">
                                                        Tipos de entrega
                                                    </p>
                                                    <div class="row">
                                                        <div class="col l3 m4 s4" v-for="canal in result.coop_canais">
                                                            <p class="detalhe">
                                                                {{canal.canai.descricao}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <p class="area">
                                                        Produtos comercializados
                                                    </p>
                                                    <div class="row">
                                                        <div class="col l3 m4 s4" v-for="prod in result.coop_produtos">
                                                            <p class="detalhe">
                                                                {{prod.descricao}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <p class="area">
                                                        Contatos comerciais
                                                    </p>
                                                    <div class="row mb-0">
                                                        <div class="col s12">
                                                            <div class="row">
                                                                <div class="col s12">
                                                                    <p class="detalhe">
                                                                        <i class="material-icons">call</i>
                                                                        {{result.telefone}}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col s6">
                                                                    <p class="detalhe">
                                                                        <i class="material-icons">email</i>
                                                                        {{result.email}}
                                                                    </p>
                                                                </div>
                                                                <div class="col s6">
                                                                    <p class="detalhe">
                                                                        <i class="material-icons">language</i>
                                                                        {{result.site}}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col s12">
                                                                    <p class="detalhe">
                                                                        <i class="material-icons">location_on</i>
                                                                        {{result.endereco}}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col s12 right-align">
                                                    <p class="area mb-0 align-items-center" style="float: right">
                                                        Compartilhar <i class="material-icons btn-share">share</i></p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div v-else>
                                        <h6 class="center"> Nenhum resultado encontrado</h6>
                                    </div>
                                    <div class="row" v-if="resultado.last_page > resultado.current_page">
                                        <div class="col s12">
                                            <button class="btn btn-success btn-buscar" style="float: right;"
                                                    @click="buscar(true)">Carregar
                                                mais...
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col l3 offset-l1 m12 s12">
                                    <span class="span-pesquise center-align">Não achou o que precisa?</span>
                                    <p>
                                        Escreva pra gente! <br>
                                        Além de ouvir a sua necessidade, será um prazer ajudar.
                                    </p>
                                    <button class="btn btn-success btn-buscar" style="float: left;">FALE CONOSCO
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-else>
            <div class="geral-header header-1">
                <menu-front></menu-front>
            </div>
            <div class="div-geral-1">
                <div class="container">
                    <div class="row align-items-center primeira-row">
                        <div class="col l6 m6 s12">
                            <h2>O que é o<br> CooperaBrasil?</h2>
                        </div>
                        <div class="col l6 m6 s12">
                            <p class="sobre">
                                Com o intuito de promover negócios entre cooperativas brasileiras dentro do cenário de
                                pandemia,
                                criamos uma plataforma para que cooperativas possam se cadastrar e usuários a partir do
                                nosso
                                banco
                                de dados possam adquirir produtos / serviços, fortalecendo a cadeia produtiva deste
                                modelo
                                de
                                negócio.
                            </p>
                            <!--<a class="waves-effect waves-light btn orange btn-saibamais">SAIBA MAIS</a>-->
                        </div>
                    </div>
                    <hr class="divisor">
                    <div class="row align-items-center">
                        <div class="col l6 m12 s12 hide-on-small-only">
                            <!--<img src="assets/images/mapa.svg" alt="">-->
                            <mapa @getCidades="getCidadesMapa" :estado="pesquisa.estado"></mapa>
                        </div>
                        <div class="col l6 m12 s12">
                            <div class="row">
                                <div class="col s12 center-align">
                                    <span class="span-pesquise">Pesquise por região:</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 align-items-center">
                                    <span class="numero">1</span>
                                    <div class="div-select">
                                        <label for="estado" class="label">Selecione o seu estado</label>
                                        <select v-model="pesquisa.estado" name="estado" id="estado"
                                                class="browser-default"
                                                @change="getCidades()">
                                            <option selected="selected" value="">...</option>
                                            <option v-for="estado in estados" v-bind:value="estado.ID">{{estado.Nome}} /
                                                {{estado.Sigla}}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col s12 align-items-center">
                                    <span class="numero">2</span>
                                    <div class="div-select">
                                        <label for="cidade" class="label">Selecione a sua cidade</label>
                                        <select name="cidade" id="cidade" class="browser-default"
                                                v-model="pesquisa.cidade">
                                            <option selected="selected" value="">...</option>
                                            <option v-for="cidade in cidadesFiltradas" v-bind:value="cidade.ID">
                                                {{cidade.Nome}}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col s12 align-items-center">
                                    <span class="numero">3</span>
                                    <div class="div-select">
                                        <label for="ramo" class="label">Qual o ramo?</label>
                                        <select name="ramo" id="ramo" class="browser-default" v-model="pesquisa.ramo">
                                            <option selected="selected" value="">...</option>
                                            <option v-for="ramo in ramos" v-bind:value="ramo.descricao">
                                                {{ramo.descricao}}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col s12 align-items-center">
                                    <span class="numero">4</span>
                                    <div class="div-select">
                                        <label for="produto" class="label">Produto/Serviço desejado</label>
                                        <select name="produto" id="produto" class="browser-default"
                                                v-model="pesquisa.produto">
                                            <option selected="selected" value="">...</option>
                                            <option v-for="produto in produtos" v-bind:value="produto.descricao">
                                                {{produto.descricao}}
                                            </option>
                                        </select>
                                        <!--<input type="text" id="autocomplete-input" class="autocomplete">
                                        <label for="autocomplete-input">De qual produto/serviço você precisa?</label>-->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <button class="btn btn-success btn-buscar" @click="buscar(false)">Buscar</button>
                                </div>
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
                    ramo: '',
                    produto: '',
                    page: 1
                },
                search: {
                    estado: '',
                    cidade: '',
                    ramo: '',
                    produto: '',
                    page: 1
                },
                resultado: {},
                pagination: {}
            }
        },
        props: ['produtos'],
        created() {
            this.getRamos();
            let self = this;
            /*let resultadoLocal = JSON.parse(localStorage.getItem('resultado'));
            let pesquisa = JSON.parse(localStorage.getItem('pesquisa'));
            if (pesquisa.estado) {
                this.pesquisa = pesquisa;
                this.search = {...this.pesquisa}
                this.getCidades().then(() => {
                    this.pesquisa.cidade = pesquisa.cidade
                });
            }
            if (resultadoLocal.data) {
                this.resultado = resultadoLocal;
            }*/

        },
        methods: {
            getCidades() {
                return new Promise((resolve, reject) => {
                    this.pesquisa.cidade = '';
                    this.cidadesFiltradas = [];
                    this.cidades.forEach(item => {
                        if (item.Estado == this.pesquisa.estado)
                            this.cidadesFiltradas.push(item);
                    });
                    console.log(this.cidadesFiltradas);
                })
            },
            getCidadesMapa(estado) {
                console.log('aoba', estado)
                this.pesquisa.estado = estado;
                this.getCidades();
            },
            getRamos() {
                axios.get('/api/ramos').then(response => {
                    console.log(response)
                    this.ramos = response.data.data;
                })
            },
            buscar(carregaMais = false) {

                this.search.estado = this.pesquisa.estado;
                this.search.cidade = this.pesquisa.cidade;
                this.search.ramo = this.pesquisa.ramo;
                this.search.produto = this.pesquisa.produto;

                let url = '/api/pesquisa?search=';
                let attr = 0;
                if (this.pesquisa.ramo != '') {

                    url += 'ramo.descricao:' + this.pesquisa.ramo;
                    attr++;
                }
                if (this.pesquisa.produto != '') {
                    if (attr > 0) {
                        url += ';';
                    }
                    url += 'coopProdutos.produto.descricao:' + this.pesquisa.produto;
                    attr++;
                }

                if (this.pesquisa.estado != '') {
                    if (attr > 0) {
                        url += ';';
                    }
                    url += 'estado:' + this.pesquisa.estado;
                    attr++;
                }
                if (this.pesquisa.cidade != '') {
                    if (attr > 0) {
                        url += ';';
                    }
                    url += 'cidade:' + this.pesquisa.cidade;
                    attr++;
                }
                if (attr > 1) {
                    url += '&searchJoin=and';
                } else {
                    attr = 0;
                }

                if (carregaMais) {
                    console.log('entrou no carregar mais')
                    url += ('&page=' + (this.resultado.current_page + 1))
                }

                Swal.fire({
                    title: 'Buscando',
                    html: '',
                    showConfirmButton: false,
                    onBeforeOpen: () => {
                        Swal.showLoading()
                    },
                });
                axios.get(url).then(response => {
                    console.log('pesquisa', response)
                    //localStorage.setItem('resultado', JSON.stringify(response.data.data))
                    //localStorage.setItem('pesquisa', JSON.stringify(this.pesquisa))
                    if (carregaMais) {
                        let antigos = this.resultado.data;//Armazenando antigos resgatados
                        this.resultado = response.data.data; // colocando a paginação corretamente
                        this.resultado.data = [...antigos, ...response.data.data.data] //substuindo o array de objetos da próxima página por um array com a soma dos dois
                    } else
                        this.resultado = response.data.data;
                }).finally(() => {
                    Swal.close();
                    $('.collapsible').collapsible();
                })
            },
        },
        updated() {
            let self = this;
            let data = [];
            this.produtos.forEach((item, key) => {
                data[item.descricao] = null
            });
            const dados = {...data}
            /*$(document).ready(function () {
                $('input.autocomplete').autocomplete({
                    data: dados,
                    onAutocomplete() {
                        self.pesquisa.produto = $('#autocomplete-input').val();
                        console.log(self.pesquisa.produto)
                    }
                });
            });*/
        }
    }
</script>
