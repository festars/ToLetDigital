<template>
  <div>
    <button class="no-underline bttn bg-indigo hover:bg-blue-ddark" @click="show">Edit</button>
      <modal :name="name" height="auto" width="450" :draggable=true>
        
                <div class="container pb-0"><h4>Edit Property: {{ form.name }}</h4></div>
        
       <form class="w-full container mx-auto" @submit.prevent="submit">
         
         
          <div class="form-group">
            <label for="">Name</label>
            <input class="form-control" v-model="form.name" type="text" placeholder="Tolet Apartment">
            <p class="text-red text-xs italic my-2" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></p>
          </div>
          
          <div class="form-row">
            <div class="col">
              <div class="form-group">
                <label for="">Location</label>
                <input class="form-control" v-model="form.location" type="text" placeholder="Doe">
                <p class="text-red text-xs italic my-2" v-if="form.errors.has('location')" v-text="form.errors.get('location')"></p>
              </div>
            </div>
            <div class="col">
                <div class="form-group">
                  <label for="">Country</label>
                  <select class="form-control"  v-model="form.country">
                        <option v-for="(value,key) in countries" :value="key">{{value}}</option>
                      </select>
                </div>
            </div>
          </div>
         
         
         <div class="form-group">
            <label for="">Property Type</label>
           <select class="form-control" 
                    v-model="form.ptype">
              <option v-for="ptype in ptypes" :value="ptype.id" :selected="form.ptype==ptype.id" :key="ptype.id">{{ ptype.name }}</option>
            </select>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('ptype')" v-text="form.errors.get('ptype')"></p>
          </div>
          
          
          <div class="form-group">
            <label for="">Property Owner</label>
           <select class="form-control" 
                  v-model="form.owner">
                    <option v-for="owner in owners" :value="owner.id" :key="owner.id" :selected="form.owner == owner.id">{{ owner.name }}</option>
                  </select>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('owner')" v-text="form.errors.get('owner')"></p>
                </div>
         
         
         <div class="form-row">
            <div class="col">
              <div class="form-group">
                <label for="">Plot No</label>
                <input class="form-control" v-model="form.land" type="text" placeholder="E/L 8976">
                <p class="text-red text-xs italic my-2" v-if="form.errors.has('land')" v-text="form.errors.get('land')"></p>
              </div>
            </div>
            <div class="col">
                <div class="form-group">
                  <label for="">Main Color</label>
                  <input class="form-control" v-model="form.color" type="text" placeholder="blue">
                <p class="text-red text-xs italic my-2" v-if="form.errors.has('color')" v-text="form.errors.get('color')"></p>
              </div>
            </div>
          </div>
          
          <div class="form-group">
                  <label for="">Notes</label>
                  <textarea class="form-control" v-model="form.description"></textarea>
                <p class="text-red text-xs italic my-2" v-if="form.errors.has('description')" v-text="form.errors.get('description')"></p>
              </div>

              <button type="submit" class="btn btn-default">Update</button>
        </form>
        </modal>
  </div>

</template>

<script>
export default {
    props:[
        'item',
        'owners',
        'ptypes',
    ],

    mounted(){
        this.load();
    },

    data(){
        return {
            form:new Form({
                'ptype':'',
                'owner':'',
                'name':'',
                'location':'',
                'land':'',
                'color':'',
                'description':'',
                'country':'',
            }),
            name:'edit-listing'+this.item.id,
            countries: window.App.countries
        }
    },

    methods:{
           load(){
           Object.assign(this.form, {
                  id:this.item.id,
                  owner:this.item.owner.id,
                  ptype:this.item.property_type_id,
                  name:this.item.name,
                  location:this.item.location,
                  land:this.item.land,
                  color:this.item.color,
                  description:this.item.description,
                  country:this.item.country

          });
        },
        submit(){
          this.form.put(`/agent/listing/${this.form.id}`).
                then(response => {
                  this.$modal.hide(this.name);
                  flash(response.message);
                  location.reload();
                }).catch(errors => {

                })
        },
        show(){
          this.$modal.show(this.name);
        }
    }
}
</script>
