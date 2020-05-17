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
                                       type="text" class="validate white" required v-mask="'##.###.###/####-##'">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label for="razao">Razão Social*</label>
                                <input id="razao" style="border-radius: 5px; margin-top: 1rem" v-model="razao"
                                       type="text"
                                       class="validate white" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label for="nome">Nome Fantasia</label>
                                <input id="nome" style="border-radius: 5px; margin-top: 1rem" v-model="nome"
                                       type="text"
                                       class="validate white">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label for="file">Logo <span class="help">(Imagem com o fundo branco ou transparente, até 1MB)</span></label>
                                <div class="file-field input-field">
                                    <div class="btn">
                                        <span>Selecione o arquivo</span>
                                        <input type="file" @change="setLogo" accept="image/png, image/jpeg">
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
                                       type="text" class="validate white" required v-mask="'(##) #####-####'">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label for="whats">Whatsapp</label>
                                <input id="whats" style="border-radius: 5px; margin-top: 1rem" v-model="whatsapp"
                                       type="text" class="validate white" v-mask="'(##) #####-####'">
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
                                       class="validate white" v-mask="'##.###-###'">
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
                                <a @click="nextStep(1)" class="btn btn-success btn-buscar"
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
                                <label for="contato_nome">Nome Completo *</label>
                                <input id="contato_nome" style="border-radius: 5px; margin-top: 1rem"
                                       v-model="contato_nome"
                                       type="text" class="validate white" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label for="contato_cargo">Cargo Função *</label>
                                <input id="contato_cargo" style="border-radius: 5px; margin-top: 1rem"
                                       v-model="contato_cargo"
                                       type="text" class="validate white" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label for="contato_telefone">Telefone para contato*</label>
                                <input id="contato_telefone" style="border-radius: 5px; margin-top: 1rem"
                                       v-model="contato_telefone" type="text" class="validate white" required
                                       v-mask="'(##) #####-####'">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label for="contato_email">E-mail *</label>
                                <input id="contato_email" style="border-radius: 5px; margin-top: 1rem"
                                       v-model="contato_email"
                                       type="email" class="validate white" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label for="contato_email_confirmed">Confirmar E-mail *</label>
                                <input id="contato_email_confirmed" style="border-radius: 5px; margin-top: 1rem"
                                       v-model="contato_email_confirmed"
                                       type="email" class="validate white" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <a @click="step = 1" class="btn btn-primary" style="float: left">Voltar</a>
                                <a @click="nextStep(2)" class="btn btn-success btn-buscar"
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
                                        <input type="checkbox" @click="changeArea('nacional')" v-model="nacional"
                                               class="filled-in"/>
                                        <span>Nacional</span>
                                    </label>
                                </div>
                                <div class="col s6">
                                    <label>
                                        <input type="checkbox" @click="changeArea('estadual')" v-model="estadual"
                                               class="filled-in"/>
                                        <span>Estadual</span>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s6">
                                    <label>
                                        <input type="checkbox" @click="changeArea('municipal')" v-model="municipal"
                                               class="filled-in"/>
                                        <span>Municipal</span>
                                    </label>
                                </div>
                                <div class="col s6">
                                    <label>
                                        <input type="checkbox" @click="changeArea('local')" v-model="local"
                                               class="filled-in"/>
                                        <span>Local</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row" v-if="local">
                            <div class="div-endereco-atuacao col s12">
                                <div class="row">
                                    <div class="col s12" style="margin-bottom: 1rem">
                                        <p>O endereco de atuação é o mesmo da cooperativa?</p>
                                        <label class="checklabel">
                                            <input type="checkbox" @click="needEndereco(true)" class="filled-in"
                                                   v-model="need_endereco_atuacao_sim"/>
                                            <span>Sim</span>
                                        </label>
                                        <label class="checklabel">
                                            <input type="checkbox" @click="needEndereco(false)"
                                                   v-model="need_endereco_atuacao_nao" class="filled-in"/>
                                            <span>Não</span>
                                        </label>
                                    </div>
                                    <div class="col s12" v-if="need_endereco_atuacao_nao">
                                        <label for="endereco_atuacao" class="white-text">Endereço de atuação</label>
                                        <input id="endereco_atuacao" style="border-radius: 5px; margin-top: 1rem"
                                               v-model="endereco_atuacao" type="text"
                                               class="validate white">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="pergunta">Você autoriza o compartilhamento dos seus dados para potenciais compradores?
                            *</p>
                        <div class="checkboxes">
                            <div class="row">
                                <div class="col s6">
                                    <label>
                                        <input type="checkbox" @click="autorizaCompartilhar(true)" v-model="autoriza"
                                               class="filled-in"/>
                                        <span>Sim</span>
                                    </label>
                                </div>
                                <div class="col s6">
                                    <label>
                                        <input type="checkbox" @click="autorizaCompartilhar(false)"
                                               v-model="naoAutoriza" class="filled-in"/>
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
                                        <input type="checkbox" v-model="vende_produto" class="filled-in"/>
                                        <span>Produtos</span>
                                    </label>
                                </div>
                                <div class="col s6">
                                    <label>
                                        <input type="checkbox" v-model="vende_servico" class="filled-in"/>
                                        <span>Serviços</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="div-select" style="margin: 1rem 0">
                            <label for="ramo_id" class="label">Em qual ramo sua cooperativa está inserida? *</label>
                            <select v-model="ramo_id" name="ramo_id" id="ramo_id"
                                    class="browser-default" required>
                                <option selected="selected" value="">...</option>
                                <option v-for="ramo in ramos" v-bind:value="ramo.id">
                                    {{ramo.descricao}}
                                </option>
                            </select>
                        </div>
                        <p class="pergunta">Catálogo de produtos/serviços * <span
                                class="help">(Somente arquivos em PDF)</span></p>
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Selecione o arquivo</span>
                                <input type="file" @change="setCatalogo"
                                       accept="application/pdf,application/vnd.ms-excel">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                        <p class="pergunta">Insira até 10 produtos ou serviços que deseja comercializar. Tente não
                            utilizar abreviações, para facilitar a comunicação.</p>
                        <span class="help">(informe um único produto ou serviço por caixa de texto)</span>
                        <div class="row">
                            <div class="col s12">
                                <input placeholder="Ex.: Chocolate Ao Leite"
                                       style="border-radius: 5px; margin-top: 1rem" v-for="(prod, index) in produtos"
                                       v-model="produtos[index]" type="text" class="validate white">
                            </div>
                            <div class="col s12">
                                <div class="div-add">
                                    <i class="material-icons btn-add" style="font-size: 3rem; cursor: pointer;"
                                       @click="add('produto')" v-if="produtos.length < 11">add_box</i>
                                </div>
                            </div>
                        </div>
                        <p class="pergunta">Quais são os principais canais de entrega que
                            sua cooperativa está utilizando para comercializar
                            seus produtos/serviços (e-commerce, delivery,
                            varejo, etc)? *
                        </p>
                        <span class="help">(informe um único canal por caixa de texto)</span>
                        <div class="row">
                            <div class="col s12">
                                <select v-for="(canal, index) in canais" v-model="canais[index]" name="canais"
                                        id="canais"
                                        class="browser-default" required style="margin: 1rem 0">
                                    <option selected="selected" value="">...</option>
                                    <option v-for="canal in canaisOptions" v-bind:value="canal.id">
                                        {{canal.descricao}}
                                    </option>
                                </select>
                            </div>
                            <div class="col s12">
                                <div class="div-add">
                                    <i class="material-icons btn-add" style="font-size: 3rem; cursor: pointer;"
                                       @click="add('canal')" v-if="canais.length < 11">add_box</i>
                                </div>
                            </div>
                        </div>
                        <p class="pergunta">Como o Sistema OCB pode ajudar com os desafios trazidos pela Covid-19?
                        </p>
                        <span class="help">(Ajude-nos com ideias, sugestões e melhorias)</span>
                        <textarea rows="7" id="ajuda" name="ajuda" class="mt-1 validate white" v-model="ajuda" required
                                  data-length="240"></textarea>
                        <div class="row" style="margin-top: 1rem">
                            <div class="col s12">
                                <a @click="step = 2" class="btn btn-primary" style="float: left">Voltar</a>
                                <a @click="enviar" class="btn btn-success btn-buscar"
                                   style="float: right;">ENVIAR
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="enviado" class="div-sucesso">
            <i class="material-icons close-btn-sidenav" style="float: right; cursor: pointer" @click="enviado = false">close</i>
            <div class="container relative">
                <div class="row">
                    <div class="col l8 offset-l2 m12 s12 center-align">
                        <p class="obrigado">Obrigado pela sua contribuição!</p>
                        <span>Seu formulário foi enviado para equipe responsável. Em caso de dúvida,
                            entre em contato pelo endereço de email <a href="mailto:nucleo@ocb.coop.br" target="_blank" class="coop_link">nucleo@ocb.coop.br</a>.</span> <br>
                        <p style="margin: 1rem 0"><b>Aproveite e conheça o carimbo <a href="https://somos.coop.br" target="_blank" class="coop_link">SomosCoop</a>.</b></p>
                        <p>Atenciosamento, <br> Sistema OCB</p>
                    </div>
                    <div class="col s12 center-align">
                        <button class="btn btn-retorno" @click="enviado = false">RETORNAR</button>
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
            this.getCanais();
        },
        data() {
            return {
                step: 1,
                isValid: false,
                enviado: false,
                ramos: [],
                cnpj: '',
                nome: '',
                razao: '',
                site: '',
                email: '',
                logo: [],
                telefone: '',
                whatsapp: '',
                cep: '',
                endereco: '',
                estado: '',
                cidade: '',
                numero: '',
                complemento: '',
                bairro: '',
                compartilhamento: true,
                ramo_id: '',
                catalogo: [],
                facebook: '',
                instagram: '',
                linkedin: '',
                estados: estados,
                cidades: cidades,
                cidadesFiltradas: [],
                contato_cargo: '',
                contato_nome: '',
                contato_telefone: '',
                contato_email: '',
                contato_email_confirmed: '',
                ajuda: '',
                produtos: [''],
                canais: [''],
                canaisOptions: [],
                nacional: false,
                estadual: false,
                municipal: false,
                local: false,
                need_endereco_atuacao_nao: false,
                need_endereco_atuacao_sim: false,
                endereco_atuacao: '',
                autoriza: true,
                naoAutoriza: false,
                tipo: '',
                vende_produto: true,
                vende_servico: false,
            }
        },
        methods: {
            enviar() {
                let erros = [];
                let self = this;
                if (!this.municipal && !this.nacional && !this.estadual && !this.local) {
                    erros.push('Área de Atuação')
                }
                if (this.ramo_id === '') {
                    erros.push('Ramo')
                }
                /*if (this.catalogo.length === 0) {
                    erros.push('Catálogo')
                }*/
                if (this.produtos.length == 0 || this.produtos[0] == '') {
                    erros.push('Produtos/Serviços Comercializados')
                }

                if (this.canais.length == 0 || this.canais[0] == '') {
                    erros.push('Canais')
                }

                if (this.need_endereco_atuacao_nao && this.endereco_atuacao === '') {
                    erros.push('Endereço de Atuação')
                }

                if (erros.length > 0) {
                    Swal.fire({
                        title: 'Oops! Verifique os campos abaixo',
                        text: 'Os campos abaixo precisam ser verificados:',
                        type: 'warning',
                        html: self.montaAlerta(erros),
                    });
                } else {
                    Swal.fire({
                        title: 'Enviando..',
                        html: '',
                        showConfirmButton: false,
                        onBeforeOpen: () => {
                            Swal.showLoading()
                        },
                    });
                    const formData2 = new FormData();
                    this.logo.forEach(file => {
                        formData2.append('logo', file, file.name);
                    });
                    this.catalogo.forEach(file2 => {
                        formData2.append('catalogo', file2, file2.name);
                    });
                    this.produtos.forEach(prod => {
                        formData2.append('produtos[]', prod);
                    });

                    this.canais.forEach(canal => {
                        formData2.append('canais[]', canal);
                    });

                    formData2.append('nome', this.nome);
                    formData2.append('razao', this.razao);
                    formData2.append('cnpj', this.cnpj);
                    formData2.append('email', this.email);
                    //formData2.append('matriz', this.matriz);
                    formData2.append('site', this.site);
                    formData2.append('telefone', this.telefone);
                    formData2.append('whatsapp', this.whatsapp);
                    formData2.append('ramo_id', this.ramo_id);
                    formData2.append('cep', this.cep);
                    formData2.append('estado', this.estado.Nome);
                    formData2.append('cidade', this.cidade);
                    formData2.append('endereco', this.endereco);
                    formData2.append('numero', this.numero);
                    formData2.append('contato_nome', this.contato_nome);
                    formData2.append('contato_telefone', this.contato_telefone);
                    formData2.append('contato_email', this.contato_email);
                    formData2.append('contato_cargo', this.contato_cargo);
                    formData2.append('ajuda', this.ajuda);
                    formData2.append('contato_cargo', this.contato_cargo);
                    formData2.append('contato_nome', this.contato_nome);
                    formData2.append('contato_telefone', this.contato_telefone);
                    formData2.append('contato_email', this.contato_email);
                    formData2.append('contato_email_confirmed', this.contato_email_confirmed);
                    formData2.append('complemento', this.complemento);
                    formData2.append('bairro', this.bairro);
                    formData2.append('instagram', this.instagram);
                    formData2.append('linkedin', this.linkedin);
                    formData2.append('facebook', this.facebook);
                    formData2.append('vende_produto', this.vende_produto);
                    formData2.append('vende_servico', this.vende_servico);
                    formData2.append('tipo', this.tipo);

                    if (this.compartilhamento) {
                        formData2.append('compartilhamento', 1);
                    } else {
                        formData2.append('compartilhamento', 0);
                    }
                    if (this.nacional) {
                        formData2.append('area', 'nacional');
                    }
                    if (this.estadual) {
                        formData2.append('area', 'estadual');
                    }
                    if (this.municipal) {
                        formData2.append('area', 'municipal');
                    }
                    if (this.local) {
                        formData2.append('area', 'local');
                            formData2.append('endereco_atuacao', this.endereco_atuacao);

                    }

                    axios.post('api/enviar-coop', formData2).then(response => {
                        console.log(response);
                        this.enviado = true;
                    }).catch(erro => {
                        console.log(erro)
                    }).finally(() => {
                        Swal.close();
                    })
                }
            },
            autorizaCompartilhar(val) {
                if (val) {
                    this.naoAutoriza = false;
                    this.compartilhamento = true;
                } else {
                    this.autoriza = false;
                    this.compartilhamento = false;
                }
            },
            needEndereco(val) {
                if (val) {
                    this.need_endereco_atuacao_nao = false;
                    this.need_endereco_atuacao_sim = true;
                    this.endereco_atuacao = this.endereco;
                } else {
                    this.need_endereco_atuacao_nao = true;
                    this.need_endereco_atuacao_sim = false;
                    this.endereco_atuacao = '';
                }
            },
            changeArea(val) {
                switch (val) {
                    case 'nacional':
                        this.estadual = false;
                        this.municipal = false;
                        this.local = false;
                        break;
                    case 'estadual':
                        this.nacional = false;
                        this.municipal = false;
                        this.local = false;
                        break;
                    case 'municipal':
                        this.estadual = false;
                        this.nacional = false;
                        this.local = false;
                        break;
                    case 'local':
                        this.estadual = false;
                        this.municipal = false;
                        this.nacional = false;
                        break;
                }

                this.tipo = val;
            },
            nextStep(val) {
                let erros = [];
                let self = this;
                //this.step = val + 1
                if (val == 1) {
                    if (this.cnpj === '' || this.cnpj.length != 17) {
                        erros.push('CNPJ')
                    }
                    if (this.razao === '') {
                        erros.push('Razão Social')
                    }
                    if (this.telefone === '' || this.telefone.length < 14) {
                        erros.push('Telefone')
                    }
                    if (this.estado === '') {
                        erros.push('Estado')
                    }
                    if (this.cidade === '') {
                        erros.push('Cidade')
                    }
                    if (this.endereco === '') {
                        erros.push('Endereco')
                    }
                    if (this.numero === '') {
                        erros.push('Número')
                    }
                    if (this.complemento === '') {
                        erros.push('Complemento')
                    }

                    if (erros.length > 0) {
                        Swal.fire({
                            title: 'Oops! Verifique os campos abaixo',
                            text: 'Os campos abaixo precisam ser verificados:',
                            type: 'warning',
                            html: self.montaAlerta(erros),
                        });
                    } else {
                        this.step = 2
                    }
                }
                if (val == 2) {
                    if (this.contato_nome === '') {
                        erros.push('Nome Completo')
                    }
                    if (this.contato_cargo === '') {
                        erros.push('Cargo')
                    }
                    if (this.contato_telefone === '' || this.contato_telefone.length < 14) {
                        erros.push('Telefone')
                    }
                    if (this.contato_email === '') {
                        erros.push('E-mail')
                    }

                    if (this.contato_email != this.contato_email_confirmed) {
                        erros.push('E-mail de confirmação difere')
                    }

                    if (erros.length > 0) {
                        Swal.fire({
                            title: 'Oops! Verifique os campos abaixo',
                            text: 'Os campos abaixo precisam ser verificados:',
                            type: 'warning',
                            html: self.montaAlerta(erros),
                        });
                    } else {
                        this.step = 3
                    }
                }
            },
            montaAlerta(erros) {
                let str = '';
                erros.forEach(erro => {
                    str += '<p>' + erro + '</p>';
                });

                return str;
            },
            setLogo(event) {
                const files = event.target.files;
                Array.from(files).forEach(file => this.logo.push(file));
                console.log(this.logo)
            },
            setCatalogo(event) {
                const files2 = event.target.files;
                Array.from(files2).forEach(file => this.catalogo.push(file));
                console.log(this.catalogo)

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
            getCanais() {
                axios.get('/api/canais').then(response => {
                    this.canaisOptions = response.data.data;
                })
            },
            add(val) {
                if (val == 'produto')
                    this.produtos.push('');
                else
                    this.canais.push('');
            }
        }
    }
    $(document).ready(function () {
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
        /*background: #6784C1*/;
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

    input {
        padding-left: 1rem !important;
        width: 97% !important;
    }

    .div-add {
        background: #6784c133;
        border-radius: 5px;
        display: flex;
        width: 100%;
        flex-direction: row-reverse;
    }

    .help {
        color: #6784C1;
    }

    .checkboxes {
    }

    .coop_link {
        color: #88C754;
    }

    .coop_link:hover {
        text-decoration: underline;
    }

    .btn-retorno {
        background: #7db655;
        border-radius: 5px;
    }
</style>
