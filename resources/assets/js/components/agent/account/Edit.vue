<template>
  <div class="w-full">
    <button class="no-underline bttn bg-tolet-blue hover:bg-blue-ddark" @click="show">Edit</button>
      
        
        
        <modal :name="name" height="auto" width="450" :draggable=true :scrollable=true>
        
        <div class="container pb-0">
          <h4>Update Account</h4>
        </div>
        
       <form class="w-full container mx-auto" @submit.prevent="submit">
         
         <div class="form-group">
              <label for="">Name</label>
            <input class="form-control" v-model="form.name" />
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
         
         <button type="submit" class="btn btn-default">Update</button>
         
        </form>
        </modal>
        
  </div>

</template>

<script>
  import Autocomplete from 'vue2-autocomplete-js'
  export default{
    mounted(){
      this.load();
    },
    props:[
        'account',
      ],

    components: {
        Autocomplete,
    },

    data(){
        return {
          periods: App.periods,
          currencies:App.currencies,
          form:new Form({
                    'name':this.fullname,
                    'period':'',
                    'currency':'',
                    'amount':'',
                }),
          name:'edit-account'+this.account.id
          }          
      },

    methods: {
         load(){
           Object.assign(this.form, {
                  id:this.account.id,
                  name:this.account.name,
                  period:this.account.period.id,
                  amount:this.account.amount,
                  currency:this.account.currency
          });
        },
        submit(){
          this.form.put(`/agent/account/${this.form.id}`).
                then(response => {
                  console.log(response);
                  this.$modal.hide(this.name);
                  flash(response.message);
                  location.reload();
                }).catch(errors => {
                   console.log(errors);
                })
        },
      show(){
          this.$modal.show(this.name);
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
