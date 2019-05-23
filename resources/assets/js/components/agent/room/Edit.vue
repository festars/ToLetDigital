<template>
  <div>
    <a href="" class="no-underline px-2 py-1 border-2 border-transparent hover:border-grey-lighter text-lg text-black rounded" @click.prevent="show" :draggable=true>
        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-teal" width="24" height="24" viewBox="0 0 24 24">
            <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
            <path d="M0 0h24v24H0z" fill="none"/>
        </svg>
        Edit
    </a>
      <modal :name="name" height="auto" width="450">
        
      <div class="container pb-0"><h4>Update Unit: {{ form.name }}</h4></div>
        
       <form class="w-full container mx-auto" @submit.prevent="submit">
        
        <div class="form-group">
            <label for="">Name</label>
            <input class="form-control" v-model="form.name" />
            <p class="text-red text-xs italic my-2" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></p>
          </div>

        <div class="form-group">
            <label for="">Property</label>
            <select class="form-control" id="username" type="text" v-model="form.listing">
                <option v-for="listing in listings" :value="listing.id" :key="listing.id">{{ listing.name }}</option>
            </select>
            <p class="text-red text-xs italic my-2" v-if="form.errors.has('listing')" v-text="form.errors.get('listing')"></p>
          </div>
          
          
        <div class="form-row">
            <div class="col">
              <div class="form-group">
                <label for="">Unit Type</label>
                <select class="form-control" v-model="form.type">
                  <option v-for="rmtype in types" :value="rmtype.id" :key="rmtype.id">{{ rmtype.name }}</option>
                </select>
                <p class="text-red text-xs italic my-2" v-if="form.errors.has('type')" v-text="form.errors.get('type')"></p>
              </div>
            </div>
            <div class="col">
                <div class="form-group">
                  <label for="">Unit Size</label>
                  <input class="form-control" v-model="form.size" />
                <p class="text-red text-xs italic my-2" v-if="form.errors.has('size')" v-text="form.errors.get('size')"></p>
              </div>
            </div>
          </div>
        
        
            <button class="btn btn-default" type="submit">
             Update
            </button>
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
             name:'edit-room'+this.item.id,
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
                  this.$modal.hide(this.name);
                  flash(response.message);
                  location.reload();
                }).catch(errors => {

                })
        },
        show(){
          this.$modal.show(this.name);
        }
      },
  }
</script>
