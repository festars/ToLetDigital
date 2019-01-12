/**
 * Keeps the state of values.
 *
 * array got from db .
 */
const state = {
    form:new Form({
                    'name':'',
                    'id':'',
                    'description':'',
                }),
    propertiestypes:[],
    formTitle:'',
    btnTxtbox:'',
    item:{},
    PropertyType:require('../../components/admin/propertyTypes/PropertyType.vue')
}
/**
 * state, getters
 *
 * @type state object, filters
 */
const getters = { //state //used to get the values from components

  }

/**
 * state, payload
 *
 *  changes the state values
 * @type {Object}
 */
const mutations = {
    setPropertyTypes(state, properties){
        state.propertiestypes = properties;
    },

    hideDialog(state){
        //console.log($vm);
        this.$modal.hide(state.PropertyType);
    },

    showDialog(state){
         this.$modal.show(state.PropertyType);
    }


}

/**
 * Instead of mutating the state, actions commit mutations.
 * They get the data from db then invoke a mutation.
 *
 * @type {Object}
 */
const actions = {
    getPropertyTypes({ commit}){
        axios.get(`/admin/types/json`)
              .then(({data}) => {
                  commit('setPropertyTypes',data.ptypes.data)
              })
              .catch(errors => {

              });
    },
    deletePropertyType({ dispatch}, item){
         axios.delete(`/admin/types/`+item.id)
              .then(response => {dispatch('getPropertyTypes'); })
              .catch(errors => { });
    },

    updatePropertyType({ state,dispatch,commit}, item){

        state.form.put(`/admin/types/${item.id}`)
                .then(response => {
                    dispatch('getPropertyTypes');
                    commit('hideDialog')
                     })
                .catch(errors => {});
    },
    savePropertyType({ state,dispatch}){
        state.form.post(`/admin/types`)
                .then(response => { dispatch('getPropertyTypes'); })
                .catch(errors => {});
    }
}


export default {
  state,
  getters,
  actions,
  mutations
}
