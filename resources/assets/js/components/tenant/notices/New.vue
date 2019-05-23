<template>
  <div class="w-full">
    <button class="no-underline bttn bg-tolet-blue hover:bg-blue-ddark" @click="show">New notice</button>
      <modal name="open-notice" height="auto" width="450" :draggable=true>
        
      <div class="container pb-0"><h4>New Notice</h4></div>
        
       <form class="w-full container mx-auto" @submit.prevent="submit">
         
          <div class="form-row">
            <div class="col">
                <div class="form-group">
                  <label for="">Address to:</label>
                  <select class="form-control" v-model="form.ptype">
                    <option v-for="ptype in ptypes" :value="ptype" :key="ptype">{{ ptype }}</option>
                  </select>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('ptype')" v-text="form.errors.get('ptype')"></p>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                  <label for="">Unit</label>
                  <select class="form-control"
                   v-model="form.room">
                    <option v-for="rental in rentals" :value="rental.rentable.id" :key="rental.rentable.id" selected="rental.rentable.id">{{ rental.rentable.name }}</option>
                  </select>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('room')" v-text="form.errors.get('room')"></p>
                </div>
            </div>
          </div>
          
          <div class="form-group">
            <label for="">Move Date</label>
            <input type="date" name="movedate" class="form-control" v-model="form.movedate"/>
            <p class="text-red text-xs italic my-2" v-if="form.errors.has('movedate')" v-text="form.errors.get('movedate')"></p>
            </div>
            
          <div class="form-group">
            <label for="">Upload file</label>
            <input type="file" name="file" class="form-control" />
            <p class="text-red text-xs italic my-2" v-if="form.errors.has('file')" v-text="form.errors.get('file')"></p>
          </div>
         
         <div class="form-group">
            <label for="">Reason of Move</label>
            <textarea rows="3" class="form-control" v-model="form.reason"></textarea>
            <p class="text-red text-xs italic my-2" v-if="form.errors.has('reason')" v-text="form.errors.get('reason')"></p>
          </div>
         
         <div class="form-group">
            <label for="">Comment</label>
            <textarea rows="3" class="form-control" v-model="form.comment"></textarea>
            <p class="text-red text-xs italic my-2" v-if="form.errors.has('comment')" v-text="form.errors.get('comment')"></p>
        </div>
        
        <div class="form-group">
            <label for="">Claim Depoist</label>
           <input type="checkbox"  v-model="form.deposit">
            <p class="text-red text-xs italic my-2" v-if="form.errors.has('deposit')" v-text="form.errors.get('deposit')"></p>
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
                    'reason':'',
                    'room':'',
                    'movedate':'',
                    'file':'',
                    'comment':'',
                    'deposit':false,
                }),
            ptypes:[
                'Agent',
                'Owner',
                'Vendor',
                
            ],
        }
      },

      methods: {
        submit(){
          this.form.post('/tenant/notices').
                then(response => {
                  this.$modal.hide('open-notice');
                  flash(response.message);
                 // location.reload();
                }).catch(errors => {

                })
        },
        show(){
          this.$modal.show('open-notice');
        }
      },
  }
</script>
