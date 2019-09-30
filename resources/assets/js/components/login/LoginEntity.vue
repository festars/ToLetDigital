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
                <small>Sign in with your <b>{{ entity }}</b> credentials</small>
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
                    <input class="form-control" v-model="form.username" placeholder="Email" type="email">
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
                <div class="row mt-3">
            <div class="col-6">
              <a :href="url" class="text-light"><small>Forgot password?</small></a>
            </div>
            
          </div>
              </form>
            </div>
          </div>
          
          
           <!--<modal name="login" height="auto" width="900">
        <div class="fixed pin flex items-center">
            <div class="fixed pin opacity-75 z-10"></div>

            <div class="relative mx-6 md:mx-auto w-full md:w-1/2 lg:w-1/3 z-20 m-8">
                <div class="shadow-lg bg-white rounded-lg p-8">
                    <div class="flex justify-end mb-6">
                        <button @click="hide">
                            <span class="mr-2">X</span>
                            <span>
                                <i class="fa fa-times"></i>
                            </span>
                        </button>
                    </div>

                    <h1 class="text-center text-2xl text-green-dark mb-4 uppercase">Login As {{ entity }}</h1>
                    

                    <form class="pt-6 pb-2 my-2" @submit.prevent="login">
                        <h1 class="text-center text-sm text-red-dark" v-if="message">{{ message }}</h1>
                        <div class="mb-4">
                            <label class="block text-sm font-bold mb-2" for="email">
                                Username
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" v-model="form.username" type="text" placeholder="Email Address">
                            <p class="text-red text-xs italic" v-if="form.errors.has('login')" v-text="form.errors.get('login')"></p>
                        </div>
                        <div class="mb-6">
                            <label class="block text-sm font-bold mb-2" for="password">
                                Password
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker mb-3" v-model="form.password" type="password" placeholder="Password">
                        </div>
                        <div class="block md:flex items-center justify-between">
                            <div>
                                <button class="bg-green hover:bg-green-dark text-white font-bold py-2 px-4 rounded border-b-4 border-green-darkest" type="submit">
                                    Sign In
                                </button>
                            </div>

                            <div class="mt-4 md:mt-0">
                                <a href="#" class="text-green no-underline">Forget Password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </modal>-->
          
        </div>
    
    
    
   

</template>

<script>
export default {
  mounted() {
  this.url="/"+this.entity+"/forgot/password"
  
    //this.$modal.show("login");
  },

  props: ["entity"],

  data() {
    return {
      url:'',
      form: new Form({
        username: "",
        password: ""
      }),
      message: null
    };
  },

  methods: {
    hide() {
      //this.$modal.hide("login");
      location.replace('/login');
    },

    login() {
      this.message = null
      this.form
        .post("/" + this.entity + "/login")
        .then(response => {
          //console.log(response);
          location.replace(response.url);
        })
        .catch(errors => {
          this.message = errors.message;
        });
        
        //alert(1)
    }
  }
};
</script>

<style scoped>
</style>