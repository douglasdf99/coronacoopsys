<template>
    <div>
        <div id="menu-top" class="geral-header header-cadastrar">
            <menu-front :resultado="false" :contato="true"></menu-front>
        </div>
        <div class="div-geral-1">
            <div class="container">
                <div class="row row-resultado" style="margin-bottom: 1rem">
                    <!--<span class="span-resultado" style="width: 200px !important;display: flex;">Contato</span>-->
                    <ul class="tabs">
                        <li class="tab col s3">
                            <a href="#tab-cooperativa" v-bind:class="{'active' : (step == 1)}">
                                1. Dados da Cooperativa
                            </a>
                        </li>
                        <li class="tab col s4" v-bind:class="{'disabled' : (step < 2)}">
                            <a href="#tab-contato" v-bind:class="{'active' : (step == 2)}">
                                2. Dados para contato
                            </a>
                        </li>
                        <li class="tab col s5" v-bind:class="{'disabled' : (step < 3)}">
                            <a href="#tab-produtos" v-bind:class="{'active' : (step == 3)}">
                                3. Dados sobre produtos ou serviços ofertados
                            </a>
                        </li>
                    </ul>
                </div>
                <div id="tab-cooperativa" v-if="step == 1" class="row">
                    <div class="col l5 m12 s12">
                        <div class="div-titulo-cadastrar">
                            <span class="numero">1</span>
                            <p>Mapeamento de oferta de produtos e serviços. </p>
                        </div>
                    </div>
                    <div class="col s12 m12 l6 offset-l3">
                        <div class="row">
                            <div class="col s12">
                                <label for="cnpj">CNPJ *</label>
                                <input id="cnpj" style="border-radius: 5px; margin-top: 1rem" v-model="cnpj" name="nome"
                                       type="text"
                                       class="validate white" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label for="razao">Razão Social*</label>
                                <input id="razao" style="border-radius: 5px; margin-top: 1rem" v-model="razaosocial"
                                       type="email"
                                       class="validate white" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label for="nome">Nome Fantazia</label>
                                <input id="nome" style="border-radius: 5px; margin-top: 1rem" v-model="nome"
                                       type="email"
                                       class="validate white">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <div class="file-field input-field">
                                    <div class="btn">
                                        <span>File</span>
                                        <input type="file">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label for="telefone">Telefone *</label>
                                <input id="telefone" style="border-radius: 5px; margin-top: 1rem" v-model="telefone"
                                       type="text" class="validate white" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label for="whats">Whatsapp</label>
                                <input id="whats" style="border-radius: 5px; margin-top: 1rem" v-model="whatsapp"
                                       type="text" class="validate white">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label for="face">Facebook</label>
                                <input id="face" style="border-radius: 5px; margin-top: 1rem" v-model="facebook"
                                       type="text" class="validate white">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label for="insta">Instagram</label>
                                <input id="insta" style="border-radius: 5px; margin-top: 1rem" v-model="instagram"
                                       type="text" class="validate white">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label for="linkedin">Linkedin</label>
                                <input id="linkedin" style="border-radius: 5px; margin-top: 1rem" v-model="linkedin"
                                       type="text" class="validate white">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label for="site">Site</label>
                                <input id="site" style="border-radius: 5px; margin-top: 1rem" v-model="site" type="text"
                                       class="validate white">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label for="email">E-mail</label>
                                <input id="email" style="border-radius: 5px; margin-top: 1rem" v-model="email"
                                       type="email" class="validate white">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label for="cep">CEP</label>
                                <input id="cep" style="border-radius: 5px; margin-top: 1rem" v-model="cep" type="text"
                                       class="validate white">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <div class="div-select" style="margin: 0">
                                    <label for="estado" class="label">Estado *</label>
                                    <select v-model="estado" name="estado" id="estado"
                                            class="browser-default" required
                                            @change="getCidades()">
                                        <option selected="selected" value="">...</option>
                                        <option v-for="estado in estados" v-bind:value="estado">{{estado.Nome}} /
                                            {{estado.Sigla}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <div class="div-select" style="margin: 0">
                                    <label for="cidade" class="label">Cidade *</label>
                                    <select name="cidade" id="cidade" class="browser-default" required v-model="cidade">
                                        <option selected="selected" value="">...</option>
                                        <option v-for="cidade in cidadesFiltradas" v-bind:value="cidade.Nome">
                                            {{cidade.Nome}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label for="endereco">Endereço *</label>
                                <input id="endereco" style="border-radius: 5px; margin-top: 1rem" v-model="endereco"
                                       type="text" class="validate white">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label for="numero">Número *</label>
                                <input id="numero" style="border-radius: 5px; margin-top: 1rem" v-model="numero"
                                       type="text" class="validate white">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label for="complemento">Complemento *</label>
                                <input id="complemento" style="border-radius: 5px; margin-top: 1rem"
                                       v-model="complemento" type="text" class="validate white">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label for="bairro">Bairro</label>
                                <input id="bairro" style="border-radius: 5px; margin-top: 1rem" v-model="bairro"
                                       type="text" class="validate white">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <a @click="step = 2" class="btn btn-success btn-buscar"
                                   style="float: right;">PRÓXIMO
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab-contato" v-if="step == 2" class="row">
                    <div class="col l6 m12 s12">
                        <div class="div-titulo-cadastrar">
                            <span class="numero">2</span>
                            <p>Responsável direto pelo cadastro da cooperativa no sistema.</p>
                        </div>
                    </div>
                    <div class="col s12 m12 l6 offset-l3">
                        <div class="row">
                            <div class="col s12">
                                <label for="nome_contato">Nome Completo *</label>
                                <input id="nome_contato" style="border-radius: 5px; margin-top: 1rem"
                                       v-model="nome_contato"
                                       type="text" class="validate white" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label for="cargo">Cargo Função *</label>
                                <input id="cargo" style="border-radius: 5px; margin-top: 1rem" v-model="cargo"
                                       type="text" class="validate white" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label for="telefone_contato">Telefone para contato*</label>
                                <input id="telefone_contato" style="border-radius: 5px; margin-top: 1rem"
                                       v-model="telefone_contato"
                                       type="text" class="validate white" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label for="email_contato">E-mail *</label>
                                <input id="email_contato" style="border-radius: 5px; margin-top: 1rem"
                                       v-model="email_contato"
                                       type="text" class="validate white" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label for="email_contato_confirmed">Confirmar E-mail *</label>
                                <input id="email_contato_confirmed" style="border-radius: 5px; margin-top: 1rem"
                                       v-model="email_contato_confirmed"
                                       type="text" class="validate white" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <a @click="step = 3" class="btn btn-success btn-buscar"
                                   style="float: right;">PRÓXIMO
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab-produtos" v-if="step == 3" class="row">
                    <div class="col l6 m12 s12">
                        <div class="div-titulo-cadastrar">
                            <span class="numero">3</span>
                            <p>O levantamento de produtos ofertados é muito importante para o resultado de busca dos
                                clientes.</p>
                        </div>
                    </div>
                    <div class="col s12 m12 l6 offset-l3">
                        <p class="pergunta">Qual é a área de atuação para venda que sua cooperativa consegue atender?
                            *</p>
                        <div class="checkboxes">
                            <div class="row">
                                <div class="col s6">
                                    <label>
                                        <input type="checkbox" class="filled-in"/>
                                        <span>Nacional</span>
                                    </label>
                                </div>
                                <div class="col s6">
                                    <label>
                                        <input type="checkbox" class="filled-in"/>
                                        <span>Estadual</span>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s6">
                                    <label>
                                        <input type="checkbox" class="filled-in"/>
                                        <span>Municipal</span>
                                    </label>
                                </div>
                                <div class="col s6">
                                    <label>
                                        <input type="checkbox" class="filled-in"/>
                                        <span>Local</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="div-endereco-atuacao col s12">
                                <div class="row">
                                    <div class="col s12" style="margin-bottom: 1rem">
                                        <p>O endereco de atuação é o mesmo da cooperativa?</p>
                                        <label class="checklabel">
                                            <input type="checkbox" class="filled-in"/>
                                            <span>Sim</span>
                                        </label>
                                        <label class="checklabel">
                                            <input type="checkbox" class="filled-in"/>
                                            <span>Não</span>
                                        </label>
                                    </div>
                                    <div class="col s12">
                                        <label for="endereco_atuacao" class="white-text">Endereço de atuação</label>
                                        <input id="endereco_atuacao" style="border-radius: 5px; margin-top: 1rem"
                                               v-model="endereco_atuacao" type="text"
                                               class="validate white">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="pergunta">Você autoriza o compartilhamento dos seus dados para potenciais compradores? *</p>
                        <div class="checkboxes">
                            <div class="row">
                                <div class="col s6">
                                    <label>
                                        <input type="checkbox" class="filled-in"/>
                                        <span>Sim</span>
                                    </label>
                                </div>
                                <div class="col s6">
                                    <label>
                                        <input type="checkbox" class="filled-in"/>
                                        <span>Não</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <p class="pergunta">Você quer vender? *</p>
                        <div class="checkboxes">
                            <div class="row">
                                <div class="col s6">
                                    <label>
                                        <input type="checkbox" class="filled-in"/>
                                        <span>Produtos</span>
                                    </label>
                                </div>
                                <div class="col s6">
                                    <label>
                                        <input type="checkbox" class="filled-in"/>
                                        <span>Serviços</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="div-select" style="margin: 1rem 0">
                            <label for="estado" class="label">Em qual ramo sua cooperativa está inserida? *</label>
                            <select v-model="ramo" name="estado" id="estado"
                                    class="browser-default" required>
                                <option selected="selected" value="">...</option>
                                <option v-for="ramo in ramos" v-bind:value="estado">{{estado.Nome}} /
                                    {{estado.Sigla}}
                                </option>
                            </select>
                        </div>
                        <p class="pergunta">Catálogo de produtos/serviços *</p>
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Inserir</span>
                                <input type="file">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import cidades from '../scripts/Cidades.json'
    import estados from '../scripts/Estados.json'

    export default {
        name: 'Cadastrar',
        created() {
            this.getRamos();
        },
        data() {
            return {
                step: 1,
                enviado: false,
                ramos: [],
                nome: '',
                razaosocial: '',
                cnpj: '',
                telefone: '',
                whatsapp: '',
                facebook: '',
                instagram: '',
                linkedin: '',
                site: '',
                email: '',
                cep: '',
                estados: estados,
                cidades: cidades,
                cidadesFiltradas: [],
                estado: '',
                cidade: '',
                endereco: '',
                numero: '',
                complemento: '',
                bairro: '',
                cargo: '',
                nome_contato: '',
                telefone_contato: '',
                email_contato: '',
                email_contato_confirmed: '',
                ramo: ''
            }
        },
        methods: {
            enviar(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Enviando..',
                    html: '',
                    showConfirmButton: false,
                    onBeforeOpen: () => {
                        Swal.showLoading()
                    },
                });
                axios.post('/enviar', {nome: this.nome, email: this.email, mensagem: this.mensagem}).then(response => {
                    console.log(response);
                    this.enviado = true;
                }).catch(erro => {
                    console.log(erro)
                }).finally(() => {
                    Swal.close();
                })
            },
            getCidades() {
                return new Promise((resolve, reject) => {
                    this.cidade = '';
                    this.cidadesFiltradas = [];
                    this.cidades.forEach(item => {
                        if (item.Estado == this.estado.ID)
                            this.cidadesFiltradas.push(item);
                    });
                    console.log(this.cidadesFiltradas);
                })
            },
            getRamos() {
                axios.get('/api/ramos').then(response => {
                    console.log(response)
                    this.ramos = response.data.data;
                })
            },
        }
    }
    $(document).ready(function () {
        $('textarea#mensagem').characterCounter();
        $('.tabs').tabs();
    });
</script>
<style scoped>
    textarea {
        border-left: unset;
        border-top: unset;
        border-right: unset;
        border-radius: 5px;
        height: auto;
    }

    .div-sucesso {
        position: fixed;
        top: 0;
        display: flex;
        height: 100vh;
        width: 100vw;
        background-color: #1c205cab;
        overflow: hidden;
        color: white;
        transition-duration: .5s
    }

    .obrigado {
        font-size: 1.5rem;
        font-weight: 700;
        margin: 0;
    }

    .div-sucesso .container {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .div-sucesso .close-btn-sidenav {
        position: absolute;
        right: 10%;
        top: 10%;
    }

    .tabs {
        display: flex;
        background: transparent;
    }

    .tabs a {
        color: #6784C1 !important;
        background: transparent !important;
        text-align: left;
    }

    .tabs .tab a.active {
        color: #6784C1 !important;
        font-weight: bold;
        border-bottom: 6px solid #6784C1;
    }

    .div-titulo-cadastrar {
        display: flex;
        align-items: center;
    }

    .div-titulo-cadastrar .numero {
        margin-right: 2rem;
    }

    .pergunta {
        font-size: 1.3rem;
        color: #1C205C;
        margin-bottom: 1rem;
    }

    .div-endereco-atuacao {
        padding: 1rem;
        background: #BCBCBC;
        border-radius: 5px;
    }

    .div-endereco-atuacao p {
        margin: 0 0 1rem;
        font-size: 1.3rem;
        color: white;
    }

    .div-endereco-atuacao .checklabel {
        margin: 0 1rem;
        color: white;
    }
</style>
