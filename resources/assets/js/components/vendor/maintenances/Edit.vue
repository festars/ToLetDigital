<template>
  <div >
    <a href="" class="no-underline px-2 py-1 border-2 border-transparent hover:border-grey-lighter text-lg text-black rounded" @click.prevent="show" :draggable=true>
        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-teal" width="24" height="24" viewBox="0 0 24 24">
            <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
            <path d="M0 0h24v24H0z" fill="none"/>
        </svg>
        Edit
    </a>
      <modal :name="name" height="auto" width="900" :draggable=true>
       <form class="w-full container mx-auto" enctype="multipart/form-data" @submit.prevent.once="submit">
            
            <div class="flex flex-wrap -mx-3 mb-2">   
                <p class="text-black text-xl font-bold">New maintenance</p>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
               <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                 Apartment:
                </label>
                <div class="relative">
                  <input type="text" required class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight"
                  >
                    <!--<option v-for="rental in rentals" :value="rental.id" :key="rental.id" selected="rental.id">{{ rental.name }}</option>-->
              
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
                    <option v-for="room in rooms" :value="room.id" :key="room.id" selected="room.id"  >{{ room.name }}</option>
                  </select>
                  <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                  </div>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('unit')" v-text="form.errors.get('unit')"></p>
                </div>
              </div>
              
              
    
              
            </div>
            
            <div class="flex flex-wrap -mx-3 mb-6">
                
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                 Address to:
                </label>
                <div class="relative">
                  <select required class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight" v-model="form.ptype">
                    <option v-for="ptype in ptypes" :value="ptype" :key="ptype" selected="ptype">{{ ptype }}</option>
                  </select>
                  <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                  </div>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('ptype')" v-text="form.errors.get('ptype')"></p>
                </div>
              </div>
              
              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                 Maintenance Type:
                </label>
                <div class="relative">
                  <select required class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight"
                   v-model="form.maintenancetype">
                    <option v-for="type in types" :value="type" :key="type" selected="type">{{ type }}</option>
                  </select>
                  <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                  </div>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('maintenancetype')" v-text="form.errors.get('maintenancetype')"></p>
                </div>
              </div> 
              

              
            </div>
           
             
          <div class="flex flex-wrap -mx-3 mb-6">
            <div class="flex flex-wrap -mx-3 mb-2">   
              <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                <label  class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-state">
                  Due Date:
                </label>
               <input required type="date" min="today"  class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight" v-model="form.duedate"/>
                <p class="text-red text-xs italic my-2" v-if="form.errors.has('duedate')" v-text="form.errors.get('duedate')"></p>
              </div>
            </div>
            
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                Cause:
                </label>
                <div class="relative">
                  <select required class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight" v-model="form.cause">
                    <option v-for="cause in causes" :value="cause" :key="cause" selected="cause">{{ cause }}</option>
                  </select>
                  <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                  </div>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('cause')" v-text="form.errors.get('cause')"></p>
                </div>
              </div>
              </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-state">
                 Maintainance Cost:
                </label>
                <input type="number" required  class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 leading-tight" v-model="form.cost"/>
                <p class="text-red text-xs italic my-2" v-if="form.errors.has('cost')" v-text="form.errors.get('cost')"></p>
              </div>
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                 Action:
                </label>
                <div class="relative">
                  <select required class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight"
                   v-model="form.action">
                    <option v-for="action in actions" :value="action" :key="action" selected="action">{{ action }}</option>
                  </select>
                  <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                  </div>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('action')" v-text="form.errors.get('action')"></p>
                </div>
              </div>
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-state">
                  Notes:
                </label>
                <textarea required rows="6" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 leading-tight" v-model="form.notes"></textarea>
                <p class="text-red text-xs italic my-2" v-if="form.errors.has('notes')" v-text="form.errors.get('notes')"></p>
              </div>
            
          
        </div>
            <div class="flex justify-end items-center">
              <button type="submit" class="bg-green py-2 px-6 text-white font-bold rounded">Update</button>
            </div>
        </form>
        </modal>
  </div>

</template>

<script>
import _ from 'lodash';
  export default{
       mounted(){
        this.load();
      },
      
      props:['item','rentals'],
      data(){
        return {
           today:Date.now(),
           rooms:[],
           name:"edit-maintenance"+this.item.id,
           form:new Form({
              
                    'property':'',
                    'unit':'',
                    'maintenancetype':'',
                    'duedate':'',
                    'cause':'',
                    'notes':'',
                    'ptype':'',
                    'action':'',
                    'cost':'',
                    
                    
                }),
            ptypes:[
                'Landlord',
                'Owner',
                'Vendor',
                'Other'
                
            ],
            types:[
                'Periodic Maintenance',
                'Preventive Maintenance',
                'Emergency Maintenance'
              
              ],
            causes:[
              "Renters Fault",
              "General Fault "
              ],
            actions:[
                "Repair",
                "overhaul",
                "Other"
                ]
        }
      },
      
      methods: {
          
          load(){
           Object.assign(this.form, {
                  id:this.item.id,
                  property:this.item.property,
                  maintenancetype:this.item.maintenancetype,
                  duedate:this.item.duedate,
                  cause:this.item.cause,
                  notes:this.item.notes,
                  ptype:this.item.ptype,
                  action:this.item.action,
                  cost:this.item.cost,
                  unit:this.item.unit,
              
          });
          //this.listofrooms();
        },
          
        //  listofrooms(){
        //     var apt =_.find(this.rentals, { 'id': this.item.property })
        //     console.log(apt);
        //     this.rooms= apt.rooms;
        //  },
        
         handleFileUpload(){
        
          this.form.file = this.$refs.file.files[0];
       
        },
    
        submit(){
          
           let formData = new FormData();
           
            formData.append('property', this.form.property);
            formData.append('unit', this.form.unit);
            formData.append('maintenancetype', this.form.maintenancetype);
            formData.append('duedate', this.form.duedate);
            formData.append('cause', this.form.cause);
            formData.append('ptype', this.form.ptype);
            formData.append('notes', this.form.notes);
            formData.append('action', this.form.action);
            formData.append('cost', this.form.cost);
           
          
            this.form.post('/agent/maintenance',formData, {
            headers: { 'content-type': 'multipart/form-data' }
        }).then(response => {
                  this.$modal.hide(this.name);
                  flash(response.message);
                 //location.reload();
                }).catch(errors => {

                })
        },
        show(){
          this.$modal.show(this.name);
        }
      },
  }
</script>
