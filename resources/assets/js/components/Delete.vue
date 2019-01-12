<template>
  <div>
    <a href="" class="no-underline px-2 py-1 border-2 border-transparent hover:border-grey-lighter text-lg text-black flex items-center justify-center rounded" @click.prevent="destroy">
      <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-red" width="24" height="24" viewBox="0 0 24 24">
          <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
          <path d="M0 0h24v24H0z" fill="none"/>
      </svg>
      Delete
    </a>
  </div>
</template>

<script>
    export default {
      props: {
          url:{},
          item:{}
      },
      data(){
        return {

        }
      },
      methods: {
            destroy(){
                this.$swal({
                      title: "Are you sure?",
                      text: "You are about to delete one item.",
                      type: "error",
                      showCancelButton: true,
                    })
                    .then((result) => {
                      if (result.value) {
                          axios.delete(this.url,{ params: this.item })
                                .then(response => {
                                  console.log(response);
                                  flash('Item Deleted successfully.');
                                  location.reload();
                                })
                                .catch(errors => {

                                });
                      } else {
                        flash("Item not Deleted");
                      }
                    });
            }
      }
    }
</script>
