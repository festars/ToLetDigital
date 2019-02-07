<template>
  <div class="w-full">
    <button class="no-underline bttn bg-tolet-blue hover:bg-blue-ddark" @click="show">Email</button>
      <modal :name="name" height="auto" width="900" :draggable=true>
       <form class="w-full container mx-auto" @submit.prevent="submit">
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                 Email Invoice To:
                </label>
                <div >
                  <input type="text" class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight" v-model="form.email" ></input>

                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></p>
                </div>
              </div>
            </div>
            <div class="flex justify-end items-center">
              <button type="submit" class="bg-green py-2 px-6 text-white font-bold rounded">Send</button>
            </div>
        </form>
        </modal>
  </div>

</template>

<script>
  export default{
      props:['invoice','email'],

      data(){
        return {
           form:new Form({
                    'email':this.email,
                }),
           name:'email-invoice'+this.invoice
        }
      },

      methods: {
        submit(){
          this.form.post("/agent/invoice/email/"+this.invoice).
                then(({data}) => {
                   this.$modal.hide('email-invoice'+this.invoice);
                   flash(data.message);
                }).catch(errors => {

                })
        },
        show(){
          this.$modal.show('email-invoice'+this.invoice);
        }
      },
  }
</script>
