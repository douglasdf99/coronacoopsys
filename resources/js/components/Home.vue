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
                                        <option v-for="estado in estados" v-bind:value="estado">{{estado.Nome}} /
                                            {{estado.Sigla}}
                                        </option>
                                    </select>
                                </div>
                                <div class="col s6">
                                    <label for="cidade" class="label">Selecione a sua cidade</label>
                                    <select name="cidade" id="cidade" class="browser-default" v-model="pesquisa.cidade">
                                        <option selected="selected" value="">...</option>
                                        <option v-for="cidade in cidadesFiltradas" v-bind:value="cidade.Nome">
                                            {{cidade.Nome}}
                                        </option>
                                    </select>
                                </div>
                                <div class="col s6 mt-1">
                                    <label for="ramo" class="label">Qual o ramo?</label>
                                    <select name="ramo" id="ramo" class="browser-default" v-model="pesquisa.ramo">
                                        <option selected="selected" value="">...</option>
                                        <option v-for="ramo in ramos" v-bind:value="ramo">{{ramo.descricao}}
                                        </option>
                                    </select>
                                </div>
                                <div class="col s6 mt-1">
                                    <label for="produto" class="label">Produto/serviço</label>
                                    <!--<select name="produto" id="produto" class="browser-default"
                                            v-model="pesquisa.produto">
                                        <option selected="selected" value="">...</option>
                                        <option v-for="produto in ProdutoRamo" v-bind:value="produto.descricao">
                                            {{produto.descricao}}
                                        </option>
                                    </select>-->
                                    <Select2 v-model="pesquisa.produto" :options="ProdutoRamo">
                                        <option selected="selected" value="">...</option>
                                    </Select2>
                                </div>
                                <div class="col s12" v-if="ok">
                                    <button class="btn btn-success btn-buscar mt-1" @click="buscar(false)">Buscar
                                    </button>
                                </div>
                                <div class="col s12" v-else>
                                    <button class="btn btn-success btn-buscar mt-1" @click="modalrequire">Buscar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-resultado">
                        <div class="col s12">
                            <span class="span-resultado">Cooperativas encontradas  </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="row">
                                <div class="col l8 m12 s12">
                                    <ul class="div-produto collapsible" v-if="resultado.data.length > 0">
                                        <li v-for="(result, index) in resultado.data">
                                            <div class="row collapsible-header" style="padding: 0"
                                                 @click="toogleicon(index)">
                                                <div class="col s4 center-align">
                                                    <img :src="url_redirect('front/assets/images/avatar-ocb.png')"
                                                         width="140" class="hide-on-med-and-down">
                                                    <img :src="url_redirect('front/assets/images/avatar-ocb.png')"
                                                         width="80" class="hide-on-large-only">
                                                </div>
                                                <div class="col s6">
                                                    <p class="nome-cooperativa">{{result.nome ? result.nome.substring(0,
                                                        70) : ''}}</p>

                                                    <p class="area hide-on-med-and-down">
                                                        Área de atuação
                                                    </p>
                                                    <div class="align-items-center div-checkbox hide-on-med-and-down">
                                                        <label v-if="result.areas[0].tipo == 'Nacional'">
                                                            <input type="checkbox" class="filled-in" checked="checked"
                                                                   readonly
                                                                   disabled="disabled"/>
                                                            <span>Nacional</span>
                                                        </label>
                                                        <label v-else>
                                                            <input type="checkbox" class="filled-in" readonly
                                                                   disabled="disabled"/>
                                                            <span>Nacional</span>
                                                        </label>
                                                        <label v-if="result.areas[0].tipo == 'Estadual'">
                                                            <input type="checkbox" class="filled-in" checked="checked"
                                                                   readonly disabled="disabled"/>
                                                            <span>Estadual</span>
                                                        </label>
                                                        <label v-else>
                                                            <input type="checkbox" class="filled-in" readonly
                                                                   disabled="disabled"/>
                                                            <span>Estadual</span>
                                                        </label>
                                                        <label v-if="result.areas[0].tipo == 'Municipal'">
                                                            <input type="checkbox" class="filled-in" checked="checked"
                                                                   readonly disabled="disabled"/>
                                                            <span>Municipal</span>
                                                        </label>
                                                        <label v-else>
                                                            <input type="checkbox" class="filled-in" readonly
                                                                   disabled="disabled"/>
                                                            <span>Municipal</span>
                                                        </label>
                                                    </div>
                                                    <p class="area" v-if="search.produto != '...'">
                                                        Produto:
                                                        <span class="span-produto">{{search.produto}}</span>
                                                    </p>
                                                </div>
                                                <div class="col s2 right-align"
                                                     style="display: flex;align-items: flex-start;
                                                     justify-content: space-between;">
                                                    <img width="65px" class="hide-on-med-and-down"
                                                         :src="url_redirect('front/assets/images/ramos/' + imagem_ramo(result.ramo.descricao) + '.svg')">
                                                    <i class="material-icons btn-add"
                                                       style="font-size: 2.3rem;" v-show="show[index]">indeterminate_check_box</i>
                                                    <i class="material-icons btn-add"
                                                       style="font-size: 2.3rem;" v-show="!show[index]">add_box</i>
                                                </div>
                                            </div>
                                            <div class="row collapsible-body">
                                                <div class="corpo">
                                                    <p class="area">
                                                        Tipos de entrega
                                                    </p>
                                                    <div class="row">
                                                        <div class="col l3 m4 s4" v-for="canal in result.coop_canais">
                                                            <p class="detalhe"></p>
                                      <li style="border: unset;" class="listagem-prod">
                                      {{canal.canai.descricao}}
                                      </li>
                                                        </div>
                                                    </div>
                                                    <p class="area">
                                                        Produtos comercializados
                                                    </p>
                                                    <div class="row">
                                                        <div class="col l3 m4 s4" v-for="prod in result.coop_produtos">
                                                            <p class="detalhe"></p>
                                        <li style="border: unset;" class="listagem-prod">
                                            {{prod.descricao}}
                                        </li>

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
                                                {{result.telefone | VMask('(##) ####-####')}}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12">
                                            <a :href="'mailto:'+result.email" target="_blank">
                                                <p class="detalhe">
                                                    <i class="material-icons">email</i>
                                                    {{result.email}}
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12">
                                            <a :href="'https://' + result.site" target="_blank">
                                                <p class="detalhe">
                                                    <i class="material-icons">language</i>
                                                    {{result.site}}
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12">
                                            <p class="detalhe">
                                                <i class="material-icons">location_on</i>
                                                {{result.bairro}} | {{result.endereco}} {{result.numero}},{{result.cep}}
                                                {{result.cidade}}-{{result.estado}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 right-align">
                            <p class="area mb-0 align-items-center" style="float: right">
                                Compartilhar <a target="_blank"
                                                href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.cooperabrasil.coop.br%2F&amp;src=sdkpreparse"
                                                class="fb-xfbml-parse-ignore"><i
                                    class="material-icons btn-share">share</i></a></p>
                        </div>
                    </div>
                    </li>
                    </ul>
                    <div v-else>
                        <h6 class="center"> Nenhum resultado encontrado</h6>
                    </div>
                    <div class="row">
                        <ul class="pagination">
                            <li class="waves-effect" v-if="pagination.current_page > 1">
                                <a href="#" v-on:click.prevent="changePage(pagination.current_page - 1)"> <i
                                        class="material-icons">chevron_left</i></a>
                            </li>
                            <li class="disabled" v-else>
                                <a href="javascript:void(0)"><i class="material-icons">chevron_left</i></a>
                            </li>
                            <li class="waves-effect" v-for="page in pagesNumber"
                                :class="[{'active': page == pagination.current_page},{'waves-effect': page == pagination.current_page}] ">
                                <a href="#" v-on:click.prevent="changePage(page)">{{ page }}</a>
                            </li>
                            <li class="waves-effect" v-if="pagination.current_page < pagination.lastPage">
                                <a class="page-link" href="#"
                                   v-on:click.prevent="changePage(pagination.current_page + 1)"> <i
                                        class="material-icons">chevron_right</i></a>
                            </li>
                            <li class="disabled" v-else>
                                <a href="javascript:void(0)"> <i class="material-icons">chevron_right</i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col l3 offset-l1 m12 s12">
                    <span class="span-pesquise center-align">Não achou o que precisa?</span>
                    <p>
                        Escreva pra gente! <br>
                        Além de ouvir a sua necessidade, será um prazer ajudar.
                    </p>
                    <a :href="url_redirect('contato')" class="btn btn-success btn-buscar" style="float: left;">FALE
                        CONOSCO
                    </a>
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
                            Uma grande rede nacional de cooperativas onde você encontra os produtos e serviços que
                            procura. Esse é o
                            CooperaBrasil: uma iniciativa do Sistema OCB para conectar cooperativas, sociedade e
                            estimular a
                            intercooperação! Uma oportunidade para as pessoas encontrarem produtos e serviços de
                            cooperativas, e ver
                            de perto a qualidade de tudo que leva a marca coop.
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
                                <span class="span-pesquise">Encontre aqui
os produtos e serviços das
cooperativas brasileiras:</span>
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
                                        <option v-for="estado in estados" v-bind:value="estado">{{estado.Nome}} /
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
                                        <option v-for="cidade in cidadesFiltradas" v-bind:value="cidade.Nome">
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
                                        <option v-for="ramo in ramos" v-bind:value="ramo">
                                            {{ramo.descricao}}
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col s12 align-items-center">
                                <span class="numero">4</span>
                                <div class="div-select">
                                    <label for="produto" class="label">Produto/Serviço desejado</label>
                                    <!--<select name="produto" id="produto" class="browser-default"
                                            v-model="pesquisa.produto">
                                        <option selected="selected" value="">...</option>
                                        <option v-for="produto in ProdutoRamo" v-bind:value="produto.descricao">
                                            {{produto.descricao}}
                                        </option>
                                    </select>-->
                                    <Select2 v-model="pesquisa.produto" :options="ProdutoRamo"></Select2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12" v-if="ok">
                                <button class="btn btn-success btn-buscar" @click="buscar(false)">Buscar</button>
                            </div>
                            <div class="col s12" v-else>
                                <button class="btn btn-success btn-buscar" @click="modalrequire">Buscar</button>
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
                show: [],
                estados: estados,
                cidades: cidades,
                ramos: [],
                ok: false,
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
                pagination: {
                    lastPage: '',
                    total: '',
                    lastPageUrl: '',
                    nextPageUrl: '',
                    prevPageUrl: '',
                    current_page: 1,
                    firstPageUrl: '',
                    from: '',
                    to: ''
                },
                offset: 4
            }
        },
        watch: {
            pesquisa: {
                handler(val) {
                    console.log('val', val);
                    if (val.estado) {
                        this.ok = true;
                        this.pagination.current_page = 1;
                    } else if (val.cidade) {
                        this.ok = true;
                        this.pagination.current_page = 1;
                    } else if (val.ramo) {
                        this.ok = true;
                        this.pagination.current_page = 1;
                    } else if (val.produto) {
                        this.ok = true;
                        this.pagination.current_page = 1;
                    } else {
                        this.ok = false;
                    }
                },
                deep: true
            }
        },
        computed: {
            pagesNumber() {
                console.log('computed', this.pagination)
                if (!this.pagination.to) {
                    return [];
                }
                let from = this.pagination.current_page - this.offset;
                if (from < 1) {
                    from = 1;
                }
                let to = from + (this.offset * 2);
                if (to >= this.pagination.lastPage) {
                    to = this.pagination.lastPage;
                }
                let pagesArray = [];
                console.log('from', from)
                console.log('to', to)

                for (let page = from; page <= to; page++) {
                    pagesArray.push(page);
                }
                return pagesArray;
            },
            ProdutoRamo() {
                let self = this;
                console.log('filtrado antes', this.produtos)
                console.log('filtrado antes', this.pesquisa.produto = '')
                var filtrado = [];
                this.produtos.map(function (prod) {
                    console.log('prod', prod)
                    console.log('ramo', self.pesquisa.ramo)
                    if (self.pesquisa.ramo.id) {
                        if (prod.ramo_id == self.pesquisa.ramo.id) {
                            prod.text = prod.descricao;
                            prod.id = prod.descricao;
                            filtrado.push(prod);
                        }
                    } else {
                        prod.text = prod.descricao;
                        prod.id = prod.descricao;
                        filtrado.push(prod);
                    }
                });
                filtrado.push({id: '...', text: '...', selected: true});
                this.pesquisa.produto = '...';
                console.log('filtrado', filtrado)
                return filtrado;
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
            imagem_ramo(obj) {
                switch (obj) {
                    case 'Agropecuário':
                        return 'agropecuario'
                        break;
                    case 'Consumo':
                        return 'consumo';
                        break;
                    case 'Transporte':
                        return 'transporte';
                        break;
                    case 'Saúde':
                        return 'saude';
                        break;
                    case 'Infraestrutura':
                        return 'infraestrutura'
                        break;
                    case 'Crédito':
                        return 'credito';
                        break;
                    case 'Trabalho, Produção de bens e serviços':
                        return 'trabalho';
                        break;
                    default:
                        return 'nenhum-resultado';
                }
            },
            changePage(page) {
                this.pagination.current_page = page;
                this.buscar();
            },
            toogleicon(index) {
                console.log(index);
                if (this.show[index]) {
                    this.show = []
                    this.show[index] = false;
                } else {
                    this.show = []
                    this.show[index] = true;
                }
            },
            modalrequire() {
                Swal.fire({
                    title: 'Escolha pelomenos, 1 item do formulário',
                    html: 'É nescessário escolher pelomenos 1 item do formulário',
                });
            },
            getCidades() {
                return new Promise((resolve, reject) => {
                    this.pesquisa.cidade = '';
                    this.cidadesFiltradas = [];
                    this.cidades.forEach(item => {
                        if (item.Estado == this.pesquisa.estado.ID)
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
            configPagination(data) {
                this.pagination.lastPage = data.last_page;
                this.pagination.currentPage = data.current_page;
                this.pagination.total = data.total;
                this.pagination.lastPageUrl = data.last_page_url;
                this.pagination.nextPageUrl = data.next_page_url;
                this.pagination.prevPageUrl = data.prev_page_url;
                this.pagination.firstPageUrl = data.first_page_url;
                this.pagination.from = data.from;
                this.pagination.to = data.to;
                console.log('paginacao', this.pagination)
            },
            buscar(carregaMais = false) {
                this.resultado.data = [];
                this.show = [];
                this.search.estado = this.pesquisa.estado;
                this.search.cidade = this.pesquisa.cidade;
                this.search.ramo = this.pesquisa.ramo.descricao;
                this.search.produto = this.pesquisa.produto;

                let url = '/api/pesquisa?search=';
                let attr = 0;
                if (this.pesquisa.ramo.descricao) {
                    url += 'ramo.descricao:' + this.pesquisa.ramo.descricao;
                    attr++;
                }
                if (this.pesquisa.produto != '' && this.pesquisa.produto != '...') {
                    if (attr > 0) {
                        url += ';';
                    }
                    url += 'coopProdutos.produto.descricao:' + this.pesquisa.produto;
                    attr++;
                }
                if (attr > 1) {
                    url += '&searchJoin=and';
                } else {
                    attr = 0;
                }


                url += ('&page=' + this.pagination.current_page);
                url += ('&cidade=' + this.pesquisa.cidade);
                url += ('&estado=' + this.pesquisa.estado.Nome);


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
                    this.configPagination(response.data.data);
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
