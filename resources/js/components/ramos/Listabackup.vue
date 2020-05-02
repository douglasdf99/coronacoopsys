<template>


    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Save Leads</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">CRM</a></li>
                            <li class="breadcrumb-item active">Contacts</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Contacts</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->


        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <form class="form-inline">
                                    <div class="form-group mb-2">
                                        <label for="inputPassword2" class="sr-only">Search</label>
                                        <input id="inputPassword2"  class="form-control" type="text" v-model="tableData.search" placeholder="Filtrar a lista abaixo"
                                               @input="getProjects()">
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-8">
                                <div class="text-sm-right">
                                    <button type="button" class="btn btn-success waves-effect waves-light mb-2 mr-1"><i class="mdi mdi-settings"></i></button>
                                    <a href="#custom-modal" class="btn btn-danger waves-effect waves-light mb-2" data-animation="fadein" data-plugin="custommodal" data-overlayColor="#38414a"><i class="mdi mdi-plus-circle mr-1"></i> Add Usuário</a>
                                </div>
                            </div><!-- end col-->
                        </div>

                        <div class="table-responsive">
                            <table class="table table-centered table-hover mb-0">
                                <thead>
                                <tr>
                                    <th>Basic Info</th>
                                    <th>Email</th>
                                    <th>Função</th>
                                    <th style="width: 82px;">Ações</th>
                                </tr>
                                </thead>
                                <tbody v-for="project in projects" :key="project.id">
                                <tr >
                                    <td class="table-user">
                                        <img v-bind:src="project.avatar" alt="table-user" class="mr-2 rounded-circle">
                                        <a href="javascript:void(0);" class="text-body font-weight-semibold">{{project.name}}</a>
                                    </td>
                                    <td>
                                        {{project.email}}
                                    </td>
                                    <td>
                                        {{project.role.nome}}
                                    </td>

                                    <td>
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <pagination :pagination="pagination"
                                    @prev="getProjects(pagination.prevPageUrl)"
                                    @paginate="getProjects()"
                                    @next="getProjects(pagination.nextPageUrl)">
                        </pagination>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->

            <div class="col-xl-4">
                <div class="card-box">
                    <div class="media mb-3">
                        <img class="d-flex mr-3 rounded-circle avatar-lg" src="assets/images/users/user-8.jpg" alt="Generic placeholder image">
                        <div class="media-body">
                            <h4 class="mt-0 mb-1">Jade M. Walker</h4>
                            <p class="text-muted">Branch manager</p>
                            <p class="text-muted"><i class="mdi mdi-office-building"></i> Vine Corporation</p>

                            <a href="javascript: void(0);" class="btn- btn-xs btn-info">Send Email</a>
                            <a href="javascript: void(0);" class="btn- btn-xs btn-secondary">Call</a>
                            <a href="javascript: void(0);" class="btn- btn-xs btn-secondary">Edit</a>
                        </div>
                    </div>

                    <h5 class="mb-3 mt-4 text-uppercase bg-light p-2"><i class="mdi mdi-account-circle mr-1"></i> Personal Information</h5>
                    <div class="">
                        <h4 class="font-13 text-muted text-uppercase">About Me :</h4>
                        <p class="mb-3">
                            Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the
                            1500s, when an unknown printer took a galley of type.
                        </p>

                        <h4 class="font-13 text-muted text-uppercase mb-1">Date of Birth :</h4>
                        <p class="mb-3"> March 23, 1984 (34 Years)</p>

                        <h4 class="font-13 text-muted text-uppercase mb-1">Company :</h4>
                        <p class="mb-3">Vine Corporation</p>

                        <h4 class="font-13 text-muted text-uppercase mb-1">Added :</h4>
                        <p class="mb-3"> April 22, 2016</p>

                        <h4 class="font-13 text-muted text-uppercase mb-1">Updated :</h4>
                        <p class="mb-0"> Dec 13, 2017</p>

                    </div>

                </div> <!-- end card-box-->
            </div>
        </div>
        <!-- end row -->

    </div> <!-- container -->

</template>


<script>
    import Datatable from '../Datatable.vue';
    import Pagination from '../Pagination.vue';
    export default {
        components: { datatable: Datatable, pagination: Pagination },
        created() {
            this.getProjects();
        },
        data() {
            let sortOrders = {};
            let columns = [
                {label: 'ident', data: 'ident', name: 'ident' },
                {label: 'lead', data: 'lead', name: 'lead' },
                {label: 'lead_email', data: 'lead_email', name: 'lead_email' },
                {label: 'produto', data: 'produto', name: 'produto' },
                {label: 'status', data: 'status', name: 'status' },
                {label: '', data: 'actions', name: 'actions', orderable: false, searchable: false },
            ];
            columns.forEach((column) => {
                sortOrders[column.name] = -1;
            });
            return {
                projects: [],
                preloader: false,
                columns: columns,
                sortKey: 'deadline',
                sortOrders: sortOrders,
                perPage: ['10', '20', '30'],
                tableData: {
                    draw: 0,
                    length: 2,
                    search: '',
                    column: 0,

                    dir: 'desc',
                },
                pagination: {
                    lastPage: '',
                    total: '',
                    lastPageUrl: '',
                    nextPageUrl: '',
                    prevPageUrl: '',
                    current_page: '',
                    firstPageUrl: '',
                    from: '',
                    to: ''
                },
            }
        },

        methods: {
            getProjects(url = '/api/users') {
                this.tableData.draw++;
                axios.get(url, {params: this.tableData})
                    .then(response => {
                        console.log(response.data);
                        console.log('draw');
                        console.log(this.tableData.draw);
                        let data = response.data;
                        console.log(data.data.draw);
                        if (this.tableData.draw == data.data.draw) {
                            this.projects = data.data.data.data;
                            console.log(this.projects);
                            this.configPagination(data.data.data);
                        }
                    })
                    .catch(errors => {
                        console.log(errors);
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
            },
            sortBy(key) {
                this.sortKey = key;
                this.sortOrders[key] = this.sortOrders[key] * -1;
                this.tableData.column = this.getIndex(this.columns, 'name', key);
                this.tableData.dir = this.sortOrders[key] === 1 ? 'asc' : 'desc';
                this.getProjects();
            },
            getIndex(array, key, value) {
                return array.findIndex(i => i[key] == value)
            },
        }
    }
</script>
