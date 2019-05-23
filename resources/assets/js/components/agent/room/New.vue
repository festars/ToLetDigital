<template>
  <div class="w-full">
    <button class="no-underline bttn bg-tolet-blue hover:bg-blue-ddark" @click="show">Create</button>
      <modal name="open-room" height="auto" width="450" :draggable=true>
        
        <div class="container pb-0"><h4>Create New Unit</h4></div>
        
       <form class="w-full container mx-auto" @submit.prevent="submit">
         
         <div class="form-group">
            <label for="">Name</label>
            <input class="form-control" v-model="form.name" />
            <p class="text-red text-xs italic my-2" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></p>
          </div>

        <div class="form-group">
            <label for="">Property</label>
            <select class="form-control" id="username" type="text" v-model="form.listing">
                <option v-for="listing in listings" :value="listing.id" :key="listing.id">{{ listing.name }}</option>
            </select>
            <p class="text-red text-xs italic my-2" v-if="form.errors.has('listing')" v-text="form.errors.get('listing')"></p>
          </div>
          
          
        <div class="form-row">
            <div class="col">
              <div class="form-group">
                <label for="">Unit Type</label>
                <select class="form-control" v-model="form.type">
                  <option v-for="rmtype in types" :value="rmtype.id" :key="rmtype.id">{{ rmtype.name }}</option>
                </select>
                <p class="text-red text-xs italic my-2" v-if="form.errors.has('type')" v-text="form.errors.get('type')"></p>
              </div>
            </div>
            <div class="col">
                <div class="form-group">
                  <label for="">Unit Size</label>
                  <input class="form-control" v-model="form.size" />
                <p class="text-red text-xs italic my-2" v-if="form.errors.has('size')" v-text="form.errors.get('size')"></p>
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
  export default{
      props:[
        'listings',
        'types'
      ],
      data(){
        return {
           form:new Form({
                    'listing':'',
                    'type':'',
                    'name':'',
                    'size':''
                }),
        }
      },

      methods: {
        submit(){
          this.form.post('/agent/room').
                then(response => {
                  this.$modal.hide('open-room');
                  flash(response.message);
                  location.reload();
                }).catch(errors => {

                })
        },
        show(){
          this.$modal.show('open-room');
        }
      },
  }
</script>
