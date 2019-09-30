<template>
  <div class="w-full">
    <button class="no-underline bttn bg-tolet-blue hover:bg-blue-ddark" @click="show">Email</button>
      <modal :name="name" height="auto" width="450" :draggable=true>
       <form class="w-full container mx-auto" @submit.prevent="submit">
        
              <div class="form-group">
                <label>
                 Email Invoice To:
                </label>
                  <input type="text" class="form-control" v-model="form.email" ></input>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></p>
            </div>
              <button type="submit" class="btn btn-default">Send</button>
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
          this.form.post("/agent/invoice/email/"+this.invoice,{ headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }}).
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
