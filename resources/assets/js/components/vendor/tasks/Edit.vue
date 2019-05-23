<template>
  <div>
    <a href="" class="btn btn-warning" @click.prevent="show" :draggable=true>
        Edit
    </a>
       <modal :name="name" height="auto" width="450" :draggable=true>
         
         <div class="container pb-0">
           <h4>Edit Task</h4>
         </div>
         
       <form class="w-full container mx-auto" enctype="multipart/form-data" @submit.prevent="submit">
            <div class="flex flex-wrap -mx-3 mb-2">   
                <p class="text-black text-xl font-bold">Edit Task</p>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
             
                  

               <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                 Apartment:
                </label>
                <div class="relative">
                  <select required class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight"
                   v-model="form.property">
                    <option v-for="rental in rentals" :value="rental.rentable.id" :key="rental.rentable.id" selected="rental.rentable.id">{{ rental.rentable.name }}</option>
                  </select>
                  <div class="pointer-events-none absolute pin-y pin-r flex tasks-center px-2 text-grey-darker">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                  </div>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('property')" v-text="form.errors.get('property')"></p>
                </div>
              </div>
              
               <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                 Address to:
                </label>
                <div class="relative">
                  <select required class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight" v-model="form.ptype">
                    <option v-for="ptype in ptypes" :value="ptype" :key="ptype" selected="ptype">{{ ptype }}</option>
                  </select>
                  <div class="pointer-events-none absolute pin-y pin-r flex tasks-center px-2 text-grey-darker">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                  </div>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('ptype')" v-text="form.errors.get('ptype')"></p>
                </div>
              </div>
              
            </div>
            
            <div class="flex flex-wrap -mx-3 mb-6">
              
              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                 Task Type:
                </label>
                <div class="relative">
                  <select required class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight"
                   v-model="form.tasktype">
                    <option v-for="type in types" :value="type" :key="type" selected="type">{{ type }}</option>
                  </select>
                  <div class="pointer-events-none absolute pin-y pin-r flex tasks-center px-2 text-grey-darker">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                  </div>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('tasktype')" v-text="form.errors.get('tasktype')"></p>
                </div>
              </div> 
              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-state">
                  Give Detail:
                </label>
                <textarea required rows="6" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 leading-tight" v-model="form.details"></textarea>
                <p class="text-red text-xs italic my-2" v-if="form.errors.has('details')" v-text="form.errors.get('details')"></p>
              </div>

              
            </div>
            
          <div class="flex flex-wrap -mx-3 mb-6">
            <div class="flex flex-wrap -mx-3 mb-2">   
              <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-state">
                  Due Date:
                </label>
               <input required type="date" min="today"  class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight" v-model="form.duedate"/>
                <p class="text-red text-xs italic my-2" v-if="form.errors.has('duedate')" v-text="form.errors.get('duedate')"></p>
              </div>
            </div>
            
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                Priority:
                </label>
                <div class="relative">
                  <select required class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight" v-model="form.priortylevel">
                    <option v-for="priority in priorities" :value="priority" :key="priority" selected="priority">{{ priority }}</option>
                  </select>
                  <div class="pointer-events-none absolute pin-y pin-r flex tasks-center px-2 text-grey-darker">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                  </div>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('priortylevel')" v-text="form.errors.get('priortylevel')"></p>
                </div>
              </div>
              </div>
  
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="flex flex-wrap -mx-3 mb-2">   
              <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-state">
                  Upload support document:
                </label>
               <input  type="file" id="file" ref="file" v-on:change="handleFileUpload()"/>
                <p class="text-red text-xs italic my-2" v-if="form.errors.has('file')" v-text="form.errors.get('file')"></p>
              </div>
            </div>
            
          
            </div>
            <div class="flex justify-end tasks-center">
              <button type="submit" class="bg-green py-2 px-6 text-white font-bold rounded">Update</button>
            </div>
        </form>
        </modal>
  </div>

</template>

<script>
import moment from "moment" 
  export default{
      mounted(){
        this.load();
      },

      props:[
         'task',
         'rentals',
         
      ],
      data(){
        return {
           name:"edit-task-"+this.task.id,

           form:new Form({
                   
                    'property':'',
                    'unitnumber':'',
                    'tasktype':'',
                    'duedate':'',
                    'priortylevel':'',
                    'ptype':'',
                    'details':'',
                    'file':'',
           }),
            ptypes:[
                'Agent',
                'Owner',
                'Other'
                
            ],
            types:[
              'Maintance Request',
              'Administrative'
              ],
            priorities:[
              "Normal",
              "Medium",
              "High"
              ]
        }
      },
      
      
      methods: {
        load(){
          
           Object.assign(this.form, {
                  property:this.task.property,
                  unitnumber:this.task.unitnumber,
                  tasktype:this.task.tasktype,
                  duedate:moment(new Date(this.task.duedate)).format('YYYY-MM-D'),
                  priortylevel:this.task.priortylevel,
                  ptype:this.task.ptype,
                  details:this.task.details,
                  file:this.task.file
          });
        },
        submit(){
          this.form.put(`/vendor/tasks/${this.task.id}`,{ params: this.task }).
                then(response => {
                    console.log(response);
                  this.$modal.hide(this.name);
                  flash(response.message);
                  location.reload();
                }).catch(errors => {

                })
        },
        show(){
          this.$modal.show(this.name);
        }
      },
  }
</script>
