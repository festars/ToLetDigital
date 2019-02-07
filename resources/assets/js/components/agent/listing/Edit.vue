<template>
  <div>
    <button class="no-underline bttn bg-indigo hover:bg-blue-ddark" @click="show">Edit</button>
      <modal :name="name" height="auto" width="900" :draggable=true>
       <form class="w-full container mx-auto" @submit.prevent="submit">
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                 Property Type
                </label>
                <div class="relative">
                  <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight" 
                    v-model="form.ptype">
                    <option v-for="ptype in ptypes" :value="ptype.id" :selected="form.ptype==ptype.id" :key="ptype.id">{{ ptype.name }}</option>
                  </select>
                  <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                  </div>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('ptype')" v-text="form.errors.get('ptype')"></p>
                </div>
              </div>
              <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                  Property Owner
                </label>
                <div class="relative">
                  <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight" 
                  v-model="form.owner">
                    <option v-for="owner in owners" :value="owner.id" :key="owner.id" :selected="form.owner == owner.id">{{ owner.name }}</option>
                  </select>
                  <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                  </div>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('owner')" v-text="form.errors.get('owner')"></p>
                </div>
              </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                 Name
                </label>
                <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3 leading-tight" v-model="form.name" type="text" placeholder="Tolet Apartment">
                <p class="text-red text-xs italic my-2" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></p>
              </div>
              <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                  Location
                </label>
                <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 leading-tight" v-model="form.location" type="text" placeholder="Doe">
                <p class="text-red text-xs italic my-2" v-if="form.errors.has('location')" v-text="form.errors.get('location')"></p>
              </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-2">
              <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-state">
                  Plot No
                </label>
                <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 leading-tight" v-model="form.land" type="text" placeholder="E/L 8976">
                <p class="text-red text-xs italic my-2" v-if="form.errors.has('land')" v-text="form.errors.get('land')"></p>
              </div>
              <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-state">
                  Main color
                </label>
                <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 leading-tight" v-model="form.color" type="text" placeholder="blue">
                <p class="text-red text-xs italic my-2" v-if="form.errors.has('color')" v-text="form.errors.get('color')"></p>
              </div>
              <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-state">
                  Notes
                </label>
                <textarea class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 leading-tight" v-model="form.description"></textarea>
                <p class="text-red text-xs italic my-2" v-if="form.errors.has('description')" v-text="form.errors.get('description')"></p>
              </div>
            </div>


             <div class="flex flex-wrap -mx-3 mb-2">
              <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                  Country
                </label>
                <div class="relative">
                  <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight" 
                  v-model="form.country">
                    <option v-for="(value,key) in countries" :value="key" :key="key" :selected="form.country == key">{{ value }}</option>
                  </select>
                  <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                  </div>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('country')" v-text="form.errors.get('country')"></p>
                </div>
              </div>
            </div>

            <div class="flex justify-end items-center">
              <button type="submit" class="bg-blue py-2 px-6 text-white font-bold rounded">Update</button>
            </div>
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
