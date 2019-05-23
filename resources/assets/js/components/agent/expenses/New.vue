<template>
  <div class="w-full">
    <button class="no-underline bttn bg-tolet-blue hover:bg-blue-ddark" @click="show">New</button>
      <modal name="open-expense" height="auto" width="450" :draggable=true>
        
        <div class="container pb-0">
          <h4>New Expense</h4>
        </div>
        
       <form class="w-full container mx-auto" enctype="multipart/form-data" @submit.prevent.once="submit">
            
            <div class="form-row">
            <div class="col">
                <div class="form-group">
                  <label for="">Apartment</label>
                  <select required class="form-control"
                   v-model="form.property" @change="listofrooms">
                    <option v-for="rental in rentals" :value="rental.id" :key="rental.id" selected="rental.id">{{ rental.name }}</option>
                  </select>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('property')" v-text="form.errors.get('property')"></p>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                  <label for="">Unit</label>
                  <select required class="form-control"
                   v-model="form.unit">
                    <option v-for="room in rooms" :value="room.id" :key="room.id" >{{ room.name }}</option>
                  </select>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('unit')" v-text="form.errors.get('unit')"></p>
                </div>
            </div>
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
                  <input type="number" required class="form-control" v-model="form.amount"/>
                <p class="text-red text-xs italic my-2" v-if="form.errors.has('amount')" v-text="form.errors.get('amount')"></p>
              </div>
            </div>
            <div class="col">
                <div class="form-group">
                  <label for="">Frequency</label>
                  <select required class="form-control"
                   v-model="form.frequency">
                    <option v-for="type in types" :value="type" :key="type" selected="type">{{ type }}</option>
                  </select>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('frequency')" v-text="form.errors.get('frequency')"></p>
                </div>
            </div>
          </div>
          
          
           <div class="form-row">
            <div class="col">
                <div class="form-group">
                  <label for="">Due Date</label>
                 <input required type="date" min="today"  class="form-control" v-model="form.duedate"/>
                <p class="text-red text-xs italic my-2" v-if="form.errors.has('duedate')" v-text="form.errors.get('duedate')"></p>
              </div>
            </div>
            <div class="col">
                <div class="form-group">
                  <label for="">Payee</label>
                  <input type="text" required class="form-control" v-model="form.payee">
                <p class="text-red text-xs italic my-2" v-if="form.errors.has('payee')" v-text="form.errors.get('payee')"></p>
              </div>
            </div>
          </div>
          
          <div class="form-group">
              <label for="">Category</label>
              <select required class="form-control"
                   v-model="form.category">
                    <option v-for="category in categories" :value="category" :key="category" selected="category">{{ category }}</option>
                  </select>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('category')" v-text="form.errors.get('action')"></p>
                </div>
            
            <div class="form-row">
            <div class="col">
                <div class="form-group">
                  <label for="">Payment Method</label>
                 <select required class="form-control" v-model="form.method">
                    <option v-for="method in methods" :value="method" :key="method" selected="method">{{ method }}</option>
                  </select>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('method')" v-text="form.errors.get('method')"></p>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                  <label for="">Payment Reference</label>
                  <input type="text" required class="form-control" v-model="form.reference">
                <p class="text-red text-xs italic my-2" v-if="form.errors.has('reference')" v-text="form.errors.get('reference')"></p>
              </div>
            </div>
          </div>
          
          <div class="form-group">
              <label for="">Details</label>
              <textarea type="text" required class="form-control" v-model="form.details"></textarea>
                <p class="text-red text-xs italic my-2" v-if="form.errors.has('details')" v-text="form.errors.get('details')"></p>
              </div>
  
              <button type="submit" class="btn btn-default">Create</button>
        </form>
        </modal>
  </div>

</template>

<script>
import _ from 'lodash';
  export default{
      props:['rentals'],
      data(){
        return {
           today:Date.now(),
           rooms:[],
           currencies:window.App.currencies,
           form:new Form({
              
                    'property':'',
                    'unit':'',
                    'frequency':'',
                    'payee':'',
                    'duedate':'',
                    'method':'',
                    'details':'',
                    'ptype':'',
                    'amount':'',
                    'currency':'',
                    'category':'',
                    'reference':''
                    
                    
                }),
            ptypes:[
                'Landlord',
                'Owner',
                'Vendor',
                'Other'
                
            ],
            types:[
                "Weekly",
                "Monthly",
                "Quarterly",
                "Yearly"
              
              ],
            methods:[
              "Bank",
              "Cheque",
              "Mobile payments",
              "Cash",
              "Other"

              ],
            categories:[
                "Advertising",
                "Bank service charges",
                "insurance",
                "license and permits",
                "mortgage",
                "pest control",
                "miscellaneous",
                "taxes",
                "maintenance and repairs",
                "supplies",
                "professional services",
                "utilities",
                "management fees",
                "other"
                ]
        }
      },
      
      methods: {
          
         listofrooms(){
            var apt =_.find(this.rentals, { 'id': this.form.property })
            this.rooms= apt.rooms;
         },
        
         handleFileUpload(){
        
          this.form.file = this.$refs.file.files[0];
       
        },
    
        submit(){
          
           let formData = new FormData();
          
           
            formData.append('property', this.form.property);
            formData.append('unit', this.form.unit);
            formData.append('category', this.form.category);
            formData.append('duedate', this.form.duedate);
            formData.append('method', this.form.method);
            formData.append('ptype', this.form.ptype);
            formData.append('details', this.form.details);
            formData.append('payee', this.form.payee);
            formData.append('amount', this.form.amount);
            formData.append('currency', this.form.currency);
            formData.append('reference', this.form.reference);
        
           
          
            this.form.post('/agent/expense',formData, {
            headers: { 'content-type': 'multipart/form-data' }
        }).then(response => {
                  this.$modal.hide('open-expense');
                 // flash(response.message);
                 // location.reload();
                }).catch(errors => {

                })
        },
        show(){
            
          this.$modal.show('open-expense');
        }
      },
  }
</script>
