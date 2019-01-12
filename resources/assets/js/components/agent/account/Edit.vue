<template>
  <div class="w-full">
    <button class="no-underline bttn bg-tolet-blue hover:bg-blue-ddark" @click="show">Edit</button>
      <modal :name="name" height="auto" width="900" :draggable=true>
       <form class="bg-white rounded px-8 pt-6 pb-8 mb-4 mx-4" @submit.prevent="submit">
        <p class="flex justify-center items-center"><h3 class="uppercase">Edit Account</h3></p>
        <div class="mb-4 flex justify-between">
          <div class="flex items-center w-1/2 mx-2">
            <label class="label w-1/4" for="username">
              Name
            </label>
            <input class="outline-0 bg-grey text-black font-bold py-2 text-center flex-1" v-model="form.name" />
            <p class="text-red text-xs italic my-2" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></p>
          </div>
          <div class="flex items-center mx-2 w-1/2">
            <label class="label w-1/4">
             Frequency
            </label>
            <select class="outline-0 bg-grey text-blue-dark py-2 text-center flex-1" v-model="form.period">
              <option class="text-center" v-for="(period,key) in periods" :value="key" :key="key" selected="period.id==account.period_id">{{ period }}</option>
            </select>
            <p class="text-red text-xs italic my-2" v-if="form.errors.has('period')" v-text="form.errors.get('period')"></p>
          </div>
        </div>

        <div class="mb-4 flex justify-between items-center">
          <div class="flex items-center mx-2 w-1/2">
            <label class="label w-1/4">
             Currency
            </label>
            <select class="outline-0 bg-grey text-blue-dark py-2 text-center flex-1" v-model="form.currency">
              <option class="text-center" v-for="currency in currencies" :value="currency" :key="currency">{{ currency }}</option>
            </select>
            <p class="text-red text-xs italic my-2" v-if="form.errors.has('currency')" v-text="form.errors.get('currency')"></p>
          </div>
          <div class="flex items-center mx-2 w-1/2">
            <label class="label w-1/4">
             Amount
            </label>
            <input class="outline-0 bg-grey text-black font-bold py-2 text-center flex-1" v-model="form.amount" />

            <p class="text-red text-xs italic my-2" v-if="form.errors.has('amount')" v-text="form.errors.get('amount')"></p>
          </div>
        </div>
          <div class="flex items-center justify-between">
            <button class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded" type="submit">
             Create
            </button>

          </div>
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
