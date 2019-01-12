<template>
  <div class="max-w-md w-full">
    <button class="no-underline bttn bg-tolet-blue hover:bg-blue-ddark" @click="show">Create</button>
      <modal name="unit-type" height="auto" :draggable=true>
       <form class="bg-white rounded px-8 pt-6 pb-8 mb-4 mx-4" @submit.prevent="submit">
        <p class="flex justify-center items-center"><h3>Create New UnitType</h3></p>
          <div class="mb-4">
            <label class="block text-grey-darker text-sm font-bold mb-2" for="username">
              Name
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight" id="username" type="text" v-model="form.name">
            <p class="text-red text-xs italic my-2" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></p>
          </div>
          <div class="mb-6">
            <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
              Description
            </label>
            <textarea class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3 leading-tight" rows="5" v-model="form.description">
            </textarea>
            <p class="text-red text-xs italic my-2" v-if="form.errors.has('description')" v-text="form.errors.get('description')"></p>
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
      data(){
        return {
           form:new Form({
                    'name':'',
                    'description':'',
                }),
        }
      },

      methods: {
        submit(){
          this.form.post('/admin/unittypes').
                then(response => {
                  this.$modal.hide('unit-type');
                  flash(response.message);
                  location.reload();
                }).catch(errors => {

                })
        },
        show(){
          this.$modal.show('unit-type');
        }
      }
  }
</script>
