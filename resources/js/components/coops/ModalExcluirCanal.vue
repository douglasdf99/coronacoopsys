<template>
    <modal name="canal-excluir"
           transition="nice-modal-fade"
           classes="demo-modal-class"
           :min-width="200"
           :min-height="200"
           :pivot-y="0.5"
           :adaptive="true"
           :scrollable="true"
           :reset="true"
           :width="width"
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
                                <h3 class="mb-2">Excluir <b>Canal</b></h3>
                            </div>
                            <!--               <div class="botaofechar">
                                               <button class="btn btn-primary" @click="fechar">x</button>
                                           </div>-->
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <div class="text-left mt-0 mb-3 font-15 text-center">
                                        Você tem certeza que deseja <span
                                        class="text-danger font-weight-bold">remover</span> esse <b>canal</b>?
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group d-flex float-right">
                                        <a @click="fechar" class="btn btn-light">Cancelar</a>
                                        <button type="button" @click="checkForm" class="btn btn-danger">Remover</button>
                                    </div>
                                </div>
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
        props: ['usuario', 'client', 'filtered'],
        name: 'SizeModalTest',
        data() {
            return {
                name: null,
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
            },
          widht(){
            if (window.innerWidth > 500) {
              return window.innerWidth * 0.4;
            }
            else{
              return window.innerWidth * 0.8;
            }
          }
        },
        methods: {
            beforeOpen(event) {

            },
            beforeClose(event) {

            },
            opened(e) {
                // e.ref should not be undefined here
                console.log('opened', e)
                console.log('ref', e.ref)
            },
            closed(e) {
                console.log('closed', e)
            },
            fechar() {
                this.$modal.hide('canal-excluir')
            },
            checkForm: function (e) {
                e.preventDefault();

                const formData2 = new FormData();
              Swal.fire({
                title: 'Removendo Canal',
                html: 'Aguarde enquanto a canal é removido',
                showConfirmButton: false,
                onBeforeOpen: () => {
                  Swal.showLoading()
                },
              });

                formData2.append('_method', 'DELETE');
                formData2.append('id', this.usuario);

                axios.post(`/api/coop_canais/${this.usuario}`, formData2)
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
                    })
                    .catch(errors => {
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
