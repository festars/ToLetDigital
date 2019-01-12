@extends('layouts.main')
@section('content')
    <div class="flex flex-col m-4">
        <div class="flex justify-between items-center my-4">
            <div class="w-full">
              <div class="flex items-center">
                <div class="left-table w-full my-4 mx-4">
                  <div class="container mx-auto flex justify-between items-center w-full my-2">
                    <div><p class="uppercase font-semibold text-lg text-blue-dark underline">Complains</p></div>
                  </div>
                  @foreach($complains as $complain)
                    <div class="container mx-auto border-b-2 border-teal shadow-lg bg-grey-lighter my-2 rounded">
                        <div class="flex items-center mb-4">
                            <button class="rounded-full bg-grey py-2 px-6 text-grey-darkest mt-2 mr-4"> Addresed by : {{ $complain->tenant->name }}</button>
                        </div>
                        <p class="text-black text-lg font-normal mb-2">
                            {{ $complain->complain }}
                        </p>                        
                        <button class="rounded-full bg-grey py-2 px-6 text-grey-darkest mt-2 ">{{ $complain->created_at->format('dS M Y')}}</button>
                    </div>
                    @endforeach
                </div>
              </div>
            </div>
         </div>
    </div>
@endsection