<template>
  <div class="w-full">
    <a href="" class="btn btn-warning" @click.prevent="show" :draggable=true>
        
        Edit
    </a>
      <modal name="edit-vendor" height="auto" width="450" :draggable=true>
          
          <div class="container pb-0">
              <h4>Edit Vendor</h4>
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
   
 
              <button type="submit" class="btn btn-default">Update</button>
        </form>
        </modal>
  </div>

</template>

<script>
import _ from 'lodash';
  export default{
      mounted(){
        this.load();
      },
       props:[
         'vendor',
    
      ],
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
          load(){
              
              console.log(this.vendor);
          
           Object.assign(this.form, {
                  name:this.vendor.name,
                  phone:this.vendor.phone,
                  email:this.vendor.email,
                  altemail:this.vendor.alternativephone,
                  country:this.vendor.country,
                  type:this.vendor.type,
                  serviceoffered:this.vendor.serviceoffered,
                  location:this.vendor.location
          });
        },
        
       submit(){
          this.form.put(`/agent/vendor/${this.vendor.id}`,{ params: this.vendor }).
                then(response => {
                    console.log(response);
                  this.$modal.hide(this.name);
                  flash(response.message);
                  location.reload();
                }).catch(errors => {

                })
        },
        show(){
            
          this.$modal.show('edit-vendor');
        }
      },
  }
</script>
