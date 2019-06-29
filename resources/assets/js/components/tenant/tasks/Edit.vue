<template>
  <div>
    <a href="" class="btn btn-warning" @click.prevent="show" :draggable=true>
        
        Edit
    </a>
       <modal :name="name" height="auto" width="450" :draggable=true>
         
         <div class="container pb-0">
           <h4>New Task</h4>
         </div>
         
       <form class="w-full container mx-auto" enctype="multipart/form-data" @submit.prevent="submit">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="">Apartment:</label>
      
      <select required class="form-control"
       v-model="form.property">
        <option v-for="rental in rentals" :value="rental.rentable.id" :key="rental.rentable.id" selected="rental.rentable.id">{{ rental.rentable.name }}</option>
      </select>
      <p class="text-red text-xs italic my-2" v-if="form.errors.has('property')" v-text="form.errors.get('property')"></p>
      
    </div>
    <div class="form-group col-md-6">
      <label for="">Address to:</label>
      <select required class="form-control"
                   v-model="form.property">
                    <option v-for="rental in rentals" :value="rental.rentable.id" :key="rental.rentable.id" selected="rental.rentable.id">{{ rental.rentable.name }}</option>
                  </select>
      <p class="text-red text-xs italic my-2" v-if="form.errors.has('ptype')" v-text="form.errors.get('ptype')"></p>

    </div>
  </div>
  
  
  <div class="form-group">
    <label for="">Task Type:</label>
    <select required class="form-control"
                   v-model="form.property">
                    <option v-for="(type, key) in types" :value="type" :key="key">{{ type }}</option>
                  </select>
     <p class="text-red text-xs italic my-2" v-if="form.errors.has('tasktype')" v-text="form.errors.get('tasktype')"></p>

  </div>
  
  <div class="form-group">
    <label for="">Give Details:</label>
   <textarea required rows="3" class="form-control" v-model="form.details"></textarea>
                <p class="text-red text-xs italic my-2" v-if="form.errors.has('details')" v-text="form.errors.get('details')"></p>
            
  </div>
  
  
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Due Date:</label>
      
      <div class="form-group">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
        </div>
        <input class="form-control datepicker" min="today" v-model="form.duedate" placeholder="Select date" type="date" value="06/20/2018" required>
    </div>
</div>
      
      

    </div>
    <div class="form-group col-md-6">
      <label for="">Priority:</label>
      <select required class="form-control" v-model="form.priortylevel">
                    <option v-for="priority in priorities" :value="priority" :key="priority" selected="priority">{{ priority }}</option>
                  </select>

                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('priortylevel')" v-text="form.errors.get('priortylevel')"></p>
                
    </div>
  </div>
  <div class="form-group">
      <label for="">Supported Document:</label>
      <input type="file" id="file" ref="file" class="form-control" v-on:change="handleFileUpload()"/>
                <p class="text-red text-xs italic my-2" v-if="form.errors.has('file')" v-text="form.errors.get('file')"></p>
                     
    </div>
    
    
              <button type="submit" class="btn btn-default">Update</button>
              
              
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
          this.form.put(`/tenant/tasks/${this.task.id}`,{ params: this.task },).
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
