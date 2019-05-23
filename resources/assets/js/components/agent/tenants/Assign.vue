<template>
  <div class="mr-4 mx-2">
    <button class="no-underline bttn bg-green hover:bg-green-dark" @click="show">Assign</button>
      <modal name="assign-tenant" height="auto" width="450" :draggable=true>
                   <div class="container pb-0"><h4>Assign To a Unit</h4></div>
       <form class="w-full container mx-auto" @submit.prevent="submit">
         
         <div class="form-group">
                  <label for="">Tenant</label>
                  <autocomplete
              url="/agent/tenant/search"
              anchor="email"
              label="writer"
              :min="3"
              :classes="{ wrapper: 'form-wrapper w-full', input: 'form-control', list: 'data-list', item: 'data-list-item' }"
              :on-select="setDefault">
            </autocomplete>
                </div>
            <button class="btn btn-default" type="submit">
             Assign
            </button>
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
