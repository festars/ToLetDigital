<template>
  <div class="mr-4">
    <button class="no-underline bttn bg-tolet-blue hover:bg-blue-dark" @click="show">Create</button>
      <modal name="open-tenant" height="auto" width="900" :draggable=true>
       <form class="bg-grey-lightest rounded px-8 pt-6 pb-8 mb-4 mx-4" @submit.prevent="submit">
        <p class="flex justify-center items-center"><h3 class="uppercase">New Tenant</h3></p>
            <div class="mb-4 flex justify-between">
          <div class="flex items-center w-1/2 mx-2">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="username">
              Email
            </label>
            <input class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight" type="email" v-model="form.email" />
            <p class="text-red text-xs italic my-2" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></p>
          </div>
          <div class="flex items-center mx-2 w-1/2">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                A/T Email
            </label>
            <input class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight" type="email" v-model="form.aemail" />
            <p class="text-red text-xs italic my-2" v-if="form.errors.has('aemail')" v-text="form.errors.get('aemail')"></p>
          </div>
        </div>
        <div class="mb-4 flex justify-between">
          <div class="flex items-center w-1/2 mx-2">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="username">
              Name
            </label>
            <input class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight" v-model="form.name" />
            <p class="text-red text-xs italic my-2" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></p>
          </div>
          <div class="flex items-center mx-2 w-1/2">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                ID Number
            </label>
            <input class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight" v-model="form.idnumber" />
            <p class="text-red text-xs italic my-2" v-if="form.errors.has('idnumber')" v-text="form.errors.get('idnumber')"></p>
          </div>
        </div>
        <div class="mb-4 flex justify-between items-center">
          <div class="flex items-center mx-2 w-1/2">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
             Phone Number
            </label>
            <input class="outline-0 bg-grey text-blue-dark py-2 text-center flex-1" v-model="form.phone" />

            <p class="text-red text-xs italic my-2" v-if="form.errors.has('phone')" v-text="form.errors.get('phone')"></p>
          </div>
          <div class="flex items-center mx-2 w-1/2">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
             A/T Phone
            </label>
            <input class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight" v-model="form.aphone" />

            <p class="text-red text-xs italic my-2" v-if="form.errors.has('aphone')" v-text="form.errors.get('aphone')"></p>
          </div>
        </div>
          <div class="flex flex-wrap -mx-3 mb-6">
               <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                 Apartment:
                </label>
                <div class="relative">
                  <select required class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight"
                   v-model="form.property" @change="listofrooms">
                    <option v-for="rental in rentals" :value="rental.id" :key="rental.id" selected="rental.id">{{ rental.name }}</option>
                  </select>
                  <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                  </div>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('property')" v-text="form.errors.get('property')"></p>
                </div>
              </div>
             
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                 Unit:
                </label>
                <div class="relative">
                  <select required class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight"
                   v-model="form.unit">
                    <option v-for="room in rooms" :value="room.id" :key="room.id" >{{ room.name }}</option>
                  </select>
                  <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                  </div>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('unit')" v-text="form.errors.get('unit')"></p>
                </div>
              </div>
              
              
    
              
            </div>
            
            
        <div class="mb-4 flex justify-between items-center w-1/2">
          <div class="flex items-center mx-2 w-1/2">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2 ">
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
             Create
            </button>
          </div>
            
        </form>
        </modal>
  </div>

</template>

<script>
import Autocomplete from "vuejs-auto-complete";
export default {
  props: ["rentals"],

  components: {
    Autocomplete
  },

  data() {
    return {
      rooms:'',
      form: new Form({
        name: "",
        idnumber: "",
        email: "",
        phone: "",
        aemail: "",
        aphone: "",
        country: "",
        unit: "",
        property:""
      }),
      countries: window.App.countries
    };
  },

  methods: {
    
    submit() {
      this.form
        .post("/agent/tenant")
        .then(response => {
          this.$modal.hide("open-tenant");
          flash(response.message);
          location.reload();
        })
        .catch(errors => {});
    },
    listofrooms(){
            var apt =_.find(this.rentals, { 'id': this.form.property })
            this.rooms= apt.rooms;
         },
    setDefault(group) {
      this.form.name = group.selectedObject.name;
      this.form.email = group.selectedObject.email;
      this.form.phone = group.selectedObject.phone;
      this.form.aemail = group.selectedObject.email;
      this.form.aphone = group.selectedObject.phone;
      this.form.country = group.selectedObject.country;
      this.form.unit = group.selectedObject.unit;
      this.form.property = group.selectedObject.property;
    },
    enterPressed() {
      console.log("enter pressed here");
    },
    show() {
      this.$modal.show("open-tenant");
    }
  }
};
</script>
