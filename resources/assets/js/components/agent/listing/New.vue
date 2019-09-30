<template>
  <div class="w-full">
    <button class="no-underline bttn bg-tolet-blue hover:bg-blue-ddark" @click="show">Create</button>
      <modal name="open-listing" height="auto" width="450" :draggable=true>
        
        <div class="container pb-0"><h4>Create Property</h4></div>
        
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
                <p class="text-red text-xs italic my-2" v-if="form.errors.has('notes')" v-text="form.errors.get('notes')"></p>
              </div>
              
              
        
        <div class="form-row">
            <div class="col">
              <div class="form-group">
                <label for="">Property Type</label>
                <select class="form-control" v-model="form.ptype">
                    <option v-for="ptype in ptypes" :value="ptype.id" :key="ptype.id">{{ ptype.name }}</option>
                  </select>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('ptype')" v-text="form.errors.get('ptype')"></p>
              </div>
            </div>
            <div class="col">
                <div class="form-group">
                  <label for="">Property Owner</label>
                 <select class="form-control" v-model="form.owner">
                    <option v-for="owner in owners" :value="owner.id" :key="owner.id">{{ owner.name }}</option>
                  </select>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('owner')" v-text="form.errors.get('owner')"></p>
                </div>
            </div>
          </div>
          
          
          
          <div class="form-row">
            <div class="col">
              <div class="form-group">
                <label for="">Payment Option</label>
                <select class="form-control" v-model="form.pmode">
                    <option v-for="pmode in pmodes" :value="pmode.id" :key="pmode.id">{{ pmode.name }}</option>
                  </select>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('pmode')" v-text="form.errors.get('pmode')"></p>
                </div>
            </div>
            
          </div>
          
          <div class="form-group">
                  <label for="">Payment Details</label>
                <textarea class="form-control" v-model="form.pdetails"></textarea>
                <p class="text-red text-xs italic my-2" v-if="form.errors.has('pdetails')" v-text="form.errors.get('pdetails')"></p>
              </div>
            
              <button type="submit" class="btn btn-default">Create</button>
        </form>
        </modal>
  </div>

</template>

<script>
  export default{
      props:[
        'ptypes',
        'owners',
        'pmodes',
        'payment_types'
      ],
      data(){
        return {
           form:new Form({
                    'ptype'       :'',
                    'owner'       :'',
                    'name'        :'',
                    'pmode'       :'',
                    //'payment_type':'',
                    'pdetails'    :'',
                    'location'    :'',
                    'country'     :'',
                    'land'        :'',
                    'color'       :'',
                    'notes'       :''
                }),
          'countries':window.App.countries,
        }
      },

      methods: {
        submit(){
          this.form.post('/agent/listing').
                then(response => {
                  this.$modal.hide('open-listing');
                  flash(response.message);
                  location.reload();
                }).catch(errors => {

                })
        },
        show(){
          this.$modal.show('open-listing');
        }
      },
  }
</script>
