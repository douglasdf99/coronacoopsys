<template>
    <!-- Start Content-->
    <div class="container-fluid">
      <section class="users-edit">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <ul class="nav nav-tabs mb-3" role="tablist">
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account"
                     aria-controls="account" role="tab" aria-selected="true">
                    <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">Informações principais</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab" href="#information"
                     aria-controls="information" role="tab" aria-selected="false">
                    <i class="feather icon-info mr-25"></i><span class="d-none d-sm-block">Information</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center" id="social-tab" data-toggle="tab" href="#social"
                     aria-controls="social" role="tab" aria-selected="false">
                    <i class="feather icon-share-2 mr-25"></i><span class="d-none d-sm-block">Social</span>
                  </a>
                </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                  <!-- users edit media object start -->
                  <div class="media mb-2">
                    <a class="mr-2 my-25" href="#">
                      <img :src="url_redirect(item.logo)" alt="users avatar"
                           class="users-avatar-shadow rounded" height="64" width="64">
                    </a>
                    <div class="media-body mt-50">
                      <div class="col-12 d-flex mt-1 px-0">
                        <a href="#" class="btn btn-primary d-none d-sm-block mr-75">Alterar</a>
                        <a href="#" class="btn btn-primary d-block d-sm-none mr-75"><i
                          class="feather icon-edit-1"></i></a>
                      </div>
                    </div>
                  </div>
                  <!-- users edit media object ends -->
                  <!-- users edit account form start -->
                  <form>
                    <div class="row">
                      <div class="col-12 col-sm-6">
                        <div class="form-group">
                          <div class="controls">
                            <label>Nome Fantasia</label>
                            <input type="text" class="form-control" required v-model="item.nome">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="controls">
                            <label>Razão social</label>
                            <input type="text" class="form-control" required v-model="item.razao">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="controls">
                            <label>E-mail</label>
                            <input type="email" class="form-control" required v-model="item.email">
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-sm-6">
                        <div class="form-group">
                          <div class="controls">
                            <label>Matriz</label>
                            <Select2 v-model="item.ramo_id" :options="myOptions" :settings="{ settingOption: value, settingOption: value }" />
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="controls">
                            <label>Site </label>
                            <input type="email" class="form-control" required v-model="item.site">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="controls">
                            <label>Telefone </label>
                            <input type="email" class="form-control" required v-model="item.telefone">
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group">
                          <div class="controls">
                            <label>Cep</label>
                            <input type="email" class="form-control" required v-model="item.cep">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="controls">
                            <label>Estado </label>
                            <Select2 v-model="item.estado" :options="myOptions" :settings="{ settingOption: value, settingOption: value }" />
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="controls">
                            <label>Cidade </label>
                            <Select2 v-model="item.cidade" :options="myOptions" :settings="{ settingOption: value, settingOption: value }" />
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="controls">
                            <label>Endereco </label>
                            <input type="email" class="form-control" required v-model="item.endereco">
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="controls">
                            <label>Número </label>
                            <input type="email" class="form-control" required v-model="item.numero">
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="controls">
                            <label>Complemento </label>
                            <input type="email" class="form-control" required v-model="item.complemento">
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="controls">
                            <label>Bairro </label>
                            <input type="email" class="form-control" required v-model="item.bairro">
                          </div>
                        </div>
                      </div>
                      <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                        <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                          Changes</button>
                        <button type="reset" class="btn btn-outline-warning">Reset</button>
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
                        <h5 class="mb-1"><i class="feather icon-user mr-25"></i>Personal Information</h5>
                        <div class="row">
                          <div class="col-12">
                            <div class="form-group">
                              <div class="controls">
                                <label>Birth date</label>
                                <input type="text" class="form-control birthdate-picker" required placeholder="Birth date"
                                       data-validation-required-message="This birthdate field is required">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="controls">
                            <label>Mobile</label>
                            <input type="text" class="form-control" value="&#43;6595895857"
                                   placeholder="Mobile number here..."
                                   data-validation-required-message="This mobile number is required">
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="controls">
                            <label>Website</label>
                            <input type="text" class="form-control" required placeholder="Website here..."
                                   value="https://rowboat.com/insititious/Angelo"
                                   data-validation-required-message="This Website field is required">
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Languages</label>
                          <select class="form-control" id="users-language-select2" multiple="multiple">
                            <option value="English" selected>English</option>
                            <option value="Spanish">Spanish</option>
                            <option value="French">French</option>
                            <option value="Russian">Russian</option>
                            <option value="German">German</option>
                            <option value="Arabic" selected>Arabic</option>
                            <option value="Sanskrit">Sanskrit</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Gender</label>
                          <ul class="list-unstyled mb-0">
                            <li class="d-inline-block mr-2">
                              <fieldset>
                                <div class="vs-radio-con">
                                  <input type="radio" name="vueradio" checked value="false">
                                  <span class="vs-radio">
                              <span class="vs-radio--border"></span>
                              <span class="vs-radio--circle"></span>
                            </span>
                                  Male
                                </div>
                              </fieldset>
                            </li>
                            <li class="d-inline-block mr-2">
                              <fieldset>
                                <div class="vs-radio-con">
                                  <input type="radio" name="vueradio" value="false">
                                  <span class="vs-radio">
                              <span class="vs-radio--border"></span>
                              <span class="vs-radio--circle"></span>
                            </span>
                                  Female
                                </div>
                              </fieldset>
                            </li>
                            <li class="d-inline-block mr-2">
                              <fieldset>
                                <div class="vs-radio-con">
                                  <input type="radio" name="vueradio" value="false">
                                  <span class="vs-radio">
                              <span class="vs-radio--border"></span>
                              <span class="vs-radio--circle"></span>
                            </span>
                                  Other
                                </div>
                              </fieldset>
                            </li>

                          </ul>
                        </div>
                        <div class="form-group">
                          <label>Contact Options</label>
                          <ul class="list-unstyled mb-0">
                            <li class="d-inline-block mr-2">
                              <fieldset>
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" checked name="customCheck1"
                                         id="customCheck1">
                                  <label class="custom-control-label" for="customCheck1">Email</label>
                                </div>
                              </fieldset>
                            </li>
                            <li class="d-inline-block mr-2">
                              <fieldset>
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" checked name="customCheck2"
                                         id="customCheck2">
                                  <label class="custom-control-label" for="customCheck2">Message</label>
                                </div>
                              </fieldset>
                            </li>
                            <li class="d-inline-block mr-2">
                              <fieldset>
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" name="customCheck3" id="customCheck3">
                                  <label class="custom-control-label" for="customCheck3">Phone</label>
                                </div>
                              </fieldset>
                            </li>
                          </ul>
                        </div>

                      </div>
                      <div class="col-12 col-sm-6">
                        <h5 class="mb-1 mt-2 mt-sm-0"><i class="feather icon-map-pin mr-25"></i>Address</h5>
                        <div class="form-group">
                          <div class="controls">
                            <label>Address Line 1</label>
                            <input type="text" class="form-control" value="A-65, Belvedere Streets" required
                                   placeholder="Address Line 1" data-validation-required-message="This Address field is required">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="controls">
                            <label>Address Line 2</label>
                            <input type="text" class="form-control" required placeholder="Address Line 2"
                                   data-validation-required-message="This Address field is required">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="controls">
                            <label>Postcode</label>
                            <input type="text" class="form-control" required placeholder="postcode" value="1868"
                                   data-validation-required-message="This Postcode field is required">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="controls">
                            <label>City</label>
                            <input type="text" class="form-control" required value="New York"
                                   data-validation-required-message="This Time Zone field is required">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="controls">
                            <label>State</label>
                            <input type="text" class="form-control" required value="New York"
                                   data-validation-required-message="This Time Zone field is required">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="controls">
                            <label>Country</label>
                            <input type="text" class="form-control" required value="United Kingdom"
                                   data-validation-required-message="This Time Zone field is required">
                          </div>
                        </div>
                      </div>
                      <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                        <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                          Changes</button>
                        <button type="reset" class="btn btn-outline-warning">Reset</button>
                      </div>
                    </div>
                  </form>
                  <!-- users edit Info form ends -->
                </div>
                <div class="tab-pane" id="social" aria-labelledby="social-tab" role="tabpanel">
                  <!-- users edit socail form start -->
                  <form novalidate>
                    <div class="row">
                      <div class="col-12 col-sm-6">

                        <fieldset>
                          <label>Twitter</label>
                          <div class="input-group mb-75">
                            <div class="input-group-prepend">
                              <span class="input-group-text feather icon-twitter" id="basic-addon3"></span>
                            </div>
                            <input type="text" class="form-control" value="https://www.twitter.com/adoptionism744"
                                   placeholder="https://www.twitter.com/" aria-describedby="basic-addon3">
                          </div>

                          <label>Facebook</label>
                          <div class="input-group mb-75">
                            <div class="input-group-prepend">
                              <span class="input-group-text feather icon-facebook" id="basic-addon4"></span>
                            </div>
                            <input type="text" class="form-control" value="https://www.facebook.com/adoptionism664"
                                   placeholder="https://www.facebook.com/" aria-describedby="basic-addon4">
                          </div>
                          <label>Instagram</label>
                          <div class="input-group mb-75">
                            <div class="input-group-prepend">
                              <span class="input-group-text feather icon-instagram" id="basic-addon5"></span>
                            </div>
                            <input type="text" class="form-control" value="https://www.instagram.com/adopt-ionism744"
                                   placeholder="https://www.instagram.com/" aria-describedby="basic-addon5">
                          </div>
                        </fieldset>
                      </div>
                      <div class="col-12 col-sm-6">
                        <label>Github</label>
                        <div class="input-group mb-75">
                          <div class="input-group-prepend">
                            <span class="input-group-text feather icon-github" id="basic-addon9"></span>
                          </div>
                          <input type="text" class="form-control" value="https://www.github.com/madop818"
                                 placeholder="https://www.github.com/" aria-describedby="basic-addon9">
                        </div>
                        <label>Codepen</label>
                        <div class="input-group mb-75">
                          <div class="input-group-prepend">
                            <span class="input-group-text feather icon-codepen" id="basic-addon12"></span>
                          </div>
                          <input type="text" class="form-control" value="https://www.codepen.com/adoptism243"
                                 placeholder="https://www.codepen.com/" aria-describedby="basic-addon12">
                        </div>
                        <label>Slack</label>
                        <div class="input-group mb-75">
                          <div class="input-group-prepend">
                            <span class="input-group-text feather icon-slack" id="basic-addon11"></span>
                          </div>
                          <input type="text" class="form-control" value="@adoptionism744" placeholder="https://www.slack.com/"
                                 aria-describedby="basic-addon11">
                        </div>
                      </div>
                      <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                        <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                          Changes</button>
                        <button type="reset" class="btn btn-outline-warning">Reset</button>
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
      <div class="row">
        <!-- account start -->

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
    import VueSelect from 'vue-select2';


    export default {
        components: {VueSelect, modal2: Modal, modaleditar: ModalEditar, modalexcluir: ModalExcluir},
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
