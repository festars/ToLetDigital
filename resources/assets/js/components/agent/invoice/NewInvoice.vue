<template>
  <div class="w-full">
    <button class="no-underline bttn bg-tolet-blue hover:bg-blue-ddark" @click="show">Create Invoice</button>
      <modal name="new-invoice" height="500" width="900" :draggable=true>
       <form class="w-full container mx-auto" @submit.prevent="submit">
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                 Period
                </label>
                <div >
                  <date-picker v-model="form.period" type="month" format="MMM-YYYY" lang="en" class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight"></date-picker>

                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('ptype')" v-text="form.errors.get('ptype')"></p>
                </div>
              </div>

            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                 Property
                </label>
            <div>
              <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight">
                   <option v-for="(property, index) in listings" :value="index">{{property}}</option>
              </select>
            </div>
              </div>

            </div>


            <div class="flex justify-end items-center">
              <button type="submit" class="bg-green py-2 px-6 text-white font-bold rounded">Create</button>
            </div>
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
                   location.replace('/agent/invoice');
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
