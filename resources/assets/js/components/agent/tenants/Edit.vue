<template>
  <div class="mr-4">
    <button class="no-underline bttn bg-tolet-blue hover:bg-blue-dark" @click="show">Edit</button>
      <modal :name="name" height="auto" width="450" :draggable=true>
           <div class="container pb-0"><h4>Edit Tenant: {{ form.name }}</h4></div>
           
       <form class="w-full container mx-auto" @submit.prevent="submit">
        
        <div class="form-row">
          <div class="col-auto">
                <div class="form-group">
                  <label for="">Title</label>
                 <select required class="form-control"  v-model="form.title">
                      <option :value="Mr" :key="Mr" selected>Mr</option>
                      <option :value="Mrs" :key="Mrs">Mrs</option>
                      <option :value="Ms" :key="Mrs">Ms</option>
                  </select>
                   <p class="text-red text-xs italic my-2" v-if="form.errors.has('title')" v-text="form.errors.get('title')"></p>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                  <label for="">Name</label>
                  <input class="form-control" v-model="form.name" />
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></p>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                  <label for="">ID Number</label>
                  <input class="form-control" v-model="form.idnumber" />
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('idnumber')" v-text="form.errors.get('idnumber')"></p>
                </div>
            </div>
          </div>
          
          
          <div class="form-row">
            <div class="col">
                <div class="form-group">
                  <label for="">Email</label>
                  <input class="form-control" type="email" v-model="form.email" />
                <p class="text-red text-xs italic my-2" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></p>
              </div>
            </div>
            <div class="col">
                <div class="form-group">
                  <label for="">Alternative Email</label>
                  <input class="form-control" type="email" v-model="form.aemail" />
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('aemail')" v-text="form.errors.get('aemail')"></p>
                </div>
            </div>
          </div>
          
          
           <div class="form-row">
            <div class="col">
                <div class="form-group">
                  <label for="">Phone Number</label>
                  <input class="form-control" v-model="form.phone" />

                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('phone')" v-text="form.errors.get('phone')"></p>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                  <label for="">Alternative Phone Number</label>
                  <input class="form-control" v-model="form.aphone" />

                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('aphone')" v-text="form.errors.get('aphone')"></p>
                  </div>
            </div>
          </div>
         
         
            <button class="btn btn-default" type="submit">
             Update
            </button>
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
        title: "",
        name: "",
        idnumber: "",
        email: "",
        phone: "",
        aemail: "",
        aphone: "",
        country: "",
        title: ""
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
