<template>
    <modal name="ramo-editar"
           transition="nice-modal-fade"
           classes="demo-modal-class"
           :min-width="200"
           :min-height="200"
           :pivot-y="0.5"
           :adaptive="true"
           :scrollable="true"
           :reset="true"
           width="40%"
           height="auto"
           @before-open="beforeOpen"
           @opened="opened"
           @closed="closed"
           @before-close="beforeClose">
        <div class="size-modal-content">
            <div class="row">
                <div class="col-xl-12">
                    <div class="row justify-content-center">
                        <div class="col-xl-10">
                            <!-- Pricing Title-->
                            <div class="text-center mb-3">
                                <h3 class="mb-2">Editar <b>Ramo</b></h3>
                            </div>
                            <div class="botaofechar">
                                <button class="btn btn-primary" @click="fechar">x</button>
                            </div>
                            <hr>
                            <div class="text-left mt-0">
                                <form id="editaitem" enctype="multipart/form-data" @submit="checkForm"
                                      class="parsley-examples" autocomplete="off">
                                    <div class="invalid-feedback d-block" v-if="errors.descricao">
                                        {{errors.descricao[0]}}
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name">Descrição:</label>
                                        <input required="required" v-model="ramo.descricao" name="name" type="text"
                                               id="name"
                                               class="form-control" autocomplete="off">
                                    </div>
                                    <!-- Submit Field -->
                                    <div class="form-group d-flex float-right">
                                        <a @click="fechar" class="btn btn-light">Cancelar</a>
                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- end row -->
                    </div> <!-- end col-->
                    <!-- Plans -->
                </div> <!-- end col -->
            </div>
        </div>
    </modal>
</template>
<script>
    export default {
        props: ['ramo', 'client', 'filtered'],
        name: 'SizeModalTest',
        data() {
            return {
                descricao: null,
                email: null,
                password: null,
                role_id: null,
                roles: [],
                isDragging: false,
                dragCount: 0,
                stop: 1,
                files: [],
                images: [],
                paragraphs: [true],
                timer: null,
                errors: {},
                error: 0
            }
        },
        computed: {
            uploadDisabled() {
                return this.files.length === 0;
            }

        },
        methods: {
            carregaimagem() {
                this.files.length === 1;
            },
            beforeOpen(event) {

            },
            beforeClose(event) {
                console.log('fechou');

                if (this.stop > 0) {
                    /*
                    Stopping close event execution
                    */
                    event.stop()
                }
            },
            opened(e) {

                this.stop = 1;
                // e.ref should not be undefined here
                console.log('opened', e)
                console.log('ref', e.ref)
            },
            closed(e) {
                this.limpaform();
                console.log('closed', e)
            },
            limpaform() {

                this.descricao = null;

                console.log('limpa');
            },
            fechar() {
                this.stop = 0;
                this.$modal.hide('ramo-editar')
            },

            checkForm: function (e) {
                e.preventDefault();
                const formData2 = new FormData();
              Swal.fire({
                title: 'Editando Ramo!',
                html: 'Aguarde enquanto o ramo é editado',
                showConfirmButton: false,
                onBeforeOpen: () => {
                  Swal.showLoading()
                },
              });


                formData2.append('_method', 'PUT');
                formData2.append('descricao', this.ramo.descricao);
                console.log(formData2);
                axios.post(`/api/ramos/${this.ramo.id}`, formData2)
                    .then(response => {
                        this.error = 0;
                        console.log(response)
                      Swal.fire({
                        title: 'Sucesso!',
                        text: response.data.message,
                        type: 'success',
                        showConfirmButton: false,
                        timer: 1500
                      });
                    }).catch(errors => {
                    this.error = 1;
                    console.log('erros', errors.response.data.errors);
                    this.errors = errors.response.data.errors;
                    console.log(this.errors);
                      Swal.fire({
                        title: 'Algo deu errado!',
                        text: '',
                        type: 'error',
                        showConfirmButton: false,
                        timer: 1500
                      });
                })
                    .finally(response => {
                        console.log(response);
                        if (this.error == 0) {
                            this.fechar()
                            this.$emit('paginate');
                        }
                    });
            },
        }
    }
</script>
<style>
    .size-modal-content {
        padding: 10px;
        font-style: 13px;
    }

    .v--modal-overlay[data-modal="size-modal"] {
        background: rgba(0, 0, 0, 0.5);
    }

    .demo-modal-class {
        border-radius: 5px;
        background: #FFFFFF;
        box-shadow: 5px 5px 30px 0px rgba(46, 61, 73, 0.6);
    }
</style>
<style lang="scss" scoped>
    .botaofechar {
        position: absolute;
        top: 0;
        right: 0;
        margin-top: 5px;
    }

    .uploader {
        width: 100%;
        background: #fff;
        color: #0c0808;
        padding: 40px 15px;
        text-align: center;
        border-radius: 10px;
        border: 3px dashed #fff;
        font-size: 20px;
        position: relative;

        &.dragging {
            background: #fff;
            color: #2196F3;
            border: 3px dashed #e7e7e7;

            .file-input label {
                background: #f0f2f4;
                color: #fff;
            }
        }

        i {
            font-size: 85px;
        }

        .file-input {
            width: 200px;
            margin: auto;
            height: 68px;
            position: relative;

            label,
            input {
                background: #f1f5f7;
                color: #0c0808;
                width: 100%;
                position: absolute;
                left: 0;
                top: 0;
                font-size: 18px;
                padding: 10px;
                border-radius: 4px;
                margin-top: 7px;
                cursor: pointer;
            }

            input {
                opacity: 0;
                z-index: -2;
            }
        }

        .images-preview {
            display: flex;
            flex-wrap: wrap;

            .img-wrapper {
                width: auto;
                display: flex;
                /*/flex-direction: column;*/
                margin: 10px;

                justify-content: space-between;
                background: #fff0;
                //box-shadow: 5px 5px 20px #3e3737;
                img {
                    max-height: 200px;
                    max-width: 200px;
                    width: 100%;
                }
            }

            .details {
                font-size: 12px;
                background: #fff;
                color: #000;
                display: flex;
                flex-direction: column;
                align-items: self-start;
                padding: 3px 6px;

                .name {
                    overflow: hidden;
                    height: 18px;
                }
            }
        }

        .upload-control {
            button, label {
                background: #7e57c2;
                border: 2px solid #7e57c2;
                border-radius: 3px;
                color: #fff;
                font-size: 15px;
                cursor: pointer;
            }

            label {
                padding: 2px 5px;
            }
        }

    }
</style>
