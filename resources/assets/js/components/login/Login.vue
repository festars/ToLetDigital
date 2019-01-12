<template>
    <div class="md:container mx-auto">
        <div class="w-full flex justify-center items-center bg-tolet-yellow">
          <img src="/img/newtolet.png" class="h-48 w-48 rounded-full my-2">
        </div>
        <div class="w-full flex justify-center items-center bg-tolet-blue">
          <h3 class="uppercase leading-normal tracking-wide text-xl text-white py-4">welcome to tolet online property management software</h3>
        </div>
        <div class="w-full flex justify-center items-center bg-white">
          <form class="bg-white rounded px-2 pt-2 pb-2 mb-4 w-5/6" @submit.prevent="doLogin">
            <div class="mb-2">
              <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
                Login as
              </label>
              <div>
                <v-radio-group v-model="form.login" row>
                  <v-radio
                    label="Tenant"
                    color="black"
                    value="tenant"
                  ></v-radio>
                  <v-radio
                    label="Agents"
                    color="black"
                    value="agent"
                  ></v-radio>
                  <v-radio
                    label="Owners"
                    color="black"
                    value="owner"
                  ></v-radio>

                  <v-radio
                    label="Vendors"
                    color="black"
                    value="vendor"
                  ></v-radio>
                  <v-radio
                    label="Demo"
                    color="black"
                    value="demo"
                  ></v-radio>
                </v-radio-group>
                <p class="text-red text-xs italic" v-if="form.errors.has('login')" v-text="form.errors.get('login')"></p>
              </div>
            </div>
            <div class="mb-2">
              <label class="block text-grey-darker text-sm font-bold mb-2" for="username">
                Username
              </label>
              <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" type="text" placeholder="Username" autocomplete="off" v-model="form.username">
              <p class="text-red text-xs italic" v-if="form.errors.has('username')" v-text="form.errors.get('username')"></p>
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
  mounted() {},
  components: {},

  data() {
    return {
      form: new Form({
        username: "",
        password: "",
        login: ""
      })
    };
  },

  methods: {
    doLogin() {
      this.form
        .post("/" + this.form.login + "/login")
        .then(response => {
          location.replace(response.url);
        })
        .catch(errors => {});
    }
  },

  computed: {}
};
</script>

<style>
</style>
