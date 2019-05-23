<template>
  
  
  <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary shadow border-0">
            <div class="card-header bg-transparent">

              <!-- custom -->
                
                <button type="button" @click="hide" class="btn btn-icon">
              	<span class="btn-inner--icon"><i class="ni ni-bold-left"></i></span>
                  <span class="btn-inner--text">Go back</span>
              </button>
                    <!-- custom -->
                    
            </div>
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>Sign in with your <b>Admin</b> credentials</small>
              </div>
              

              <div v-if="message" class="alert alert-danger alert-dismissible fade show" role="alert">
                  <span class="alert-inner--text"><strong>Error! </strong> {{ message }}</span>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              
              <form role="form" @submit.prevent="login">
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" v-model="form.email" placeholder="Email" type="email">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" v-model="form.password" placeholder="Password" type="password">
                  </div>
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                  <label class="custom-control-label" for=" customCheckLogin">
                    <span class="text-muted">Remember me</span>
                  </label>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">Sign in</button>
                </div>
              </form>
            </div>
          </div>
  
  
  
    <!--<div class="container mx-auto">
        <div class="w-5/6 flex justify-center items-center bg-tolet-yellow">
          <img src="/img/tolet.jpg" class="h-48 w-48 rounded-full my-2">
        </div>
        <div class="w-5/6 flex justify-center items-center bg-tolet-blue">
          <h3 class="uppercase leading-normal tracking-wide text-xl text-white py-4">Tolet online property management software(Admin)</h3>
        </div>
        <div class="w-5/6 flex justify-center items-center bg-white">
          <form class="bg-white rounded px-2 pt-2 pb-2 mt-2 mb-4 w-5/6" @submit.prevent="doLogin">
            <div class="mb-2">
              <label class="block text-grey-darker text-sm font-bold mb-2" for="email">
                Email
              </label>
              <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" type="text" placeholder="johndoe@gmail.com" v-model="form.email">
              <p class="text-red text-xs italic" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></p>
            </div>
            <div class="mb-2">
              <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
                Password
              </label>
              <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3"  type="password" placeholder="******************" autocomplete="off" v-model="form.password">
              <p class="text-red text-xs italic" v-if="form.errors.has('password')" v-text="form.errors.get('password')"></p>
            </div>


            <div class="flex items-center justify-between">
              <button class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded" type="submit">
                Sign In
              </button>
              <a class="inline-block align-baseline font-bold text-sm text-blue hover:text-blue-darker" href="#">
                Forgot Password?
              </a>
            </div>
          </form>
        </div>-->
      </div>
</template>

<script>
    export default {
        mounted() {

        },
        components: {

        },

        data() {
          return {
            message: null,
            form:new Form({
                    'email':'',
                    'password':'',
                }),
          }
        },

        methods: {
            login(){
              let formData = new FormData();
           
            formData.append('email', this.form.email);
            formData.append('password', this.form.password);
                this.form.post('/admin/login',formData, {
            headers: { 'content-type': 'multipart/form-data' }
            }).then(response => {
                  
                  // flash(response.message);
                 location.replace('/admin/dashboard')
                }).catch(errors => {
                  this.message = errors.message;
                })
                
            },
            
            hide() {
              //this.$modal.hide("login");
              location.replace('/login');
            }
        },

        computed:{

        }
    }
</script>

<style>

</style>
