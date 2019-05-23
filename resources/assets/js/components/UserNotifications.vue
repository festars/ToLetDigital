<template>
    <ul class="navbar-nav align-items-center ml-md-auto">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark active" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-bell-55"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right py-0 overflow-hidden">
                <!-- Dropdown header -->
                <div class="px-3 py-3" v-if="notifications.length">
                  <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">13</strong> notifications.</h6>
                </div>
                
                <div class="px-3 py-3" v-if="! notifications.length">
                  <h6 class="text-sm text-muted m-0 text-center">You have no nofications</h6>
                </div>
                
                <!-- List group -->
                <div v-if="notifications.length" class="list-group list-group-flush">
                  <a :href="notification.data.link" class="list-group-item list-group-item-action" v-for="(notification, index) in notifications"
                        :key="notification.id" @click.prevent="markAsRead(notification)">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img :src="notification.data.notifier.avatar_path"
                                 :alt="notification.data.notifier.username" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>2 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">{{ notification.data.message }}</p>
                      </div>
                    </div>
                  </a>
                  
                  
                </div>
                <!-- View all -->
                <a href="#!" v-if="notifications.length" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-ungroup"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default dropdown-menu-right">
                <div class="row shortcuts px-4">
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-red">
                      <i class="ni ni-calendar-grid-58"></i>
                    </span>
                    <small>Calendar</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-orange">
                      <i class="ni ni-email-83"></i>
                    </span>
                    <small>Email</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-info">
                      <i class="ni ni-credit-card"></i>
                    </span>
                    <small>Payments</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-green">
                      <i class="ni ni-books"></i>
                    </span>
                    <small>Reports</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-purple">
                      <i class="ni ni-pin-3"></i>
                    </span>
                    <small>Maps</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-yellow">
                      <i class="ni ni-basket"></i>
                    </span>
                    <small>Shop</small>
                  </a>
                </div>
              </div>
            </li>
          </ul>
    
</template>

<script>

    import activation from '../mixins/activation';

    export default {

        mixins: [ activation ],

        data() {
            return { notifications: false }
        },

        created() {
            this.fetchNotifications();
        },

        computed: {
            endpoint() {
                return `/profiles/notifications`;
            }
        },

        methods: {
            fetchNotifications() {
                axios.get(this.endpoint)
                    .then(response => this.notifications = response.data);
            },

            markAsRead(notification) {
                axios.delete(`${this.endpoint}/${notification.id}`)
                    .then(({data}) => {
                        this.fetchNotifications();

                        document.location.replace(data.link);
                    });
            }
        }
    }
</script>