<template>
    <!-- Start Content-->
    <div class="container-fluid">
      <section class="users-edit"  v-if="item.nome">
        <a :href="url_redirect('admin/coops')" type="reset" class="btn btn-outline-primary">Voltar</a>

        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <ul class="nav nav-tabs mb-3" role="tablist">
                <li class="nav-item">
                  <a class="nav-link d-flex align-item1s-center active" id="account-tab" data-toggle="tab" href="#account"
                     aria-controls="account" role="tab" aria-selected="true">
                    <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">Informações principais</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab" href="#information"
                     aria-controls="information" role="tab" aria-selected="false">
                   <span class="d-none d-sm-block">Areas / Canais</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center" id="social-tab" data-toggle="tab" href="#social"
                     aria-controls="social" role="tab" aria-selected="false">
                   <span class="d-none d-sm-block">Produtos</span>
                  </a>
                </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">

                  <!-- users edit media object ends -->
                  <!-- users edit account form start -->
                  <form @submit="checkForm">
                    <!-- users edit media object start -->
                    <div class="media mb-2">
                      <div class="uploader"
                           @dragenter="OnDragEnter"
                           @dragleave="OnDragLeave"
                           @dragover.prevent
                           @drop="onDrop"
                           :class="{ dragging: isDragging }">
                        <div class="images-preview justify-content-center align-item1s-center d-flex"
                             v-if="item1.logo && !images.length">
                          <div class="img-wrapper">
                            <img :src="url_redirect(item1.logo)"
                                 class="users-avatar-shadow rounded" height="200" width="200">
                            <div class="details justify-content-center align-items-center d-flex">
                              <div class="upload-control">
                                <label for="file">Alterar Arquivo</label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div v-show="!item1.logo">
                          <div v-show="!images.length">
                            <i class="fa fa-cloud-upload"></i>
                            <p>Arraste para aqui</p>
                            <div>OU</div>
                            <div class="file-input">
                              <label for="file">Selecione a logo</label>
                              <input type="file" id="file" @change="onInputChange">
                            </div>
                          </div>
                        </div>
                        <div class="images-preview justify-content-center align-items-center d-flex"
                             v-show="images.length">
                          <div class="img-wrapper" v-for="(image, index) in images" :key="index">
                            <img :src="image" :alt="`Image Uplaoder ${index}`"
                                 class="users-avatar-shadow rounded" height="200" width="200">
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
                    </div>
                    <div class="row">
                      <div class="col-12 col-sm-6">
                        <h5 class="mb-1"><i class="feather icon-user mr-25"></i>Geral</h5>
                        <div class="row">
                          <div class="col-12">
                            <div class="form-group">
                              <div class="controls">
                                <label>Nome Fantasia</label>
                                <input type="text" class="form-control" required v-model="item1.nome">
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="controls">
                                <label>Razão social</label>
                                <input type="text" class="form-control"  v-model="item1.razao">
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="controls">
                                <label>CNPJ</label>
                                <input type="text" class="form-control" v-mask="'##.###.###/####-##'"  v-model="item1.cnpj" >
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="controls">
                                <label>E-mail</label>
                                <input type="email" class="form-control"  v-model="item1.email">
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="controls">
                                <label>Tipo</label>
                                <Select2 v-model="item1.matriz" :options="myOptions"/>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="controls">
                                <label>Site </label>
                                <input type="text" class="form-control"  v-model="item1.site">
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="controls">
                                <label>Telefone </label>
                                <input type="text" class="form-control"  v-model="item1.telefone" v-mask="'(##) #####-####'">
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="controls">
                                <label>Whatsapp </label>
                                <input type="text" class="form-control"  v-model="item1.whatsapp" v-mask="'(##) #####-####'">
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="controls">
                                <label>Compatilhamento </label>
                              </div>
                              <div class="custom-control custom-switch custom-switch-primary switch-md mr-2 mb-1">
                                <input v-model="compartilhamento" type="checkbox" class="custom-control-input" id="compartilhamento">
                                <label class="custom-control-label" for="compartilhamento">
                                  <span class="switch-text-left">Sim</span> <span class="switch-text-right">Não</span>
                                </label>
                              </div>

                            </div>

                            <div class="form-group">
                              <div class="controls">
                                <label >Ramo:</label>
                                <Select2 v-model="item1.ramo_id" :options="ramos" @change="myChangeEvent($event)" @select="mySelectEvent($event)" />
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="controls">
                                <label>Catálogo  -                                    <a :href="url_redirect(item1.catalogo)"  v-show="item1.catalogo">Fazer Download</a></label>

                                <h6>
                                  <div >

                                    <input type="file"  ref="myFiles"  @change="setcatalogo">
                                      <br>
                                    <label class="text-danger" v-show="item1.catalogo">Só escolha um arquivo caso queira substituir o atual</label>

                                  </div>

                                </h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-sm-6">
                        <h5 class="mb-1 mt-2 mt-sm-0"><i class="feather icon-map-pin mr-25"></i>Contato</h5>
                        <div class="form-group">
                          <div class="controls">
                            <label>Nome</label>
                            <input type="text" class="form-control"  v-model="item1.contato_nome">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="controls">
                            <label>Cargo</label>
                            <input type="text" class="form-control"  v-model="item1.contato_cargo">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="controls">
                            <label>Telefone</label>
                            <input type="text" class="form-control"  v-model="item1.contato_telefone">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="controls">
                            <label>Email</label>
                            <input type="email" class="form-control"  v-model="item1.contato_email">
                          </div>
                        </div>
                        <h5 class="mb-1 mt-2 mt-sm-0"><i class="feather icon-map-pin mr-25"></i>Endereço</h5>
                        <div class="form-group">
                          <div class="controls">
                            <label>cep</label>
                            <input type="text" class="form-control" v-mask="'##.###-###'" required v-model="item1.cep">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="controls">
                            <label>Estado </label>
                            <Select2 v-model="estado" :options="estdosCpm" @select="setEstado($event)"/>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="controls">
                            <label>Cidade </label>
                            <Select2 v-model="cidade" :options="cidadesCpm"  @select="setCidade($event)"/>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="controls">
                            <label>Endereco </label>
                            <input type="text" class="form-control"  v-model="item1.endereco">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="controls">
                            <label>Número </label>
                            <input type="text" class="form-control"  v-model="item1.numero">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="controls">
                            <label>Complemento </label>
                            <input type="text" class="form-control"  v-model="item1.complemento">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="controls">
                            <label>Bairro </label>
                            <input type="text" class="form-control" required  v-model="item1.bairro">
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group">
                          <div class="controls">
                            <label>Como pode ajudar </label>
                            <textarea type="text" class="form-control"  v-model="item1.ajuda"> </textarea>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                        <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Salvar</button>
                      </div>
                    </div>
                  </form>
                  <!-- users edit account form ends -->
                </div>

                <div class="tab-pane" id="information" aria-labelledby="information-tab" role="tabpanel">
                  <!-- users edit Info form start -->
                  <form novalidate>
                    <div class="row mt-1">
                      <div class="col-12 col-sm-6">
                        <div class="table-responsive border rounded px-1">
                          <h6 class="border-bottom py-2 mx-1 mb-0 font-medium-2">Áreas de atuação
                            <a href="#" v-if="!item1.areas" @click="showCriarArea()" class="btn btn-primary bt-sm waves-effect waves-light mb-2 float-right" data-overlayColor="#38414a">
                            Add
                          </a>
                          </h6>

                          <div class="row" v-if="item1.areas" >
                            <div class="col-12">
                              <table class="table table-borderless">
                                <thead>
                                <tr>
                                  <th>Tipo</th>
                                  <th>Estado</th>
                                  <th>Cidade</th>
                                  <th>Endereço</th>
                                  <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody >
                                <tr>
                                  <td>{{item1.areas.tipo}}</td>
                                  <td>
                                    {{item1.areas.estado}}
                                  </td>
                                  <td>
                                    {{item1.areas.cidade}}
                                  </td>
                                  <td>
                                    {{item1.areas.endereco}}
                                  </td>
                                  <td>
                                    <a href="javascript:void(0);" @click="showEditarArea(item1.areas)" ><i class="users-edit-icon feather icon-edit-1 mr-50"></i> </a>
                                    <a href="javascript:void(0);" @click="showExcluirArea(item1.areas.id)" ><i class="users-delete-icon feather icon-trash-2"></i> </a>
                                  </td>
                                </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <div class="text-center py-2" v-else>
                            Nenhum item adicionado
                          </div>
                        </div>

                      </div>
                      <div class="col-12 col-sm-6">
                        <div class="table-responsive border rounded px-1">
                          <h6 class="border-bottom py-2 mx-1 mb-0 font-medium-2">Canais de Venda
                            <a href="#" @click="showCriarCanal()" class="btn btn-primary bt-sm waves-effect waves-light mb-2 float-right" data-overlayColor="#38414a">
                              Add
                            </a>
                          </h6>
                          <table class="table table-borderless" v-if="item1.coop_canais.length > 0">
                            <thead>
                            <tr>
                              <th>Canal</th>
                              <th>Ação</th>
                            </tr>
                            </thead>
                            <tbody >
                            <tr v-for="canal in item1.coop_canais">
                              <td>{{canal.canai.descricao}}</td>
                              <td>
                                <a href="javascript:void(0);" @click="showEditarCanal(canal)" ><i class="users-edit-icon feather icon-edit-1 mr-50"></i> </a>
                                <a href="javascript:void(0);" @click="showExcluirCanal(canal.id)" ><i class="users-delete-icon feather icon-trash-2"></i> </a>
                              </td>
                            </tr>
                            </tbody>
                          </table>
                          <div class="text-center py-2" v-else>
                            Nenhum item adicionado
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                  <!-- users edit Info form ends -->
                </div>
                <div class="tab-pane" id="social" aria-labelledby="social-tab" role="tabpanel">
                  <!-- users edit socail form start -->
                  <form novalidate>
                    <div class="row">
                      <div class="col-12 ">
                          <div class="table-responsive border rounded px-1">
                            <h6 class="border-bottom py-2 mx-1 mb-0 font-medium-2">Produtos
                              <a href="#" @click="showCriarProduto()" class="btn btn-primary bt-sm waves-effect waves-light mb-2 float-right" data-overlayColor="#38414a">
                                Add
                              </a>
                            </h6>
                            <div class="row">
                              <div class="col-12">
                                <table class="table table-borderless" v-if="item1.coop_produtos.length > 0">
                                  <thead>
                                  <tr>
                                    <th>Produtos</th>
                                    <th>Categoria</th>
                                    <th>Ações</th>
                                  </tr>
                                  </thead>
                                  <tbody >
                                  <tr v-for="produtos in item1.coop_produtos">
                                    <td>{{produtos.descricao}}</td>
                                    <td>
                                      {{produtos.produto.descricao}}
                                    </td>
                                    <td>
                                      <a href="javascript:void(0);" @click="showEditarProduto(produtos)" ><i class="users-edit-icon feather icon-edit-1 mr-50"></i> </a>
                                      <a href="javascript:void(0);" @click="showExcluirProduto(produtos.id)" ><i class="users-delete-icon feather icon-trash-2"></i> </a>
                                    </td>
                                  </tr>
                                  </tbody>
                                </table>
                                <div class="text-center py-2" v-else>
                                  Nenhum item adicionado
                                </div>
                              </div>
                            </div>
                          </div>

                      </div>
                    </div>
                  </form>
                  <!-- users edit socail form ends -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

        <!-- end row -->
        <modalCreateArea :coop="item" @paginate="refresh()"></modalCreateArea>
        <modalCreateCanal :coop="item" @paginate="refresh()"></modalCreateCanal>
        <modalCreateProduto :coop="item" @paginate="refresh()"></modalCreateProduto>
        <modalEditarArea :coop="item" :itemEdit="areaEdit" @paginate="refresh()"></modalEditarArea>
        <modalEditarCanal :coop="item" :itemEdit="canalEdit" @paginate="refresh()"></modalEditarCanal>
        <modalEditarProduto :coop="item" :itemEdit="produtoEdit" @paginate="refresh()"></modalEditarProduto>
        <modalExcluirArea :usuario="areaExcluir" @paginate="refresh()"></modalExcluirArea>
        <modalExcluirCanal :usuario="canalExcluir" @paginate="refresh()"></modalExcluirCanal>
        <modalExcluirProduto :usuario="produtoExcluir" @paginate="refresh()"></modalExcluirProduto>

    </div> <!-- container -->


</template>


<script>
    import ModalCreateArea from './ModalCreateArea.vue';
    import ModalCreateCanal from './ModalCreateCanal.vue';
    import ModalCreateProduto from './ModalCreateProduto.vue';
    import ModalEditarArea from './ModalEditarArea.vue';
    import ModalEditarCanal from './ModalEditarCanal.vue';
    import ModalEditarProduto from './ModalEditarProduto.vue';
    import ModalExcluirArea from './ModalExcluirArea.vue';
    import ModalExcluirCanal from './ModalExcluirCanal.vue';
    import ModalExcluirProduto from './ModalExcluirProduto.vue';
    import ModalExcluir from './ModalExcluir.vue';
    import VueSelect from 'vue-select2';
    import cidades from '../../scripts/Cidades.json'
    import estados from '../../scripts/Estados.json'


    export default {
        components: {
          VueSelect,
          modalCreateArea: ModalCreateArea,
          modalCreateCanal: ModalCreateCanal,
          modalCreateProduto: ModalCreateProduto,
          modalEditarArea: ModalEditarArea,
          modalEditarCanal: ModalEditarCanal,
          modalEditarProduto: ModalEditarProduto,
          modalExcluirArea: ModalExcluirArea,
          modalExcluirCanal: ModalExcluirCanal,
          modalExcluirProduto: ModalExcluirProduto,
        },
      props: ['item'],


      data() {
        let sortOrders = {};
        let columns = [
          {label: 'ident', data: 'ident', name: 'ident'},
          {label: 'lead', data: 'lead', name: 'lead'},
          {label: 'lead_email', data: 'lead_email', name: 'lead_email'},
          {label: 'produto', data: 'produto', name: 'produto'},
          {label: 'status', data: 'status', name: 'status'},
          {label: '', data: 'actions', name: 'actions', orderable: false, searchable: false},
        ];
        columns.forEach((column) => {
          sortOrders[column.name] = -1;
        });
        return {
          item1: {},
          areaEdit: '',
          canalEdit: '',
          produtoEdit: '',
          areaExcluir: '',
          canalExcluir: '',
          produtoExcluir: '',
          compartilhamento: '',

          estados: estados,
          estado: '',
          cidades: cidades,
          cidade: '',
          ramos: [], // or [{id: key, text: value}, {id: key, text: value}]
          myOptions: ['Matriz','Filial'], // or [{id: key, text: value}, {id: key, text: value}]
          projects: [],
          curso: '',
          usuario: '',
          usuarioEditar: '',
          usuarioExcluir: '',
          showpreloader: false,
          columns: columns,
          sortKey: 'deadline',
          sortOrders: sortOrders,
          perPage: ['10', '20', '30'],
          tableData: {
            draw: 0,
            length: 10,
            search: '',
            column: 0,
            dir: 'desc',
            page:1
          },
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

          isDragging: false,
          dragCount: 0,
          stop: 1,
          files: [],
          files2: [],
          images: [],
        }
      },
      created() {
            this.getRamos();
        this.item1 = {...this.item}
        console.log('item created',this.item)
        console.log('item2 created',this.item1)
        },
      mounted() {
        let vm = this;
        this.$nextTick(function () {
          this.set();
        });
        this.compartilhamento = this.item.compartilhamento
      },
      updated(){
        console.log('item u',this.item)
        console.log('item2 u',this.item1)
      },


      computed: {
        estdosCpm() {
          let filtrado = [];
          let self = this;
          this.estados.map(function (prod) {
              console.log(prod.Nome  ,self.item.estado);
              if (prod.Nome === self.item.estado){
                console.log('entrou dfssdfdsfdsfdsfdsfdsfsdfdsfsfs')
                self.estado =  prod.ID
              }

            filtrado.push({id:prod.ID, text:prod.Nome});
          });
          console.log('filtrado', filtrado)
          return filtrado;
        },
        cidadesCpm() {
          let self = this;
          let filtrado = [];
          this.cidades.forEach(item => {
            if (item.Estado == self.estado){
              if (item.Nome === self.item.cidade){
                console.log('entrou dfssdfdsfdsfdsfdsfdsfsdfdsfsfs')
                self.cidade =  item.ID
              }
              filtrado.push({id:item.ID, text:item.Nome});
            }
          });
          console.log('filtrado', filtrado)
          return filtrado;
        },
      },
      watch: {
        tableData:{
          handler(val) {
            console.log('mudou');
            if (val.search) {
              this.pagination.current_page = 1;
            }
          },
          deep: true
        },
        compartilhamento: function(val){
          //Use your source of truth to trigger events!
          console.log(val)
          this.item.compartilhamento = val;
        }
      },
        methods: {
          alterarcatalogo(){
            console.log('muda catalogo', this.item.catalogo );
            this.item.catalogo = '';
          },
          set(){
            console.log('item c',this.item)
            console.log('item2 c',this.item1)
          },
          setcatalogo(event){
            const files2 = event.target.files;
            Array.from(files2).forEach(file => this.files2.push(file));
          },
          getRamos() {
            axios.get('/api/ramos')
              .then(response => {
                console.log(response.data);
                console.log('draw');
                let data = response.data.data;
                data.forEach(item =>{
                  this.ramos.push({id: item.id, text: item.descricao})
                });
              })
              .catch(errors => {
                console.log(errors);
              })
          },
          showCriarArea(id) {
            this.$modal.show('criar-area');
          },
          showCriarCanal(id) {
            this.$modal.show('criar-canal');
          },
          showCriarProduto(id) {
            this.$modal.show('criar-produto');
          },
          showExcluir(id) {
            console.log('id enviado',id);
            this.usuarioExcluir = id;
            this.$modal.show('usuario-excluir');
          },
          setCidade({id, text}){
            this.item.cidade = text;

          },
          setEstado({id, text}){
            this.item.estado = text;
          },
            showEditarArea(areaEdit) {
                this.areaEdit = areaEdit;
                this.$modal.show('editar-area');
            },
            showEditarCanal(canalEdit) {
                this.canalEdit = canalEdit;
                this.$modal.show('editar-canal');
            },
            showEditarProduto(produtoEdit) {
                this.produtoEdit = produtoEdit;
                this.$modal.show('editar-produto');
            },
          showExcluirArea(areaExcluir) {
                this.areaExcluir = areaExcluir;
                this.$modal.show('area-excluir');
            },
          showExcluirCanal(canalExcluir) {
                this.canalExcluir = canalExcluir;
                this.$modal.show('canal-excluir');
            },
          showExcluirProduto(canalExcluir) {
                this.produtoExcluir = canalExcluir;
                this.$modal.show('produto-excluir');
            },
            showExcluir(id) {
                console.log('id enviado',id);
                this.usuarioExcluir = id;
                this.$modal.show('usuario-excluir');
            },
            showCriar() {
                this.$modal.show('demo-login');
            },
            hide() {
                this.$modal.hide('demo-login');
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
          getUsuario(usu) {
                this.usuario = usu;
            },
          editarUsuario(id) {
              Swal.fire({
                title: 'Aguarde!',
                html: '',
                showConfirmButton: false,
                onBeforeOpen: () => {
                  Swal.showLoading()
                },
              });
                this.usuarioEditar = '';
                axios.get('/api/coops/' + id, {params: this.tableData})
                    .then(response => {
                        console.log(response.data);
                        let data = response.data;
                        console.log(data.data);
                        this.usuarioEditar = data.data;
                    })
                    .catch(errors => {
                        console.log(errors);
                    })
                    .finally(() => Swal.close());
            },
          refresh() {
              Swal.fire({
                title: 'Aguarde!',
                html: '',
                showConfirmButton: false,
                onBeforeOpen: () => {
                  Swal.showLoading()
                },
              });
                this.usuarioEditar = '';
                axios.get('/api/coops/' + this.item.id, {params: this.tableData})
                    .then(response => {
                        console.log(response.data);
                        let data = response.data;
                        console.log(data.data);
                        this.item1 = data.data;
                    })
                    .catch(errors => {
                        console.log(errors);
                    })
                    .finally(() => Swal.close());
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
                console.log('paginacao',this.pagination)
            },
            sortBy(key) {
                this.sortKey = key;
                this.sortOrders[key] = this.sortOrders[key] * -1;
                this.tableData.column = this.getIndex(this.columns, 'name', key);
                this.tableData.dir = this.sortOrders[key] === 1 ? 'asc' : 'desc';
                this.preloader = true;
                this.getProjects();
            },
            getIndex(array, key, value) {
                return array.findIndex(i => i[key] == value)
            },
          checkForm: function (e) {
            e.preventDefault();
            const formData2 = new FormData();
            Swal.fire({
              title: 'Salvando..',
              html: 'Aguarde enquanto a cooperativa é salva',
              showConfirmButton: false,
              onBeforeOpen: () => {
                Swal.showLoading()
              },
            });

            this.files.forEach(file => {
              formData2.append('logo', file, file.name);
            });
            this.files2.forEach(file => {
              formData2.append('catalogo', file, file.name);
            });
            formData2.append('_method', 'PUT');
            formData2.append('nome', this.item1.nome);
            formData2.append('razao', this.item1.razao);
            formData2.append('cnpj', this.item1.cnpj);
            formData2.append('email', this.item1.email);
            formData2.append('matriz', this.item1.matriz);
            formData2.append('site', this.item1.site);
            formData2.append('telefone', this.item1.telefone);
            formData2.append('whatsapp', this.item1.whatsapp);
            formData2.append('ramo_id', this.item1.ramo_id);
            formData2.append('cep', this.item1.cep);
            formData2.append('estado', this.item1.estado);
            formData2.append('cidade', this.item1.cidade);
            formData2.append('endereco', this.item1.endereco);
            formData2.append('numero', this.item1.numero);
            formData2.append('contato_nome', this.item1.contato_nome);
            formData2.append('contato_telefone', this.item1.contato_telefone);
            formData2.append('contato_email', this.item1.contato_email);
            formData2.append('contato_cargo', this.item1.contato_cargo);
            formData2.append('ajuda', this.item1.ajuda);
            if (this.item.compartilhamento){
              formData2.append('compartilhamento', 1);

            }else{
              formData2.append('compartilhamento', 0);

            }
            formData2.append('complemento', this.item1.complemento);
            formData2.append('bairro', this.item1.bairro);
            console.log(formData2);
            console.log(this.item);
            axios.post(`/api/coops/${this.item1.id}`, formData2)
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
