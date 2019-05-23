<template>
    <div class="w-full">
        <button class="no-underline bttn bg-tolet-blue hover:bg-blue-ddark" @click="show">Create</button>
        <modal name="open-owner" height="auto" width="450" :draggable=true>
          
          <div class="container pb-0"><h4>Create Property Owner</h4></div>
          
            <form class="w-full container mx-auto" @submit.prevent="submit">
              
              <div class="form-group">
                <label for="">Name</label>
                    <input class="form-control" v-model="form.name" id="grid-first-name" type="text" placeholder="James Doe">
              </div>
              
              <div class="form-row">
                <div class="col">
                  <div class="form-group">
                    <label for="">Email</label>
                    <input class="form-control"  v-model="form.email" type="email" placeholder="tolet@mail.com">
                    <p class="text-red text-xs italic my-2" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></p>
                  </div>
                </div>
                <div class="col">
                    <div class="form-group">
                      <label for="">Alternative Email</label>
                    <input class="form-control"  v-model="form.aemail" type="email" placeholder="tolet@mail.com">
                    <p class="text-red text-xs italic my-2" v-if="form.errors.has('aemail')" v-text="form.errors.get('aemail')"></p>
                    </div>
                </div>
              </div>
              
              <div class="form-row">
                <div class="col">
                  <div class="form-group">
                    <label for="">Country</label>
                      <select class="form-control"  v-model="form.country">
                        <option v-for="(value,key) in countries" :value="key">{{value}}</option>
                      </select>
                      <p class="text-red text-xs italic my-2" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></p>
                  </div>
                </div>
                <div class="col">
                    <div class="form-group">
                      <label for="">City</label>
                    <input class="form-control"  v-model="form.city" type="text" placeholder="Albuquerque">
                    </div>
                </div>
              </div>
              
              <div class="form-row">
                <div class="col">
                  <div class="form-group">
                    <label for="">Phone</label>
                    <input class="form-control"  v-model="form.phone" type="text" placeholder="254700000000">
                  </div>
                </div>
                <div class="col">
                    <div class="form-group">
                      <label for="">Alternative Phone</label>
                    <input class="form-control"  v-model="form.altphone" type="text" placeholder="254700000000">
                    </div>
                </div>
              </div>
              
              
            <!--<div class="flex justify-end items-center">
              <button type="submit" class="bg-green hover:bg-green-darker py-2 px-6 text-white font-bold rounded">Create</button>
            </div>-->
           <button type="submit" class="btn btn-default">Create</button>
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
