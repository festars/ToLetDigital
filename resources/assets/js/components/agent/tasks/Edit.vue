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
            
            
            <div class="form-row">
              <div class="col">
                            <div class="form-group">
              <label for="">Apartment</label>
                <select required class="form-control"
                   v-model="form.property">
                    <option v-for="rental in rentals" :value="rental.rentable.id" :key="rental.rentable.id" selected="rental.rentable.id">{{ rental.rentable.name }}</option>
                  </select>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('property')" v-text="form.errors.get('property')"></p>
              </div>

              </div>
              <div class="col">
                            <div class="form-group">
              <label for="">Address to</label>
                <select required class="form-control" v-model="form.ptype">
                    <option v-for="ptype in ptypes" :value="ptype" :key="ptype" selected="ptype">{{ ptype }}</option>
                  </select>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('ptype')" v-text="form.errors.get('ptype')"></p>
                </div>

              </div>
            </div>
            
            
                
            
            <div class="form-group">
              <label for="">Task Type</label>
               <select required class="form-control"
                   v-model="form.tasktype">
                    <option v-for="type in types" :value="type" :key="type" selected="type">{{ type }}</option>
                  </select>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('tasktype')" v-text="form.errors.get('tasktype')"></p>
                </div>
                
            <div class="form-group">
              <label for="">Give Detail</label>
               <textarea required rows="3" class="form-control" v-model="form.details"></textarea>
                <p class="text-red text-xs italic my-2" v-if="form.errors.has('details')" v-text="form.errors.get('details')"></p>
              </div>
              
          <div class="form-row">
            <div class="col">
                <div class="form-group">
                  <label for="">Due Date</label>
                  <input required type="date" min="today"  class="form-control" v-model="form.duedate"/>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('duedate')" v-text="form.errors.get('duedate')"></p>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                  <label for="">Priority</label>
                  <select required class="form-control" v-model="form.priortylevel">
                    <option v-for="priority in priorities" :value="priority" :key="priority" selected="priority">{{ priority }}</option>
                  </select>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('priortylevel')" v-text="form.errors.get('priortylevel')"></p>
                </div>
            </div>
          </div>
          
          <div class="form-group">
            <label for="">Upload support document</label>
            <input class="form-control" type="file" id="file" ref="file" v-on:change="handleFileUpload()"/>
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
          this.form.put(`/agent/tasks/${this.task.id}`,{ params: this.task }).
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
