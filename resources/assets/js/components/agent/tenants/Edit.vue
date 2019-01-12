<template>
  <div class="mr-4">
    <button class="no-underline bttn bg-tolet-blue hover:bg-blue-dark" @click="show">Edit</button>
      <modal :name="name" height="auto" width="900" :draggable=true>
       <form class="bg-grey-lightest rounded px-8 pt-6 pb-8 mb-4 mx-4" @submit.prevent="submit">
        <p class="flex justify-center items-center"><h3 class="uppercase">Edit Tenant</h3></p>
            <div class="mb-4 flex justify-between">
          <div class="flex items-center w-1/2 mx-2">
            <label class="label w-1/4" for="username">
              Email
            </label>
            <input class="outline-0 bg-grey text-black font-bold py-2 text-center flex-1" type="email" v-model="form.email" />
            <p class="text-red text-xs italic my-2" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></p>
          </div>
          <div class="flex items-center mx-2 w-1/2">
            <label class="label w-1/4">
                A/T Email
            </label>
            <input class="outline-0 bg-grey text-black font-bold py-2 text-center flex-1" type="email" v-model="form.aemail" />
            <p class="text-red text-xs italic my-2" v-if="form.errors.has('aemail')" v-text="form.errors.get('aemail')"></p>
          </div>
        </div>
        <div class="mb-4 flex justify-between">
          <div class="flex items-center w-1/2 mx-2">
            <label class="label w-1/4" for="username">
              Name
            </label>
            <input class="outline-0 bg-grey text-black font-bold py-2 text-center flex-1" v-model="form.name" />
            <p class="text-red text-xs italic my-2" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></p>
          </div>
          <div class="flex items-center mx-2 w-1/2">
            <label class="label w-1/4">
                ID Number
            </label>
            <input class="outline-0 bg-grey text-black font-bold py-2 text-center flex-1" v-model="form.idnumber" />
            <p class="text-red text-xs italic my-2" v-if="form.errors.has('idnumber')" v-text="form.errors.get('idnumber')"></p>
          </div>
        </div>
        <div class="mb-4 flex justify-between items-center">
          <div class="flex items-center mx-2 w-1/2">
            <label class="label w-1/4">
             Phone Number
            </label>
            <input class="outline-0 bg-grey text-blue-dark py-2 text-center flex-1" v-model="form.phone" />

            <p class="text-red text-xs italic my-2" v-if="form.errors.has('phone')" v-text="form.errors.get('phone')"></p>
          </div>
          <div class="flex items-center mx-2 w-1/2">
            <label class="label w-1/4">
             A/T Phone
            </label>
            <input class="outline-0 bg-grey text-black font-bold py-2 text-center flex-1" v-model="form.aphone" />

            <p class="text-red text-xs italic my-2" v-if="form.errors.has('aphone')" v-text="form.errors.get('aphone')"></p>
          </div>
        </div>

        <div class="mb-4 flex justify-between items-center w-1/2">
          <div class="flex items-center mx-2 w-1/2">
            <label class="label w-1/4 ">
             Country
            </label>
            <select class="outline-0 bg-grey text-blue-dark py-2 text-center flex-1 rounded" v-model="form.country">
              <option v-for="(value,key) in countries" :value="key" :key="key">{{value}}</option>
            </select>

            <p class="text-red text-xs italic my-2" v-if="form.errors.has('country')" v-text="form.errors.get('country')"></p>
          </div>
        </div>



          <div class="flex items-center justify-between">
            <button class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded" type="submit">
             Update
            </button>
          </div>
        </form>
        </modal>
  </div>

</template>

<script>
import Autocomplete from "vuejs-auto-complete";
export default {
  props: ["tenant"],

   mounted(){
        this.load();
    },

  components: {
    Autocomplete
  },

  data() {
    return {
      form: new Form({
        name: "",
        idnumber: "",
        email: "",
        phone: "",
        aemail: "",
        aphone: "",
        country: "",
      }),
      countries: window.App.countries,
      name:'edit-tenant'+this.tenant.id
    };
  },

  methods: {
    submit() {
      this.form
        .put(`/agent/tenant/${this.tenant.id}`)
        .then(response => {
          this.$modal.hide(this.name);
          flash(response.message);
          location.reload();
        })
        .catch(errors => {});
    },
    load() {
        Object.assign(this.form,this.tenant); 
    },
    show() {
      this.$modal.show(this.name);
    }
  }
};
</script>
