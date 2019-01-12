<template>
  <div>
    <a href="" class="no-underline px-2 py-1 border-2 border-transparent hover:border-grey-lighter text-lg text-black rounded" @click.prevent="show" :draggable=true>
        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-teal" width="24" height="24" viewBox="0 0 24 24">
            <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
            <path d="M0 0h24v24H0z" fill="none"/>
        </svg>
        Edit
    </a>
      <modal name="edit-room" height="auto" width="900">
       <form class="bg-white rounded px-8 pt-6 pb-8 mb-4 mx-4" @submit.prevent="submit">
        <p class="flex justify-center items-center"><h3 class="uppercase">Create New Unit</h3></p>
        <div class="mb-4 flex justify-between">
          <div class="flex items-center w-1/2 mx-2">
            <label class="label w-1/4" for="username">
              Property
            </label>
            <select class="outline-0 bg-grey text-blue-dark py-2 text-center leading-tight flex-1" id="username" type="text" v-model="form.listing">
                <option v-for="listing in listings" :value="listing.id" selected="form.listing==listing.id" :key="listing.id">{{ listing.name }}</option>
            </select>
            <p class="text-red text-xs italic my-2" v-if="form.errors.has('listing')" v-text="form.errors.get('listing')"></p>
          </div>
          <div class="flex items-center mx-2 w-1/2">
            <label class="label w-1/4">
              Unit Type
            </label>
            <select class="outline-0 bg-grey text-blue-dark py-2 text-center flex-1" v-model="form.type">
              <option v-for="rmtype in types" :value="rmtype.id" selected="rmtype.id==form.type" :key="rmtype.id">{{ rmtype.name }}</option>
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
      mounted(){
        this.load();
      },

      props:[
        'listings',
        'types',
        'item'
      ],
      data(){
        return {
           form:new Form({
                    'id':'',
                    'listing':'',
                    'type':'',
                    'name':'',
                    'size':''
                }),
        }
      },

      methods: {
        load(){
           Object.assign(this.form, {
                  id:this.item.id,
                  listing:this.item.listing_id,
                  type:this.item.room_types_id,
                  name:this.item.name,
                  size:this.item.size
          });
        },
        submit(){
          this.form.put(`/agent/room/${this.form.id}`).
                then(response => {
                  this.$modal.hide('edit-room');
                  flash(response.message);
                  location.reload();
                }).catch(errors => {

                })
        },
        show(){
          this.$modal.show('edit-room');
        }
      },
  }
</script>
