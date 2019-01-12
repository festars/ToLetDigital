<template>
<div>
    <modal name="login" height="auto" width="900">
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
    </modal>
</div>
</template>

<script>
export default {
  mounted() {
    this.$modal.show("login");
  },

  props: ["entity"],

  data() {
    return {
      form: new Form({
        username: "",
        password: ""
      }),
      message: ""
    };
  },

  methods: {
    hide() {
      this.$modal.hide("login");
      location.replace('/login');
    },

    login() {
      this.form
        .post("/" + this.entity + "/login")
        .then(response => {
          location.replace(response.url);
        })
        .catch(errors => {
          this.message = errors.message;
        });
    }
  }
};
</script>

<style scoped>
</style>