<template>
  <div class="w-full">
    <button class="no-underline bttn bg-indigo hover:bg-blue-ddark" @click="show">Pay</button>
      <modal :name="name" height="auto" width="900" :draggable=true>
       <form class="w-full container mx-auto" @submit.prevent="submit">

            <div class="w-full flex-col my-4">
              <div class="flex items-center mb-2">
                 <div class="w-1/4 flex justify-end ">
                    <label class="block uppercase tracking-wide text-grey-darker text-xl font-bold mx-4" for="grid-first-name">
                      Invoice Number
                    </label>
                 </div>
                 <div class="w-1/2 flex justify-start">
                   <input class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight" :value="invoice.invoice_id" disabled />
                 </div>
              </div>

              <div class="flex items-center mb-2">
                 <div class="w-1/4 flex justify-end ">
                    <label class="block uppercase tracking-wide text-grey-darker text-xl font-bold mx-4" for="grid-first-name">
                        Paid By
                    </label>
                 </div>
                 <div class="w-1/2 flex justify-start">
                   <input class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight" v-model="form.paidby"/>

                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('paidby')" v-text="form.errors.get('paidby')"></p>
                 </div>
              </div>

              <div class="flex items-center mb-2">
                 <div class="flex justify-end ">
                    <label class="block uppercase tracking-wide text-grey-darker text-xl font-bold mx-4" for="grid-first-name">
                    Payment Method
                    </label>
                 </div>
                 <div class="w-1/2 flex justify-start">
                  <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight" v-model="form.mode">
                   <option v-for="paymode in payments" :value="paymode" :key="paymode">{{ paymode }}</option>
                 </select>

                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('mode')" v-text="form.errors.get('mode')"></p>
                 </div>
              </div>

              <div class="flex items-center mb-2">
                 <div class="w-1/4 flex justify-end ">
                    <label class="block uppercase tracking-wide text-grey-darker text-xl font-bold mx-4" for="grid-first-name">
                      Payment Amount
                    </label>
                 </div>
                 <div class=" w-1/2 flex justify-start">
                   <input class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight" v-model="form.amount" />

                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('amount')" v-text="form.errors.get('amount')"></p>
                 </div>
              </div>


              <div class="flex items-center mb-2">
                 <div class="w-1/4 flex justify-end ">
                    <label class="block uppercase tracking-wide text-grey-darker text-xl font-bold mx-4" for="grid-first-name">
                      Payment Reference
                    </label>
                 </div>
                 <div class="w-1/2 flex justify-start">
                   <input class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight" v-model="form.reference" />

                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('reference')" v-text="form.errors.get('reference')"></p>
                 </div>
              </div>

            </div>
            <div class="flex justify-center items-center">
              <button type="submit" class="bg-indigo py-2 px-6 text-white text-lg font-bold rounded">Pay</button>
            </div>
        </form>
        </modal>
  </div>

</template>

<script>
export default {
  props: ["invo"],
  data() {
    return {
      form: new Form({
        mode: "",
        paidby: "",
        amount: "",
        reference: ""
      }),
      payments: window.App.payments
    };
  },

  methods: {
    submit() {
      this.form
        .post("/agent/invoice/payment/" + this.invoice.id)
        .then(({ data }) => {
          this.$modal.hide(this.name);
          // location.replace('/agent/invoice');
          flash(data.message);
        })
        .catch(errors => {});
    },
    show() {
      this.$modal.show(this.name);
    }
  },

  computed: {
    invoice() {
      return JSON.parse(this.invo);
    },
    name() {
      return "payment-invoice" + this.invoice.id;
    }
  }
};
</script>
