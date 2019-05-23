<template>
<div>
    <div class="ml-2">
         <div class="relative">
            <div class="flex items-center cursor-pointer" @mouseover="drop=!drop">
            <img :src=src class="h-8 w-8 rounded-full mr-2">
            <span class="mr-2">{{ user.name }}</span>

            <svg class="top-icon mr-4" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 129 129">
              <g>
                <path d="m121.3,34.6c-1.6-1.6-4.2-1.6-5.8,0l-51,51.1-51.1-51.1c-1.6-1.6-4.2-1.6-5.8,0-1.6,1.6-1.6,4.2 0,5.8l53.9,53.9c0.8,0.8 1.8,1.2 2.9,1.2 1,0 2.1-0.4 2.9-1.2l53.9-53.9c1.7-1.6 1.7-4.2 0.1-5.8z"/>
              </g>
            </svg>
            </div>
            <div class="rounded shadow-md bg-tolet-blue  z-50 mt-12 absolute pin-t pin-l min-w-full" v-if="drop">
                <ul class="list-reset">
                    <li>
                        <a :href="entity" class="px-4 py-2 block text-white hover:bg-blue-darker no-underline flex justify-around">
                            <svg xmlns="http://www.w3.org/2000/svg" class="side-icon" viewBox="0 0 20 20">
                                <path fill="none" d="M0 0h20v20H0V0z"/>
                                <path d="M15.95 10.78c.03-.25.05-.51.05-.78s-.02-.53-.06-.78l1.69-1.32c.15-.12.19-.34.1-.51l-1.6-2.77c-.1-.18-.31-.24-.49-.18l-1.99.8c-.42-.32-.86-.58-1.35-.78L12 2.34c-.03-.2-.2-.34-.4-.34H8.4c-.2 0-.36.14-.39.34l-.3 2.12c-.49.2-.94.47-1.35.78l-1.99-.8c-.18-.07-.39 0-.49.18l-1.6 2.77c-.1.18-.06.39.1.51l1.69 1.32c-.04.25-.07.52-.07.78s.02.53.06.78L2.37 12.1c-.15.12-.19.34-.1.51l1.6 2.77c.1.18.31.24.49.18l1.99-.8c.42.32.86.58 1.35.78l.3 2.12c.04.2.2.34.4.34h3.2c.2 0 .37-.14.39-.34l.3-2.12c.49-.2.94-.47 1.35-.78l1.99.8c.18.07.39 0 .49-.18l1.6-2.77c.1-.18.06-.39-.1-.51l-1.67-1.32zM10 13c-1.65 0-3-1.35-3-3s1.35-3 3-3 3 1.35 3 3-1.35 3-3 3z"/>
                            </svg>
                            <span> Setting </span>
                        </a>
                    </li>
                     <li>
                        <hr class="border-t mx-2 border-grey-light">
                    </li>
                    <li>
                    <a href="#" class="px-4 py-2 block text-white hover:bg-blue-darker no-underline flex justify-around" @click="logout">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="side-icon">
                                <path d="M0 0h24v24H0z" fill="none"/>
                                <path d="M7 24h2v-2H7v2zm4 0h2v-2h-2v2zm2-22h-2v10h2V2zm3.56 2.44l-1.45 1.45C16.84 6.94 18 8.83 18 11c0 3.31-2.69 6-6 6s-6-2.69-6-6c0-2.17 1.16-4.06 2.88-5.12L7.44 4.44C5.36 5.88 4 8.28 4 11c0 4.42 3.58 8 8 8s8-3.58 8-8c0-2.72-1.36-5.12-3.44-6.56zM15 24h2v-2h-2v2z"/>
                            </svg>
                            <span> Logout </span>
                    </a>
                    </li>
                </ul>
            </div>
        </div>
    </div> 
</div>

</template>

<script>
    export default {
        mounted() {
            console.log(this.entity);
        },

        props:['entity'],

        components: {

        },

        data() {
            return {
                user: window.App.user,
                src:window.App.user.profilepic,
                drop:false
            }
        },

        methods: {
            logout(){
                axios.post(`/logout`)
                    .then(response => {
                        location.reload();
                    })
                    .catch(errors => {

                    });
            }
        },
    }
</script>
