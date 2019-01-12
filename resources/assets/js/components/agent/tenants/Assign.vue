<template>
  <div class="mr-4 mx-2">
    <button class="no-underline bttn bg-green hover:bg-green-dark" @click="show">Assign</button>
      <modal name="assign-tenant" height="auto" width="900" :draggable=true>
       <form class="bg-grey-lightest rounded px-8 pt-6 pb-8 mb-4 mx-4" @submit.prevent="submit">
        <p class="flex justify-center items-center"><h3 class="uppercase">Assign To a Unit</h3></p>
            <div class="mb-4 flex justify-between">
              <div class="flex items-center w-full mx-2">
                <label class="label w-1/4" for="username">
                  Tenant
                </label>
              <autocomplete
              url="/agent/tenant/search"
              anchor="email"
              label="writer"
              :min="3"
              :classes="{ wrapper: 'form-wrapper w-full', input: 'outline-0 bg-grey text-black font-bold py-2 text-center w-full', list: 'data-list', item: 'data-list-item' }"
              :on-select="setDefault">
            </autocomplete>
              </div>
        </div>
          <div class="flex items-center justify-between">
            <button class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded" type="submit">
             Assign
            </button>
          </div>
        </form>
        </modal>
  </div>

</template>

<script>
  import Autocomplete from 'vue2-autocomplete-js'
  export default{
      props:['room'],

      components: {
        Autocomplete,
      },

      data(){
        return {
          tenant:{},
          }
      },

      methods: {
        submit(){
          axios.post(`/agent/tenant/assign/${this.room}/${this.tenant.id}`).
                then(response => {
                  this.$modal.hide('assign-tenant');
                  location.reload();
                  flash(response.message);
                }).catch(errors => {

                })
        },
        setDefault(tenant){
         
          this.tenant = tenant;
        },
        show(){
          this.$modal.show('assign-tenant');
        }
      },
  }
</script>
