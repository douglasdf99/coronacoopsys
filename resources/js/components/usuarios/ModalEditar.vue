<template>
    <modal name="usuario-editar"
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
                                <h3 class="mb-2">Editar <b>Usuário</b></h3>
                            </div>
                            <div class="botaofechar">
                                <button class="btn btn-primary" @click="fechar">x</button>
                            </div>
                            <hr>
                            <div class="text-left mt-0">
                                <form id="editaitem" enctype="multipart/form-data" @submit="checkForm"
                                      class="parsley-examples" autocomplete="off">
                                    <div class="invalid-feedback  d-block" v-if="errors.avatar">
                                        {{errors.avatar[0]}}
                                    </div>
                                    <div class="uploader"
                                         @dragenter="OnDragEnter"
                                         @dragleave="OnDragLeave"
                                         @dragover.prevent
                                         @drop="onDrop"
                                         :class="{ dragging: isDragging }">
                                        <div class="images-preview justify-content-center align-items-center d-flex"
                                             v-if="usuario.avatar && !images.length">
                                            <div class="img-wrapper">
                                                <img :src="url_redirect(usuario.avatar)"
                                                     class="img-fluid rounded-circle" width="120">
                                                <div class="details justify-content-center align-items-center d-flex">
                                                    <div class="upload-control">
                                                        <label for="file">Alterar Arquivo</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div v-show="!usuario.avatar">
                                            <div v-show="!images.length">
                                                <i class="fa fa-cloud-upload"></i>
                                                <p>Arraste para aqui</p>
                                                <div>OU</div>
                                                <div class="file-input">
                                                    <label for="file">Selecione o Avatar</label>
                                                    <input type="file" id="file" @change="onInputChange">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="images-preview justify-content-center align-items-center d-flex"
                                             v-show="images.length">
                                            <div class="img-wrapper" v-for="(image, index) in images" :key="index">
                                                <img :src="image" :alt="`Image Uplaoder ${index}`"
                                                     class="img-fluid rounded-circle" width="120">
                                                <div class="details justify-content-center align-items-center d-flex">
                                                    <span class="name" v-text="files[index].name"></span>
                                                    <span class="size" v-text="getFileSize(files[index].size)"></span>
                                                    <div class="upload-control">
                                                        <label for="file">Alterar Arquivo</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" id="id" name="id" value="4">
                                    <input type="hidden" value="1">
                                    <div class="invalid-feedback d-block" v-if="errors.name">
                                        {{errors.name[0]}}
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name">Nome completo:</label>
                                        <input required="required" v-model="usuario.name" name="name" type="text"
                                               id="name"
                                               class="form-control" autocomplete="off">
                                    </div>
                                    <div class="invalid-feedback d-block" v-if="errors.email">
                                        {{errors.email[0]}}
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="email">Email:</label>
                                        <input required="required" v-model="usuario.email" name="email" type="email"
                                               id="email"
                                               class="form-control">
                                    </div>
                                    <div class="invalid-feedback d-block" v-if="errors.password">
                                        {{errors.password[0]}}
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="senha">Senha:</label>
                                        <input name="senha" v-model="password" type="password" value="" id="senha"
                                               class="form-control" autocomplete="new-password">
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
                this.files = [];
                this.images = [];
                this.name = null;
                this.email = null;
                this.password = null;
                this.role_id = null;
                this.errors = {}
                console.log('limpa');
            },
            fechar() {
                this.stop = 0;
                this.$modal.hide('usuario-editar')
            },
            OnDragEnter(e) {
                e.preventDefault();
                this.dragCount++;
                this.isDragging = true;
                return false;
            },
            OnDragLeave(e) {
                e.preventDefault();
                this.dragCount--;
                if (this.dragCount <= 0)
                    this.isDragging = false;
            },
            onInputChange(e) {
                const files = e.target.files;
                Array.from(files).forEach(file => this.addImage(file));
            },
            onDrop(e) {
                e.preventDefault();
                e.stopPropagation();
                this.isDragging = false;
                const files = e.dataTransfer.files;
                Array.from(files).forEach(file => this.addImage(file));
            },
            addImage(file) {
                this.files.pop();
                if (!file.type.match('image.*')) {
                    this.$toastr.e(`${file.name} is not an image`);
                    return;
                }
                this.files.push(file);
                const img = new Image(),
                    reader = new FileReader();
                this.images.pop();
                reader.onload = (e) => this.images.push(e.target.result);
                reader.readAsDataURL(file);
            },
            getFileSize(size) {
                const fSExt = ['Bytes', 'KB', 'MB', 'GB'];
                let i = 0;

                while (size > 900) {
                    size /= 1024;
                    i++;
                }
                return `${(Math.round(size * 100) / 100)} ${fSExt[i]}`;
            },
            checkForm: function (e) {
                e.preventDefault();
                const formData2 = new FormData();
              Swal.fire({
                title: 'Editando Usuário!',
                html: 'Aguarde enquanto o usuário é editado',
                showConfirmButton: false,
                onBeforeOpen: () => {
                  Swal.showLoading()
                },
              });

                this.files.forEach(file => {
                    formData2.append('avatar', file, file.name);
                });
                formData2.append('_method', 'PUT');
                formData2.append('name', this.usuario.name);
                formData2.append('email', this.usuario.email);
                if ( this.password ) {
                    formData2.append('password', this.password);
                }
                console.log(formData2);
                console.log(this.usuario.name);
                axios.post(`/api/users/${this.usuario.id}`, formData2)
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
