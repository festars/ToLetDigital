<template>
  <div class="text-black flex flex-col mx-4">
    <div class="flex justify-between items-center shandow-md my-4">
      <div class="px-2">
        <p><h3>Property Types</h3></p>
      </div>
         <div>
        <button class="bttn bg-blue hover:bg-blue-ddark" @click="newItem">New</button>
       </div>
    </div>
    <v-data-table
      :headers="headers"
      :items="proertiestypes"
      hide-actions
      class="elevation-1"
    >
      <template slot="items" slot-scope="props">
        <td>{{ props.item.name }}</td>
        <td class="text-xs-left">{{ props.item.description }}</td>
        <td class="justify-center layout px-0">
          <v-btn icon class="mx-0" @click="editItem(props.item)">
            <v-icon color="teal">edit</v-icon>
          </v-btn>
          <v-btn icon class="mx-0" @click="deleteItem(props.item)">
            <v-icon color="pink">delete</v-icon>
          </v-btn>
        </td>
      </template>
      <template slot="no-data">
        <v-btn color="primary" @click="initialize">Reset</v-btn>
      </template>
    </v-data-table>
  </div>
</template>


<script>
  import { mapGetters, mapState } from 'vuex'
    export default {
        created() {
          this.initialize();
        },

        props:[

        ],

        data() {
            return {
                headers:[
                    {
                      text: 'Name',
                      align: 'left',
                      sortable: false,
                      value: 'name'
                    },
                    { text: 'Description', value: 'description' },
                ],
            }
        },

        methods: {
            initialize(){
              this.$store.dispatch('getPropertyTypes')
            },

            delete(item){
                this.$store.dispatch('deletePropertyType', item)
                this.$modal.hide()
            },
            editItem (item) {
                this.editedIndex = this.proertiestypes.indexOf(item)
                this.editedItem = Object.assign({}, item)
                this.show();
              },

            newItem(){
              this.editedItem = Object.assign({}, {});
              this.show();
            },

            deleteItem (item) {
                const index = this.proertiestypes.indexOf(item)
                 const deleteItem = Object.assign({}, item)
                this.$modal.show('dialog', {
                  title: 'Delete!',
                  text: 'Are you sure you want to delete this Item ?',
                  buttons: [
                    {
                      title: 'Delete',
                      default: true,
                      handler: () => { this.delete(deleteItem) }
                    },
                    {
                      title: 'Close',
                      handler: () => { this.$modal.hide() }
                    }
                 ]
                })
              },

            show () {
                this.$modal.show(this.PropertyType, {
                  item : this.editedItem
                }, {
                  height:'auto'
                });
            },
            hide () {
                this.$modal.hide(this.PropertyType);
            },
        },

        computed:{
            ...mapState({
              proertiestypes : state => state.PTypes.propertiestypes,
              PropertyType : state => state.PTypes.PropertyType,
            })
        }
    }
</script>

<style>

</style>
