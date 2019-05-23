<template>
  <div class="w-full">
    <button class="no-underline bttn bg-tolet-blue hover:bg-blue-ddark" @click="show">New</button>
      <modal name="open-maintenance" height="auto" width="450" :draggable=true>
          
          <div class="container pb-0">
              <h4>New Maintainance</h4>
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
            <div class="col">
              <div class="form-group">
              <label for="">Address to</label>
              <select required class="form-control" v-model="form.ptype">
                    <option v-for="ptype in ptypes" :value="ptype" :key="ptype" selected="ptype">{{ ptype }}</option>
                  </select>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('ptype')" v-text="form.errors.get('ptype')"></p>
                </div>
            </div>
            <div class="col">
              <div class="form-group">
              <label for="">Maintenance Type</label>
              <select required class="form-control"
                   v-model="form.maintenancetype">
                    <option v-for="type in types" :value="type" :key="type" selected="type">{{ type }}</option>
                  </select>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('maintenancetype')" v-text="form.errors.get('maintenancetype')"></p>
            </div>
            </div>
        </div>
            
      
      <div class="form-row">
            <div class="col">
              <div class="form-group">
                <label for="">Cause</label>
                  <select required class="form-control" v-model="form.cause">
                    <option v-for="cause in causes" :value="cause" :key="cause" selected="cause">{{ cause }}</option>
                  </select>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('cause')" v-text="form.errors.get('cause')"></p>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                  <label for="">Due Date</label>
                  <input required type="date" min="today"  class="form-control" v-model="form.duedate"/>
                <p class="text-red text-xs italic my-2" v-if="form.errors.has('duedate')" v-text="form.errors.get('duedate')"></p>
              </div>
            </div>
          </div>
          
          
          <div class="form-group">
              <label for="">Upload support document</label>
             <input type="file" class="form-control" id="file" ref="file" v-on:change="handleFileUpload()"/>
                <p class="text-red text-xs italic my-2" v-if="form.errors.has('file')" v-text="form.errors.get('file')"></p>
              </div>
      
      
      <div class="form-row">
            <div class="col">
              <div class="form-group">
                <label for="">Maintainance Cost</label>
                  <input type="number" required  class="form-control" v-model="form.cost"/>
                <p class="text-red text-xs italic my-2" v-if="form.errors.has('cost')" v-text="form.errors.get('cost')"></p>
              </div>
            </div>
            <div class="col">
                <div class="form-group">
                  <label for="">Action</label>
                  <select required class="form-control"
                   v-model="form.action">
                    <option v-for="action in actions" :value="action" :key="action" selected="action">{{ action }}</option>
                  </select>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('action')" v-text="form.errors.get('action')"></p>
                </div>
            </div>
          </div>
          
         <div class="form-group">
            <label for="">Notes</label>
            <textarea required rows="3" class="form-control" v-model="form.notes"></textarea>
                <p class="text-red text-xs italic my-2" v-if="form.errors.has('notes')" v-text="form.errors.get('notes')"></p>
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
           form:new Form({
              
                    'property':'',
                    'unit':'',
                    'maintenancetype':'',
                    'duedate':'',
                    'cause':'',
                    'notes':'',
                    'ptype':'',
                    'action':'',
                    'cost':'',
                    
                    
                }),
            ptypes:[
                'Landlord',
                'Owner',
                'Vendor',
                'Other'
                
            ],
            types:[
                'Periodic Maintenance',
                'Preventive Maintenance',
                'Emergency Maintenance'
              
              ],
            causes:[
              "Renters Fault",
              "General Fault "
              ],
            actions:[
                "Repair",
                "overhaul",
                "Other"
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
            formData.append('maintenancetype', this.form.maintenancetype);
            formData.append('duedate', this.form.duedate);
            formData.append('cause', this.form.cause);
            formData.append('ptype', this.form.ptype);
            formData.append('notes', this.form.notes);
            formData.append('action', this.form.action);
            formData.append('cost', this.form.cost);
           
          
            this.form.post('/agent/maintenance',formData, {
            headers: { 'content-type': 'multipart/form-data' }
        }).then(response => {
                  this.$modal.hide('open-maintenance');
                  flash(response.message);
                 //location.reload();
                }).catch(errors => {

                })
        },
        show(){
          this.$modal.show('open-maintenance');
        }
      },
  }
</script>
