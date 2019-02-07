@extends('layouts.main')
@section('content')

<div class="bg-white h-full">
  
    <div>
          <h3>Dashboard</h3>
        <div class="flex justify-between mt-4">
            <div class="h-48 w-1/3 mx-4 bg-white rounded border-b-2 border-r-2 border-l-2 shadow-md">
                <div class="flex flex-col justify-center items-center border-t-8 border-blue rounded">
                    <div class="flex justify-center items-center py-2 px-2 my-4">
                        <h4 class="text-bold text-5xl tracking-wide text-tolet-blue">{{$data->total_listings}}</h4>
                    </div>
                    <div class="flex justify-center items-center">
                        <a class="text-lg uppercase text-grey tracking-wide" href="/agent/listing"><h4 >Properties</h4></a>
                    </div>
                </div>
            </div>
            <div class="h-48 w-1/3 mx-4 bg-white rounded border-b-2 border-r-2 border-l-2 shadow-md">
                <div class="flex flex-col justify-center items-center border-t-8 border-red rounded">
                    <div class="flex justify-center items-center py-2 px-2 my-4">
                        <h4 class="text-bold text-5xl tracking-wide text-tolet-blue">{{$data->total_units}}</h4>
                    </div>
                    <div class="flex justify-center items-center">
                        <a class="text-lg uppercase text-grey tracking-wide" href="/agent/room"><h4>Units</h4></a>
                    </div>
                </div>
            </div>
            <div class="h-48 w-1/3 mx-4 bg-white rounded border-b-2 border-r-2 border-l-2 shadow-md">
                <div class="flex flex-col justify-center items-center border-t-8 border-indigo rounded">
                    <div class="flex justify-center items-center py-2 px-2 my-4">
                        <h4 class="text-bold text-5xl tracking-wide text-tolet-blue">{{$data->total_tenants}}</h4>
                    </div>
                    <div class="flex justify-center items-center">
                        <a class="text-lg uppercase text-grey tracking-wide" href="/agent/tenant"><h4 >Tenants</h4></a>
                    </div>
                </div>
            </div>

            <div class="h-48 w-1/3 mx-4 bg-white rounded border-b-2 border-r-2 border-l-2 shadow-md">
                <div class="flex flex-col justify-center items-center border-t-8 border-green rounded">
                    <div class="flex justify-center items-center py-2 px-2 my-4">
                        <h4 class="text-bold text-5xl tracking-wide text-tolet-blue">{{$data->complains_count}}</h4>
                    </div>
                    <div class="flex justify-center items-center">
                        <a class="text-lg uppercase text-grey tracking-wide" href="/agent/complains"><h4 >Complains</h4></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-white h-full">
    <div>
        <div class="flex justify-between mt-4">
            <div class="h-48 w-1/3 mx-4 bg-white rounded border-b-2 border-r-2 border-l-2 shadow-md">
                <div class="flex flex-col justify-center items-center border-t-8 border-blue rounded">
                    <div class="flex justify-center items-center py-2 px-2 my-4">
                        <h4 class="text-bold text-5xl tracking-wide text-tolet-blue">{{$data->unpaid_invoices}}</h4>
                    </div>
                    <div class="flex justify-center items-center">
                        <a class="text-lg uppercase text-grey tracking-wide" href="/agent/invoice?type=unpaid"><h4 >Unpaid Invoces</h4></a>
                    </div>
                </div>
            </div>
            <div class="h-48 w-1/3 mx-4 bg-white rounded border-b-2 border-r-2 border-l-2 shadow-md">
                <div class="flex flex-col justify-center items-center border-t-8 border-red rounded">
                    <div class="flex justify-center items-center py-2 px-2 my-4">
                        <h4 class="text-bold text-5xl tracking-wide text-tolet-blue">{{$data->paid_invoices}}</h4>
                    </div>
                    <div class="flex justify-center items-center">
                        <a class="text-lg uppercase text-grey tracking-wide" href="/agent/invoice?type=paid"><h4>Paid Invoices</h4></a>
                    </div>
                </div>
            </div>
            <div class="h-48 w-1/3 mx-4 bg-white rounded border-b-2 border-r-2 border-l-2 shadow-md">
                <div class="flex flex-col justify-center items-center border-t-8 border-indigo rounded">
                    <div class="flex justify-center items-center py-2 px-2 my-4">
                        <h4 class="text-bold text-5xl tracking-wide text-tolet-blue">{{$data->rent_total}}</h4>
                    </div>
                    <div class="flex justify-center items-center">
                        <a class="text-lg uppercase text-grey tracking-wide" href="/agent/rent"><h4 >Rent Expected</h4></a>
                    </div>
                </div>
            </div>

            <div class="h-48 w-1/3 mx-4 bg-white rounded border-b-2 border-r-2 border-l-2 shadow-md">
                <div class="flex flex-col justify-center items-center border-t-8 border-green rounded">
                    <div class="flex justify-center items-center py-2 px-2 my-4">
                        <h4 class="text-bold text-5xl tracking-wide text-tolet-blue">0</h4>
                    </div>
                    <div class="flex justify-center items-center">
                        <a class="text-lg uppercase text-grey tracking-wide" href="/agent/tasks"><h4 >Tasks</h4></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
