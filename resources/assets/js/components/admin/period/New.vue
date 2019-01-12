<template>
  <div class="w-full">
    <button class="no-underline bttn bg-tolet-blue hover:bg-blue-ddark" @click="show">Create</button>
      <modal name="open-period" height="auto" width="900" :draggable=true>
       <form class="w-full container mx-auto" @submit.prevent="submit">
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                 Name
                </label>
                <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3 leading-tight" v-model="form.name" type="text" placeholder="WEEKLY">
                <p class="text-red text-xs italic my-2" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></p>
              </div>
            </div>
            <div class="flex justify-end items-center">
              <button type="submit" class="bg-green py-2 px-6 text-white font-bold rounded">Create</button>
            </div>
        </form>
        </modal>
  </div>

</template>

<script>
  export default{
      props:[
        'ptypes',
        'owners'
      ],
      data(){
        return {
           form:new Form({
                    'name':'',
                }),
        }
      },

      methods: {
        submit(){
          this.form.post('/admin/period').
                then(response => {
                  this.$modal.hide('open-period');
                  flash(response.message);
                  location.reload();
                }).catch(errors => {

                })
        },
        show(){
          this.$modal.show('open-period');
        }
      },
  }
</script>
