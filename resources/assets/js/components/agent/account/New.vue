<template>
  <div class="w-full">
    <button class="no-underline bttn bg-tolet-blue hover:bg-blue-ddark" @click="show">Create</button>
      <modal name="open-room" height="auto" width="450" :draggable=true :scrollable=true>
        
        <div class="container pb-0">
          <h4>Add Account</h4>
        </div>
        
       <form class="w-full container mx-auto" @submit.prevent="submit">
         
         <div class="form-group">
              <label for="">Name</label>
             <autocomplete
              url="/agent/account/search?q="
              anchor="name"
              label="Names"
              ref="autocomplete"
              :min="3"
              :classes="{ wrapper: 'form-wrapper', input: 'form-control', list: 'data-list', item: 'data-list-item' }"
              :onSelect="getData"
              :onInput="setValue">
            </autocomplete>
            <p class="text-red text-xs italic my-2" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></p>
          </div>
         
         <div class="form-row">
            <div class="col-auto">
                <div class="form-group">
                  <label for="">Cur</label>
                  <select required class="form-control" v-model="form.currency">
                    <option v-for="currency in currencies" :value="currency" :key="currency" selected="currency">{{ currency }}</option>
                  </select>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('currency')" v-text="form.errors.get('currency')"></p>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                  <label for="">Amount</label>
                  <input type="text" required class="form-control" v-model="form.amount">
                <p class="text-red text-xs italic my-2" v-if="form.errors.has('amount')" v-text="form.errors.get('amount')"></p>
              </div>
            </div>
            <div class="col">
                <div class="form-group">
                  <label for="">Frequency</label>
                  <select required class="form-control" v-model="form.period">
              <option v-for="(period,key) in periods" :value="key" :key="key">{{ period }}</option>
                  </select>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('period')" v-text="form.errors.get('period')"></p>
                </div>
            </div>
          </div>
          
          <div class="form-group">
              <label for="">Property</label>
<select class="form-control" v-model="form.property">
              <option v-for="(property,index) in listing" :value="index" :key="index">{{ property }}</option>
            </select>
            <p class="text-red text-xs italic my-2" v-if="form.errors.has('property')" v-text="form.errors.get('property')"></p>
          
          </div>
         
         <button type="submit" class="btn btn-default">Create</button>
         
        </form>
        </modal>
  </div>

</template>

<script>
  import Autocomplete from 'vue2-autocomplete-js'
  export default{
    props:{
        'room':String,
        'properties':Object
      },

    components: {
        Autocomplete,
    },
    

    data(){
        return {
          periods: App.periods,
          currencies:App.currencies,
          listing:this.properties,
          form:new Form({
                    'name':this.fullname,
                    'period':'',
                    'currency':'',
                    'property':'',
                    'amount':'',
                    'accountable':this.room
                }),
          }
      },
       mounted(){
      console.log(typeof(this.properties));
    },

    methods: {
     
      submit(){
          this.form.post('/agent/account').
                then(response => {
                  console.log(response);
                  this.$modal.hide('open-room');
                  flash(response.message);
                  location.reload();
                }).catch(errors => {
                   console.log(errors);
                })
        },
      show(){
          this.$modal.show('open-room');
      },
      getData(obj){
          this.form.name = obj.name;
      },
      setValue(val){
        this.form.name = val;
      }
    },
  }
</script>

<style>
.data-list{
      position: absolute;
    z-index: 9;
    max-width: 250px;
    height: auto;
    width: 100%;

}
  .autocomplete ul {
        width: 100%;
    border: solid 1px #e6e6e6;
  }
  .autocomplete ul:before {
    border-bottom: 10px solid #ececec !important;
}
</style>
