<template>
    <div class="md:container mx-auto">
        <div class="w-full flex justify-center items-center bg-tolet-yellow">
          <img src="/img/tolet.jpg" class="h-48 w-48 rounded-full my-2">
        </div>
        <div class="md:w-full flex justify-center items-center bg-tolet-blue">
          <h3 class="uppercase leading-normal tracking-wide text-xl text-white py-4">welcome to tolet online property management software</h3>
        </div>
        <div class="md:w-full flex justify-center items-center bg-white">
          <form class="bg-white rounded px-2 pt-2 pb-2 mb-2 w-full" @submit.prevent="register">
            <div class="md:flex justify-between">
                <div class="mb-2 md:w-1/2">
                  <label class="block text-grey-darker text-sm font-bold mb-2" for="name">
                    Name
                  </label>
                  <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker outline-0" type="text" placeholder="John Doe" autocomplete="off" v-model="form.name">

                  <p class="text-red text-xs italic" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></p>
                </div>
                <div class="mb-2 md:w-1/2 mx-2">
                  <label class="block text-grey-darker text-sm font-bold mb-2" for="email">
                    Email
                  </label>
                  <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3 outline-0"  type="email" placeholder="johndoe@gmail.com" v-model="form.email">
                  <p class="text-red text-xs italic" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></p>
                </div>
            </div>

            <div class="md:flex justify-between">
                <div class="mb-2 md:w-full">
                  <label class="block text-grey-darker text-sm font-bold mb-2" for="name">
                    Phone Number
                  </label>
                  <vue-tel-input v-model="form.phone" @onInput="onInput" style="margin: 0px;padding: 0px" >  </vue-tel-input>

                  <p class="text-red text-xs italic" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></p>
                </div>
            </div>

            <div class="md:flex justify-between">
                <div class="mb-2 md:w-1/2">
                  <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
                    Password
                  </label>
                  <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3 outline-0"  type="password" placeholder="******************" autocomplete="off" v-model="form.password">
                  <p class="text-red text-xs italic" v-if="form.errors.has('password')" v-text="form.errors.get('password')"></p>
                </div>
                <div class="mb-2 md:w-1/2 mx-2">
                  <label class="block text-grey-darker text-sm font-bold mb-2" for="password_confirmation">
                    Confirm Password
                  </label>
                  <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3 outline-0"  type="password" placeholder="******************" autocomplete="off" v-model="form.password_confirmation">
                  <p class="text-red text-xs italic" v-if="form.errors.has('password_confirmation')" v-text="form.errors.get('password_confirmation')"></p>
                </div>
            </div>


            <div class="md:flex items-center justify-between">
              <div class="md:flex items-baseline justify-center">
                <input type="checkbox" name="terms" v-model="form.terms" class="p-2"> <p class="text-black px-2">Accept Terms and Conditions.</p>
              </div>
              <button class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded" type="submit">
                Sign Up
              </button>
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
                    'name':'',
                    'email':'',
                    'password':'',
                    'password_confirmation':'',
                    'phone': '',
                    'terms':''
                }),

            }
        },

        methods: {
            register(){
                this.form.post('/register')
                .then(response => {
                  
                  if (response.message){
                    //console.log(response);
                    location.replace('/');
                  }
                    
                })
                .catch(errors => {
                  console.log(errors);
                });
            },
            onInput({ number, isValid, country }) {
              //console.log(number, isValid, country);
            },
        },

        computed:{

        }
    }
</script>

<style>

</style>
