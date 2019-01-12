<template>
  <div class="max-w-md w-full">
    <button class="no-underline bttn bg-tolet-blue hover:bg-blue-ddark" @click="show"><i class="material-icons px-2">border_color</i>Edit</button>
      <modal name="edit-type" height="auto" :draggable=true>
       <form class="bg-white rounded px-8 pt-6 pb-8 mb-4 mx-4" @submit.prevent="submit">
        <p class="flex justify-center items-center"><h3>Edit UnitType</h3></p>
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
             Update
            </button>
          </div>
        </form>
        </modal>
  </div>

</template>

<script>
  export default{
     mounted() {
            this.doassign();
        },
      props:{
        id:{},
        item:{}
      },
      data(){
        return {
           form:new Form({
                    'name':'',
                    'id':0,
                    'description':'',
                }),
        }
      },

      methods: {
        doassign(){
               Object.assign(this.form, JSON.parse(this.item));
        },
        submit(){
          this.form.put(`/admin/unittypes/${this.form.id}`).
                then(response => {
                  this.$modal.hide('edit-type');
                  flash(response.message);
                  location.reload();
                }).catch(errors => {
                    flash(errors.message,'danger');
                    this.$modal.hide('edit-type');
                })
        },
        show(){
          this.$modal.show('edit-type');
        }
      }
  }
</script>
