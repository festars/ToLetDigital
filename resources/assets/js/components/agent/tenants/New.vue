<template>
  <div class="mr-4">
    <button class="no-underline bttn bg-tolet-blue hover:bg-blue-dark" @click="show">Create</button>
      <modal name="open-tenant" height="auto" width="450" :draggable=true>
       <div class="container pb-0"><h4>New Tenant</h4></div>
       
       <form class="w-full container mx-auto" @submit.prevent="submit">
         
         
         <div class="form-row">
            <div class="col-auto">
              <div class="form-group">
                <label for="">Title</label>
                  <select class="form-control"  v-model="form.title">
                      <option value="Mr">Mr</option>
                      <option value="Mrs">Mrs</option>
                      <option value="Ms" >Ms</option>
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
         
         
         <div class="form-group">
            <label for="">Apartment</label>
            <select required class="form-control"
                   v-model="form.property" @change="listofrooms">
                    <option v-for="rental in rentals" :value="rental.id" :key="rental.id" selected="rental.id">{{ rental.name }}</option>
                  </select>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('property')" v-text="form.errors.get('property')"></p>
                </div>
                
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                  <label for="">Unit</label>
                 <select required class="form-control"
                   v-model="form.unit">
                    <option v-for="room in rooms" :value="room.id" :key="room.id" >{{ room.name }}</option>
                  </select>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('unit')" v-text="form.errors.get('unit')"></p>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                  <label for="">Type</label>
                  <select required class="form-control"
                   v-model="form.type">
                    <option value="Main Tenant" selected>Main Tenant</option>
                    <option value="Co Tenant" >Co Tenant</option>
                  </select>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('type')" v-text="form.errors.get('type')"></p>
                </div>
            </div>
            
            <div class="col">
                <div class="form-group">
                  <label for="">Country</label>
                  <select class="form-control" v-model="form.country">
              <option v-for="(value,key) in countries" :value="key" :key="key">{{value}}</option>
            </select>

            <p class="text-red text-xs italic my-2" v-if="form.errors.has('country')" v-text="form.errors.get('country')"></p>
          </div>
            </div>
            
          </div>
         
            
            <button class="btn btn-default" type="submit">
             Create
            </button>

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
        property:"",
        title:"",
        type:""
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
      this.form.title = group.selectedObject.title;
      this.form.type = group.selectedObject.type;
    },
    enterPressed() {
      console.log("enter pressed here");
    },
    show() {
      console.log(this.rentals);
      
      this.$modal.show("open-tenant");
    }
  }
};
</script>
