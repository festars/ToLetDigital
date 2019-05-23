<template>
  <div class="w-full">
    <button class="no-underline bttn bg-tolet-blue hover:bg-blue-ddark" @click="show">Create New Complain</button>
      <modal name="open-complain" height="auto" width="450" :draggable=true>
        <div class="container pb-0"><h4>Create New Complain</h4></div>
        <form class="w-full container mx-auto" enctype="multipart/form-data" @submit.prevent="submit">

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="">Address to:</label>
                
                <select class="form-control" v-model="form.ptype">
                    <option v-for="ptype in ptypes" :value="ptype" :key="ptype">{{ ptype }}</option>
                  </select>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('ptype')" v-text="form.errors.get('ptype')"></p>
                
              </div>
              <div class="form-group col-md-6">
                <label for="">Unit:</label>
               <select class="form-control"
                   v-model="form.room">
                    <option v-for="rental in rentals" :value="rental.rentable.id" :key="rental.rentable.id" selected="rental.rentable.id">{{ rental.rentable.name }}</option>
                  </select>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('room')" v-text="form.errors.get('room')"></p>
          
              </div>
            </div>
            
            
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="">Due Date:</label>
                
                <input type="date" name="duedate" class="form-control" v-model="form.duedate"/>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('duedate')" v-text="form.errors.get('duedate')"></p>
                
              </div>
              <div class="form-group col-md-6">
                <label for="">Upload file:</label>
                  <input type="file" name="file" class="form-control" />
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('file')" v-text="form.errors.get('file')"></p>
          
              </div>
            </div>
            
            <div class="form-group">
              <label for="">Give Details:</label>
                <textarea rows="3" class="form-control" v-model="form.description"></textarea>
                <p class="text-red text-xs italic my-2" v-if="form.errors.has('description')" v-text="form.errors.get('description')"></p>
                      
            </div>
             
            <button type="submit" class="btn btn-default">Submit</button>

        </form>
        </modal>
  </div>

</template>

<script>
  export default{
      props:['rentals'],
      data(){
        return {
           form:new Form({
                    'ptype':'',
                    'description':'',
                    'room':'',
                    'duedate':'',
                    'file':''
                }),
            ptypes:[
                'Agent',
                'Owner',
                'Vendor',
                'Admin'
            ],
        }
      },

      methods: {
        submit(){
          this.form.post('/tenant/complains').
                then(response => {
                  this.$modal.hide('open-complain');
                  flash(response.message);
                  location.reload();
                }).catch(errors => {

                })
        },
        show(){
          this.$modal.show('open-complain');
        }
      },
  }
</script>
