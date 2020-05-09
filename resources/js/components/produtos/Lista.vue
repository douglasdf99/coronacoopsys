<template>
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2 ">
                            <div class="col-sm-8">
                                <span class="form-inline" >
                                  <div class="input-group  w-100">
                                    <input type="text" class="form-control" v-model="tableData.search" placeholder="Buscar ramos" aria-describedby="button-addon2">
                                    <div class="input-group-append" id="button-addon2">
                                      <button class="btn btn-primary" type="button" @click="getProjects()">Bucar</button>
                                    </div>
                                  </div>
                                </span>
                            </div>
                            <div class="col-sm-4">
                                <div class="text-sm-right">
                                    <a href="#" @click="showCriar()" class="btn btn-danger waves-effect waves-light mb-2"
                                       data-animation="fadein" data-plugin="custommodal" data-overlayColor="#38414a">
                                        <i class="mdi mdi-plus-circle mr-1"></i> Add Produto
                                    </a>
                                </div>
                            </div><!-- end col-->
                        </div>

                        <div class="table-responsive" style="position: relative">
                            <table class="table table-centered table-hover mb-0" v-if="pagination.total">
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Ramo</th>
                                    <th style="width: 82px;">Ações</th>
                                </tr>
                                </thead>
                                <tbody v-for="project in projects" :key="project.id">
                                <tr @click="getUsuario(project)">
                                    <td>
                                          <a href="javascript:void(0);" class=" text-body font-weight-semibold">{{project.descricao}}</a>
                                    </td>
                                    <td>
                                          <a href="javascript:void(0);" class=" text-body font-weight-semibold">{{project.ramo.descricao}}</a>
                                    </td>
                                    <td>
                                      <a href="javascript:void(0);" @click="showEditar(project.id)" ><i class="users-edit-icon feather icon-edit-1 mr-50"></i> </a>
                                      <a href="javascript:void(0);" @click="showExcluir(project.id)" ><i class="users-delete-icon feather icon-trash-2"></i> </a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                       <!-- <preloader v-show="showpreloader"></preloader>-->
                        <div class="card-box mb-2" v-if="!pagination.total">
                            <div class="row justify-content-center">
                                <div class="rapper text-center">
                                  <img class="img-responsive" :src="url_redirect('images/nenhum-resultado.svg')" width="200px"/>
                                    <br>
                                    <h2>Nenhum Ramo Encontrado</h2>
                                </div>
                            </div> <!-- end row -->
                        </div>

                        <pagination :pagination="pagination"
                                    @prev="getProjects(pagination.prevPageUrl)"
                                    @paginate="getProjects()"
                                    @next="getProjects(pagination.nextPageUrl)">
                        </pagination>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->
        <modal2 @paginate="getProjects()"></modal2>
        <modaleditar :ramo="usuarioEditar"
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
                this.$modal.show('ramo-editar');
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
            getProjects(url = '/api/produtos') {
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
                    .finally(() =>   Swal.close());
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
                axios.get('/api/produtos/' + id, {params: this.tableData})
                    .then(response => {
                        console.log(response.data);
                        let data = response.data;
                        console.log(data.data);
                        this.usuarioEditar = data.data;

                    })
                    .catch(errors => {
                        console.log(errors);
                    })
                    .finally(() => {
                      Swal.close();
                    });

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
