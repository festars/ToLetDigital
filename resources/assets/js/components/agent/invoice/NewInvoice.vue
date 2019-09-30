<template>
  <div class="w-full">
    <button class="no-underline bttn bg-tolet-blue hover:bg-blue-ddark" @click="show">Crete Invoice</button>
      <modal name="new-invoice" height="auto" width="450" :draggable=true style="overflow: unset !important;">
        
        <div class="container pb-0">
          <h4>Create Invoice</h4>
        </div>
        
       <form class="w-full container mx-auto" @submit.prevent="submit">
         
         <div class="form-row">
          <div class="col">
            <div class="form-group">
              <label for="">Period</label>
              <date-picker v-model="form.period" class="d-block" type="month" format="MMM-YYYY" lang="en"></date-picker>
              <p class="text-red text-xs italic my-2" v-if="form.errors.has('ptype')" v-text="form.errors.get('ptype')"></p>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
                <label for="">Property</label>
                <select class="form-control" v-model="form.property" >
                     <option v-for="(property, index) in listings" :value="index">{{property}}</option>
                </select>
                    <p class="text-red text-xs italic my-2" v-if="form.errors.has('ptype')" v-text="form.errors.get('ptype')"></p>
              </div>
        </div>
        </div>
        
            <!--<div class="flex justify-end items-center">
              <button type="submit" class="bg-green py-2 px-6 text-white font-bold rounded">Create</button>
            </div>-->
            <button type="submit" class="btn btn-default">Create</button>
        </form>
        </modal>
  </div>

</template>

<script>
  import DatePicker from 'vue2-datepicker'
  export default{
      props: ['properties'],
      components: { DatePicker },
      data(){
        return {
           form:new Form({
                    'period':new Date(),
                    'property':'',
                }),
          listings:this.properties,
        }
      },

      methods: {
        submit(){
          this.form.post('/agent/invoice').
                then(({data}) => {
                   this.$modal.hide('new-invoice');
                   location.replace('/agent/invoice?type=unpaid');
                   flash(data.message);
                }).catch(errors => {

                })
        },
        show(){
          this.$modal.show('new-invoice');
        }
      },

      computed:{
        monthdate(){
          return moment(this.form.period,'ddd MMM DD YYYY');
        }
      }
  }
</script>

<style scopped>
  .v--modal-overlay .v--modal-box{
    overflow: unset !important;
  }
</style>
