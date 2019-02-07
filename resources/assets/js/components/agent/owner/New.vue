<template>
    <div class="w-full">
        <button class="no-underline bttn bg-tolet-blue hover:bg-blue-ddark" @click="show">Create</button>
        <modal name="open-owner" height="auto" width="900" :draggable=true>
            <form class="w-full max-w-xl py-8" @submit.prevent="submit">
            <div class="flex flex-wrap mb-6">
                <div class="flex flex-wrap mb-2">
                  <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="label w-1/4"for="grid-first-name">
                     Name
                    </label>
                    <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3 leading-tight" v-model="form.name" id="grid-first-name" type="text" placeholder="James Doe">
                  </div>
                  <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="label w-1/4" for="grid-last-name">
                      Email
                    </label>
                    <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 leading-tight"  v-model="form.email" type="email" placeholder="tolet@mail.com">
                    <p class="text-red text-xs italic my-2" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></p>
                  </div>
                  
                  <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="label w-1/4" for="grid-last-name">
                      Alternative Email
                    </label>
                    <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 leading-tight"  v-model="form.aemail" type="email" placeholder="tolet@mail.com">
                    <p class="text-red text-xs italic my-2" v-if="form.errors.has('aemail')" v-text="form.errors.get('aemail')"></p>
                  </div>
                </div>
                <div class="flex flex-wrap mb-2">
                  <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="label w-1/4" for="grid-state">
                      Country
                    </label>
                    <div class="relative">
                      <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight"  v-model="form.country">
                        <option v-for="(value,key) in countries" :value="key">{{value}}</option>
                      </select>
                      <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                      </div>
                    </div>
                  </div>

                  <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="label w-1/4" for="grid-city">
                      City
                    </label>
                    <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 leading-tight"  v-model="form.city" type="text" placeholder="Albuquerque">
                  </div>
                  <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="label w-1/4" for="grid-zip">
                      Phone
                    </label>
                    <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 leading-tight"  v-model="form.phone" type="text" placeholder="254700000000">
                  </div>
                  
                  <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="label w-1/4" for="grid-zip">
                      Alternative Phone
                    </label>
                    <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 leading-tight"  v-model="form.altphone" type="text" placeholder="254700000000">
                  </div>
                </div>
            </div>
            <div class="flex justify-end items-center">
              <button type="submit" class="bg-green hover:bg-green-darker py-2 px-6 text-white font-bold rounded">Create</button>
            </div>
        </form>
    </modal>
    </div>
</template>
<script>
  export default{
      data(){
        return {
           form:new Form({
                'name':'',
                'email':'',
                'aemail':'',
                'country':'',
                'city':'',
                'phone':'',
                'altphone':'',
                }),
            'countries':window.App.countries,
            
        }
      },

      methods: {
        submit(){
          this.form.post('/agent/owner').
                then(response => {
                  this.$modal.hide('open-owner');
                  flash(response.message);
                  location.reload();
                }).catch(errors => {
                  console.log(errors);
                })
        },
        show(){
          this.$modal.show('open-owner');
        }
      },
  }
</script>
