<template>
  <div class="w-full">
    <button class="no-underline bttn bg-tolet-blue hover:bg-blue-ddark" @click="show">New notice</button>
      <modal name="open-notice" height="auto" width="900" :draggable=true>
       <form class="w-full container mx-auto" @submit.prevent="submit">
            <div class="flex flex-wrap -mx-3 mb-2">   
                <p class="text-black text-xl font-bold">New notice</p>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                 Address to:
                </label>
                <div class="relative">
                  <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight" v-model="form.ptype">
                    <option v-for="ptype in ptypes" :value="ptype" :key="ptype">{{ ptype }}</option>
                  </select>
                  <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                  </div>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('ptype')" v-text="form.errors.get('ptype')"></p>
                </div>
              </div>     

               <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                 Unit:
                </label>
                <div class="relative">
                  <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight"
                   v-model="form.room">
                    <option v-for="rental in rentals" :value="rental.rentable.id" :key="rental.rentable.id" selected="rental.rentable.id">{{ rental.rentable.name }}</option>
                  </select>
                  <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                  </div>
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('room')" v-text="form.errors.get('room')"></p>
                </div>
              </div> 
              
              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                 Move Date:
                </label>
                <div class="relative">
                  <input type="date" name="movedate" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 leading-tight" v-model="form.movedate"/>
                  
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('movedate')" v-text="form.errors.get('movedate')"></p>
                </div>
              </div>
              
               <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                 Upload file:
                </label>
                <div class="relative">
                  <input type="file" name="file" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 leading-tight" />
                  
                  <p class="text-red text-xs italic my-2" v-if="form.errors.has('file')" v-text="form.errors.get('file')"></p>
                </div>
              </div>

            </div>
             <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-state">
                  Reason of Move:
                </label>
                <textarea rows="5" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 leading-tight" v-model="form.reason"></textarea>
                <p class="text-red text-xs italic my-2" v-if="form.errors.has('reason')" v-text="form.errors.get('reason')"></p>
              </div>
          
            
            
              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-state">
                  Comment:
                </label>
                <textarea rows="5" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 leading-tight" v-model="form.comment"></textarea>
                <p class="text-red text-xs italic my-2" v-if="form.errors.has('comment')" v-text="form.errors.get('comment')"></p>
              </div>
              </div>
           
            
             <div class="flex flex-wrap -mx-3 mb-2">   
              <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-state">
                  Claim Depoist:
                </label>
                <input type="checkbox"  v-model="form.deposit">
                <p class="text-red text-xs italic my-2" v-if="form.errors.has('deposit')" v-text="form.errors.get('deposit')"></p>
              </div>
            </div>
             
            <div class="flex justify-end items-center">
              <button type="submit" class="bg-green py-2 px-6 text-white font-bold rounded">Submit</button>
            </div>
        </form>
        </modal>
  </div>

</template>

<script>
  export default{
      props:['rentals'],
      data(){
        return {
           form:new Form({
                    'ptype':'',
                    'reason':'',
                    'room':'',
                    'movedate':'',
                    'file':'',
                    'comment':'',
                    'deposit':false,
                }),
            ptypes:[
                'Agent',
                'Owner',
                'Vendor',
                
            ],
        }
      },

      methods: {
        submit(){
          this.form.post('/tenant/notices').
                then(response => {
                  this.$modal.hide('open-notice');
                  flash(response.message);
                 // location.reload();
                }).catch(errors => {

                })
        },
        show(){
          this.$modal.show('open-notice');
        }
      },
  }
</script>
