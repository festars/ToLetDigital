<template>
  <div class="w-full">
    <button class="no-underline bttn bg-tolet-blue hover:bg-blue-ddark" @click="show">New</button>
      <modal name="open-vendor" height="auto" width="450" :draggable=true>
          
          <div class="container pb-0">
          <h4>New Vendor</h4>
        </div>
          
       <form class="w-full container mx-auto" enctype="multipart/form-data" @submit.prevent.once="submit">
            
            <div class="form-group">
            <label for="">Full Name</label>
              <input type="text" required class="form-control" v-model="form.name"/>
                <p class="text-red text-xs italic my-2" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></p>
              </div>
        <div class="form-group">
            <label for="">Phone Number</label>
             <input type="phone" required class="form-control" v-model="form.phone"/>
                <p class="text-red text-xs italic my-2" v-if="form.errors.has('phone')" v-text="form.errors.get('phone')"></p>
               </div>
               
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                  <label for="">Email</label>
                 <input type="email" required class="form-control" v-model="form.email"/>
                <p class="text-red text-xs italic my-2" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></p>
              </div>
            </div>
            <div class="col">
                <div class="form-group">
                  <label for="">Alternative Email</label>
                 <input type="email" required class="form-control" v-model="form.altemail"/>
                <p class="text-red text-xs italic my-2" v-if="form.errors.has('altemail')" v-text="form.errors.get('altemail')"></p>
              </div>
            </div>
          </div> 
          
          <div class="form-row">
            <div class="col">
                <div class="form-group">
                  <label for="">Location</label>
                 <input type="text" required class="form-control" v-model="form.location"/>
                <p class="text-red text-xs italic my-2" v-if="form.errors.has('location')" v-text="form.errors.get('location')"></p>
              </div>
            </div>
            <div class="col">
                <div class="form-group">
                  <label for="">Country</label>
                 <select class="form-control" v-model="form.country">
                      <option v-for="(value,key) in countries" :value="key" :key="key">{{value}}</option>
                    </select>
        
                    <p class="text-red text-xs italic my-2" v-if="form.errors.has('country')" v-text="form.errors.get('country')"></p>
                  </div>
            </div>
          </div> 
          
          
          <div class="form-row">
            <div class="col">
                <div class="form-group">
                  <label for="">Service Offered</label>
                 <select required class="form-control"
                   v-model="form.serviceoffered">
                    <option >Provide data for</option>
                  </select>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('serviceoffered')" v-text="form.errors.get('serviceoffered')"></p>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                  <label for="">Type</label>
                 <select required class="form-control"
                   v-model="form.type">
                    <option v-for="type in types" :value="type" :key="type" >{{ type }}</option>
                  </select>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('type')" v-text="form.errors.get('type')"></p>
                
                 </div>
            </div>
          </div> 
        
 
     <button type="submit" class="btn btn-default">Create</button>
        </form>
        </modal>
  </div>

</template>

<script>
import _ from 'lodash';
  export default{
      data(){
        return {
           today:Date.now(),
           rooms:[],
           currencies:window.App.currencies,
           form:new Form({
              
                    'name':'',
                    'phone':'',
                    'email':'',
                    'altemail':'',
                    'country':'',
                    'type':'',
                    'serviceoffered':'',
                    'location':'',
                    
                    
                }),
            countries: window.App.countries,
            types:[
                "plumber",
                "electrician",
                "security",
                "caretaker",
                "garbage collector"
                
            ]
            
        }
      },
      methods: {
        submit(){
          
           let formData = new FormData();
           
            
            formData.append('name', this.form.property);
            formData.append('phone', this.form.unit);
            formData.append('email', this.form.category);
            formData.append('altemail', this.form.duedate);
            formData.append('country', this.form.method);
            formData.append('type', this.form.ptype);
            formData.append('serviceoffered', this.form.serviceoffered);
            formData.append('location', this.form.location);
           
        
           
          
            this.form.post('/agent/vendor',formData, {
            headers: { 'content-type': 'multipart/form-data' }
        }).then(response => {
                  this.$modal.hide('open-vendor');
                  flash(response.message);
                  //location.reload();
                }).catch(errors => {

                })
        },
        show(){
            
          this.$modal.show('open-vendor');
        }
      },
  }
</script>
