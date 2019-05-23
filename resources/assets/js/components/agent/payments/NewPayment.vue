<template>
  <div class="w-full">
    <button class="no-underline bttn bg-indigo hover:bg-blue-ddark" @click="show">Pay</button>
      <modal :name="name" height="auto" width="450" :draggable=true>
        
        <div class="container pb-0">
          <h4>New Payment</h4>
        </div>
        
       <form class="w-full container mx-auto" @submit.prevent="submit">
         
         <div class="form-row">
            <div class="col">
                <div class="form-group">
                  <label for="">Invoice Number</label>
                   <input class="form-control" :value="invoice.invoice_id" disabled />
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                  <label for="">Paid By</label>
                  <input class="form-control" v-model="form.paidby"/>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('paidby')" v-text="form.errors.get('paidby')"></p>
                 </div>
            </div>
          </div>
          
          
          <div class="form-row">
            <div class="col">
                <div class="form-group">
                  <label for="">Payment Method</label>
                  <select class="for-control" v-model="form.mode">
                   <option v-for="paymode in payments" :value="paymode" :key="paymode">{{ paymode }}</option>
                 </select>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('mode')" v-text="form.errors.get('mode')"></p>
                 </div>
            </div>
            <div class="col">
                <div class="form-group">
                  <label for="">Payment Amount</label>
                  <input class="form-control" v-model="form.amount" />

                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('amount')" v-text="form.errors.get('amount')"></p>
                 </div>
            </div>
          </div>
          
          <div class="form-group">
            <label for="">Payment Reference</label>
            <input class="form-control" v-model="form.reference" />
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('reference')" v-text="form.errors.get('reference')"></p>
            </div>

            <button type="submit" class="btn btn-default">Pay</button>
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
