<template>
    <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" :src="src">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">{{ user.name | capitalize }}</span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a :href="entity" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
              <!--<a :href="entity" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Settings</span>
              </a>
              <a href="./examples/profile.html" class="dropdown-item">
                <i class="ni ni-calendar-grid-58"></i>
                <span>Activity</span>
              </a>-->
              <a href="#!" class="dropdown-item">
                <i class="ni ni-support-16"></i>
                <span>Support</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#!" class="dropdown-item" @click="logout">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
</template>

<script>
    export default {
        mounted() {
            //alert(1)
            //console.log(this.entity);
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
