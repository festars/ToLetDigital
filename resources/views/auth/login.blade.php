@extends('auth.main')

@section('content')

<div class="col-lg-5 col-md-7">
          <div class="card bg-secondary shadow border-0">
            <div class="card-header bg-transparent">
              <div class="text-muted text-center mt-2 mb-3"><small>Please choose the login appropriate to you.</small></div>
            </div>
            <div class="card-body px-lg-5 py-lg-5">
              
              <a href="/tenant/login" class="btn btn-icon btn-3 btn-neutral btn-block">
              	<span class="btn-inner--icon"><i class="ni ni-single-02"></i></span>
                  <span class="btn-inner--text">Tenant</span>
              </a>
              
              <a href="/agent/login" class="btn btn-icon btn-3 btn-neutral btn-block">
              	<span class="btn-inner--icon"><i class="ni ni-active-40"></i></span>
                  <span class="btn-inner--text">Agent</span>
              </a>
              
              
              <a href="/owner/login" class="btn btn-icon btn-3 btn-neutral btn-block">
              	<span class="btn-inner--icon"><i class="ni ni-shop"></i></span>
                  <span class="btn-inner--text">Owner</span>
              </a>
              
              <a href="/vendor/login" class="btn btn-icon btn-3 btn-neutral btn-block">
              	<span class="btn-inner--icon"><i class="ni ni-collection"></i></span>
                  <span class="btn-inner--text">Vendor</span>
              </a>
              
              <a href="/demo/login" class="btn btn-icon btn-3 btn-outline-secondary btn-block">
              	<span class="btn-inner--icon"><i class="ni ni-single-copy-04"></i></span>
                  <span class="btn-inner--text">Demo</span>
              </a>
              
            </div>
          </div>
        </div>





<!-- OLD things -->
<!--<div class="flex justify-center items-center mt-8">
    <div class="rounded">
        <div class="w-full flex justify-center items-center bg-tolet-yellow">
          <img src="/img/newtolet.png" class="h-48 w-48 rounded-full my-2">
        </div>
        <div class="w-full flex justify-center items-center bg-tolet-blue">
          <h3 class="uppercase leading-normal tracking-wide text-xl text-white py-4">welcome to tolet online property management software</h3>
        </div>
        <div class="w-full flex justify-center items-center bg-white">
          <form class="bg-white rounded px-2 pt-2 pb-2 mb-4 w-full">
            <div class="my-2 flex justify-center">
              <label class="block text-teal-darker text-2xl font-bold mb-2" for="password">
                Login as
              </label>              
            </div>
            <div class="mt-8 md:flex md:justify-around w-full">
                <div class="p-4 w-1/5 content-center ">
                  <a href ="/tenant/login" class="no-underline bg-transparent hover:bg-grey text-blue-dark font-bold text-xl hover:text-white py-2 px-8 border border-blue hover:border-transparent rounded mr-2">
                     Tenant
                  </a>
                </div>
                <div class="p-4 w-1/5 content-center ">
                  <a href ="/agent/login" class="no-underline bg-transparent hover:bg-grey text-yellow-dark font-bold text-xl hover:text-white py-2 px-8 border border-yellow hover:border-transparent rounded mr-2">
                     Agent
                  </a>
                </div>
                <div class="p-4 w-1/5 content-center">
                  <a href ="/owner/login" class="no-underline bg-transparent hover:bg-grey text-teal-dark font-bold text-xl hover:text-white py-2 px-8 border border-teal hover:border-transparent rounded mr-2">
                     Owner
                  </a>
                </div>
                <div class="p-4 w-1/5 content-center">
                  <a href ="/vendor/login" class="no-underline bg-transparent hover:bg-grey text-green-dark font-bold text-xl hover:text-white py-2 px-8 border border-green hover:border-transparent rounded mr-2">
                     Vendor
                  </a>
                </div>
                <div class="p-4 w-1/5 content-center">
                  <a href ="/demo/login" class="no-underline bg-transparent hover:bg-grey text-indigo-dark font-bold text-xl hover:text-white py-2 px-8 border border-indigo hover:border-transparent rounded mr-2">
                     Demo
                  </a>
              </div>
              </div>
          </form>
        </div>
    </div>
</div>-->
@endsection

