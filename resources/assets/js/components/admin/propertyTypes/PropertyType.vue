<template>
          <div class="max-w-md w-full">
               <form class="bg-white rounded px-8 pt-6 pb-8 mb-4 mx-4" @submit.prevent="submit">
                <p class="flex justify-center items-center"><h3>{{ formTitle }}</h3></p>
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
                      {{ action }}
                    </button>
                  </div>
                </form>
          </div>
</template>

<script>
    import { mapGetters, mapState } from 'vuex'
    export default {
        mounted() {
            this.doassign();
        },

        props:{
            item:{}
        },

        data() {
            return {

            }
        },

        methods: {
            doassign(){
                _.isEmpty(this.item)
                 if(this.item){
                     Object.assign(this.form, this.item);
                 }
            },

            submit(){
                _.isEmpty(this.item) ? this.save() : this.update();
            },

            save(){
                this.$store.dispatch('savePropertyType')
            },

            update(){
                this.$store.dispatch('updatePropertyType', this.item)
            }
        },

        computed: {
            ...mapState({
              form : state => state.PTypes.form,
              btnTxtbox: state => state.PTypes.btnTxtbox,
              formTitle: state => state.PTypes.formTitle,
            }),

            action () {
                return _.isEmpty(this.item) ? 'Save' : 'Update'
            },

            formTitle () {
                return _.isEmpty(this.item) ? 'New Property type' : 'Edit Property type'
            },

        }
    }
</script>

<style>

</style>
