<!--<div class="w-full p-2 bg-tolet-blue shandow-lg">
    <div class="flex space-between items-center">
        <div>
        <user-notifications></user-notifications>
        </div>
        <div class="flex justify-end items-center">
            <div class="inline-flex items-center">
                <div class="">
                    
                </div>
                @auth
                <top-right-drop entity="{{Request::route()->getPrefix().'/profile'}}"></top-right-drop>

                @endauth
            </div>
        </div>
    </div>
</div>-->

    <!--<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">

        <user-notifications></user-notifications>
        
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html">Dashboard</a>
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
              <input class="form-control" placeholder="Search" type="text">
            </div>
          </div>
        </form>

        @auth
                <top-right-drop entity="{{Request::route()->getPrefix().'/profile'}}"></top-right-drop>

                @endauth
        
      </div>
    </nav>-->

<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">@yield("page-title")</a>
        
                

        
        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
              <input class="form-control" placeholder="Search" type="text">
            </div>
          </div>
        </form>
        <user-notifications></user-notifications>
        <!-- User -->
        <top-right-drop entity="{{Request::route()->getPrefix()}}"></top-right-drop>
      </div>
    </nav>