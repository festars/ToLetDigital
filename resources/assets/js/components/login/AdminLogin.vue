<template>
    <div class="container mx-auto">
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
        </div>
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
            form:new Form({
                    'email':'',
                    'password':'',
                }),
          }
        },

        methods: {
            doLogin(){
                this.form.post('/admin/login')
                .then(response => {
                    location.replace(response.url);
                })
                .catch(errors => {

                });
            }
        },

        computed:{

        }
    }
</script>

<style>

</style>
