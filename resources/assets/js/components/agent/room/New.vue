<template>
  <div class="w-full">
    <button class="no-underline bttn bg-tolet-blue hover:bg-blue-ddark" @click="show">Create</button>
      <modal name="open-room" height="auto" width="900" :draggable=true>
       <form class="bg-white rounded px-8 pt-6 pb-8 mb-4 mx-4" @submit.prevent="submit">
        <p class="flex justify-center items-center"><h3 class="uppercase">Create New Unit</h3></p>
        <div class="mb-4 flex justify-between">
          <div class="flex items-center w-1/2 mx-2">
            <label class="label w-1/4" for="username">
              Property
            </label>
            <select class="outline-0 bg-grey text-blue-dark py-2 text-center leading-tight flex-1" id="username" type="text" v-model="form.listing">
                <option v-for="listing in listings" :value="listing.id" :key="listing.id">{{ listing.name }}</option>
            </select>
            <p class="text-red text-xs italic my-2" v-if="form.errors.has('listing')" v-text="form.errors.get('listing')"></p>
          </div>
          <div class="flex items-center mx-2 w-1/2">
            <label class="label w-1/4">
              Unit Type
            </label>
            <select class="outline-0 bg-grey text-blue-dark py-2 text-center flex-1" v-model="form.type">
              <option v-for="rmtype in types" :value="rmtype.id" :key="rmtype.id">{{ rmtype.name }}</option>
            </select>
            <p class="text-red text-xs italic my-2" v-if="form.errors.has('type')" v-text="form.errors.get('type')"></p>
          </div>
        </div>

        <div class="mb-4 flex justify-between items-center">
          <div class="flex items-center mx-2 w-1/2">
            <label class="label w-1/4">
             Name
            </label>
            <input class="outline-0 bg-grey text-blue-dark py-2 text-center flex-1" v-model="form.name" />

            <p class="text-red text-xs italic my-2" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></p>
          </div>
          <div class="flex items-center mx-2 w-1/2">
            <label class="label w-1/4">
             Size
            </label>
            <input class="outline-0 bg-grey text-black font-bold py-2 text-center flex-1" v-model="form.size" />

            <p class="text-red text-xs italic my-2" v-if="form.errors.has('size')" v-text="form.errors.get('size')"></p>
          </div>
        </div>
          <div class="flex items-center justify-between">
            <button class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded" type="submit">
             Create
            </button>
          </div>
        </form>
        </modal>
  </div>

</template>

<script>
  export default{
      props:[
        'listings',
        'types'
      ],
      data(){
        return {
           form:new Form({
                    'listing':'',
                    'type':'',
                    'name':'',
                    'size':''
                }),
        }
      },

      methods: {
        submit(){
          this.form.post('/agent/room').
                then(response => {
                  this.$modal.hide('open-room');
                  flash(response.message);
                  location.reload();
                }).catch(errors => {

                })
        },
        show(){
          this.$modal.show('open-room');
        }
      },
  }
</script>
