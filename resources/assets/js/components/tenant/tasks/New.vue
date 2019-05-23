<template>
  <div class="w-full">
    <button class="no-underline bttn bg-tolet-blue hover:bg-blue-ddark" @click="show">New</button>
      <modal name="open-task" height="auto" width="450" :draggable=true>
        
        <div class="container pb-0"><h4>New Task</h4></div>
        
<form class="w-full container mx-auto" enctype="multipart/form-data" @submit.prevent.once="submit">
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
    <button type="submit" class="btn btn-default">Create</button>
</form>
        
      
        
        </modal>
  </div>

</template>

<script>
  export default{
      props:['rentals'],
      data(){
        return {
           today:Date.now(),
           form:new Form({
              
                    'property':'',
                    'tasktype':'',
                    'duedate':'',
                    'priortylevel':'',
                    'ptype':'',
                    'assignedto_id':'',
                    'details':'',
                    'notify':'',
                    'file':null,
                    'created_by':'',
                    'tenant_id':''
                    
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
        
         handleFileUpload(){
        
          this.form.file = this.$refs.file.files[0];
       
        },
        submit(){
          
           let formData = new FormData();
           
            formData.append('property', this.form.property);
           // formData.append('unitnumber', this.form.unitnumber);
            formData.append('tasktype', this.form.tasktype);
            formData.append('duedate', this.form.duedate);
            formData.append('priortylevel', this.form.priortylevel);
            formData.append('ptype', this.form.ptype);
            formData.append('ptype', this.form.ptype);
            formData.append('details', this.form.details);
            formData.append('file', this.form.file);
           

          
          this.form.post('/tenant/tasks',formData, {
            headers: { 'content-type': 'multipart/form-data' }
        }).then(response => {
                  this.$modal.hide('open-task');
                  flash(response.message);
                 location.reload();
                }).catch(errors => {

                })
        },
        show(){
          
          this.$modal.show('open-task');
        }
      },
  }
</script>
