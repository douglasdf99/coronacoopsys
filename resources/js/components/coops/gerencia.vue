<template>
    <!-- Start Content-->
    <div class="container-fluid">
      <div class="row">
        <!-- account start -->
        <div class="col-12">

        </div>
        <!-- account end -->
        <!-- information start -->
        <div class="col-md-6 col-12 ">
          <div class="card">
            <div class="card-body">
              <h6 class="border-bottom py-1 mx-1 mb-2 mb-0 font-medium-2"><i class="feather icon-lock mr-50 "></i>Informações principais
              </h6>
              <table styel="border-collapse:separate;border-spacing:5px;">
                <tr>
                  <td class="font-weight-bold">Nome Fantasia: </td>
                  <td> {{item.nome}}
                  </td>
                </tr>
                <tr>
                  <td class="font-weight-bold">Razão Social : </td>
                  <td> {{item.razao}}
                  </td>
                </tr>
                <tr>
                  <td class="font-weight-bold">CPNJ :</td>
                  <td>{{item.cnpj}}</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">Email :</td>
                  <td>{{item.email}}
                  </td>
                </tr>
                <tr>
                  <td class="font-weight-bold">Tipo :</td>
                  <td>{{item.matriz}}
                  </td>
                </tr>
                <tr>
                  <td class="font-weight-bold">Site :</td>
                  <td>{{item.site}}</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">Telefone :</td>
                  <td>{{item.cnpj}}
                  </td>
                </tr>
                <tr>
                  <td class="font-weight-bold">Whatsapp :</td>
                  <td>{{item.whatsapp}}
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        <!-- information start -->
        <!-- social links end -->
        <div class="col-md-6 col-12 ">
          <div class="card">
            <div class="card-body">
              <h6 class="border-bottom py-1 mx-1 mb-2 mb-0 font-medium-2"><i class="feather icon-lock mr-50 "></i>Configurações
              </h6>
              <table style="border-collapse:separate;border-spacing:5px;">
                <tr>
                  <td class="font-weight-bold">Compatilhamento :</td>
                  <td>{{item.compartilhamento}}</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">Venda :</td>
                  <td>{{item.sell}}</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">Ramo :</td>
                  <td>{{item.ramo.descricao}}</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">Cátalogo :</td>
                  <td>{{item.catalogo}}</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        <!-- social links end -->
        <!-- permissions start -->
        <div class="col-6">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <h6 class="border-bottom py-1 mx-1 mb-0 font-medium-2"><i class="feather icon-lock mr-50 "></i>Áreas de atuação
                </h6>
                <table class="table table-borderless">
                  <thead>
                  <tr>
                    <th>Tipo</th>
                    <th>Estado</th>
                    <th>Cidade</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr v-for="area in item.areas">
                    <td>{{area.tipo}}</td>
                    <td>
                      {{area.estado}}
                    </td>
                    <td>
                      {{area.cidade}}
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>     <!-- permissions start -->
        <div class="col-6">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <h6 class="border-bottom py-1 mx-1 mb-0 font-medium-2"><i class="feather icon-lock mr-50 "></i>Canais de venda
                </h6>
                <table class="table table-borderless">
                  <thead>
                  <tr>
                    <th>Canal</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr v-for="canal in item.coop_canais">
                    <td>{{canal.canai.descricao}}</td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- permissions start -->
        <div class="col-6">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <h6 class="border-bottom py-1 mx-1 mb-0 font-medium-2"><i class="feather icon-lock mr-50 "></i>Produtos
                </h6>
                <table class="table table-borderless">
                  <thead>
                  <tr>
                    <th>Produtos</th>
                    <th>Categoria</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr v-for="produtos in item.coop_produtos">
                    <td>{{produtos.descricao}}</td>
                    <td>
                      {{produtos.produto.descricao}}
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <h6 class="border-bottom py-1 mx-1 mb-0 font-medium-2"><i class="feather icon-lock mr-50 "></i>Permission
                </h6>
                <table class="table table-borderless">
                  <thead>
                  <tr>
                    <th>Module</th>
                    <th>Read</th>
                    <th>Write</th>
                    <th>Create</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>Users</td>
                    <td>
                      <div class="custom-control custom-checkbox"><input type="checkbox" id="users-checkbox1"
                                                                         class="custom-control-input" checked>
                        <label class="custom-control-label" for="users-checkbox1"></label>
                      </div>
                    </td>
                    <td>
                      <div class="custom-control custom-checkbox"><input type="checkbox" id="users-checkbox2"
                                                                         class="custom-control-input"><label class="custom-control-label" for="users-checkbox2"></label>
                      </div>
                    </td>
                    <td>
                      <div class="custom-control custom-checkbox"><input type="checkbox" id="users-checkbox3"
                                                                         class="custom-control-input"><label class="custom-control-label" for="users-checkbox3"></label>
                      </div>
                    </td>
                    <td>
                      <div class="custom-control custom-checkbox"><input type="checkbox" id="users-checkbox4"
                                                                         class="custom-control-input" checked>
                        <label class="custom-control-label" for="users-checkbox4"></label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Articles</td>
                    <td>
                      <div class="custom-control custom-checkbox"><input type="checkbox" id="users-checkbox5"
                                                                         class="custom-control-input"><label class="custom-control-label" for="users-checkbox5"></label>
                      </div>
                    </td>
                    <td>
                      <div class="custom-control custom-checkbox"><input type="checkbox" id="users-checkbox6"
                                                                         class="custom-control-input" checked>
                        <label class="custom-control-label" for="users-checkbox6"></label>
                      </div>
                    </td>
                    <td>
                      <div class="custom-control custom-checkbox"><input type="checkbox" id="users-checkbox7"
                                                                         class="custom-control-input"><label class="custom-control-label" for="users-checkbox7"></label>
                      </div>
                    </td>
                    <td>
                      <div class="custom-control custom-checkbox"><input type="checkbox" id="users-checkbox8"
                                                                         class="custom-control-input" checked>
                        <label class="custom-control-label" for="users-checkbox8"></label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Staff</td>
                    <td>
                      <div class="custom-control custom-checkbox"><input type="checkbox" id="users-checkbox9"
                                                                         class="custom-control-input" checked>
                        <label class="custom-control-label" for="users-checkbox9"></label>
                      </div>
                    </td>
                    <td>
                      <div class="custom-control custom-checkbox"><input type="checkbox" id="users-checkbox10"
                                                                         class="custom-control-input" checked>
                        <label class="custom-control-label" for="users-checkbox10"></label>
                      </div>
                    </td>
                    <td>
                      <div class="custom-control custom-checkbox"><input type="checkbox" id="users-checkbox11"
                                                                         class="custom-control-input"><label class="custom-control-label" for="users-checkbox11"></label>
                      </div>
                    </td>
                    <td>
                      <div class="custom-control custom-checkbox"><input type="checkbox" id="users-checkbox12"
                                                                         class="custom-control-input"><label class="custom-control-label" for="users-checkbox12"></label>
                      </div>
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- permissions end -->
      </div>
        <!-- end row -->
        <modal2 @paginate="getProjects()"></modal2>
        <modaleditar :usuario="usuarioEditar"
                     @paginate="getProjects()">
        </modaleditar>
        <modalexcluir :usuario="usuarioExcluir"
                     @paginate="getProjects()">
        </modalexcluir>
    </div> <!-- container -->


</template>


<script>
    import Modal from './ModalCreate.vue';
    import ModalEditar from './ModalEditar.vue';
    import ModalExcluir from './ModalExcluir.vue';

    export default {
        components: { modal2: Modal, modaleditar: ModalEditar, modalexcluir: ModalExcluir},
      props: ['item'],

      created() {
            this.getProjects();
        },
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
            }
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
        }
      },
        methods: {
            showEditar(id) {
                this.editarUsuario(id);
                this.$modal.show('usuario-editar');
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
            getProjects(url = '/api/coops') {
              Swal.fire({
                title: 'Carregando...',
                html: '',
                showConfirmButton: false,
                onBeforeOpen: () => {
                  Swal.showLoading()
                },
              });
                this.preloader = true;
                this.tableData.draw++;
                this.tableData.page= this.pagination.current_page;
                axios.get(url, {params: this.tableData})
                    .then(response => {
                        console.log(response.data);
                        console.log('draw');
                        console.log(this.tableData.draw);
                        let data = response.data;


                            this.projects = data.data.data;
                            console.log(this.projects);
                            this.configPagination(data.data);

                    })
                    .catch(errors => {
                        console.log(errors);
                    })
                    .finally(() => Swal.close());
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
        }
    }
</script>
