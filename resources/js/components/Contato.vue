<template>
    <div>
        <div id="menu-top" class="geral-header header-contato">
            <menu-front :resultado="false" :contato="true"></menu-front>
        </div>
        <div class="div-geral-1">
            <div class="container">
                <div class="row row-resultado">
                    <div class="col s12">
                        <span class="span-resultado" style="width: 200px !important;display: flex;">Contato</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col l3 offset-l1 m12 s12 hide-on-med-and-down">
                        <span class="span-pesquise center-align">Não achou o que precisa?</span>
                        <p>
                            Escreva pra gente! <br>
                            Além de ouvir a sua necessidade, será um prazer ajudar.
                        </p>
                    </div>
                    <form class="col l4 m12 s12" method="POST" @submit="enviar">
                        <div class="row">
                            <div class="col s12">
                                <label for="nome">Nome *</label>
                                <input id="nome" style="border-radius: 5px; margin-top: 1rem" v-model="nome" name="nome" type="text"
                                       class="validate white" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label for="email">E-mail*</label>
                                <input id="email" style="border-radius: 5px; margin-top: 1rem" v-model="email" name="email" type="email"
                                       class="validate white" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label for="mensagem">Mensagem *</label>
                                <textarea rows="7" id="mensagem" name="mensagem" class="mt-1 validate white" v-model="mensagem" required
                                          data-length="240"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <button class="btn btn-success btn-buscar" type="submit" style="float: right;">ENVIAR
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="col l1 show-on-large-only"></div>
                    <div class="col l3 m12 s12">
                        <p class="contatos">
                            somoscooperativismo.coop.br
                            nucleo@ocb.coop.br
                        </p>
                        <p class="contatos">
                            Setor de Autarquias Sul, <br>
                            Quadra 04, Bloco “I” <br>
                            70070-936 – Brasília-DF
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="enviado" class="div-sucesso">
            <i class="material-icons close-btn-sidenav" style="float: right; cursor: pointer" @click="enviado = false">close</i>
            <div class="container relative">
                <div class="row">
                    <div class="col s12 center-align">
                        <p class="obrigado">Obrigado pela mensagem!</p>
                        <span>Esperamos em breve trazer alguma solução pra você.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'Contato',
        data() {
            return {
                enviado: false,
                nome: '',
                email: '',
                mensagem: '',
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
                }).finally(()=>{
                  Swal.close();
                })
            }
        }
    }
    $(document).ready(function () {
        $('textarea#mensagem').characterCounter();
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
</style>
