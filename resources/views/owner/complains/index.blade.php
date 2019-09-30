@extends('layouts.main2')

@section("page-title", "Complaints")
@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Complains</h3>
                        </div>
                        <div class="col text-right">
                            <!--<a href="#!" class="btn btn-sm btn-primary">See all</a>-->
                        </div>
                    </div>
                </div>

                <div class="card-body">

                    <div class="row">
                        @foreach($complains as $complain)
                            <div class="col-auto">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $complain->tenant->name }}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{ $complain->created_at->format('dS M Y')}}</h6>
                                        <p class="card-text">{{ $complain->complain }}</p>
                                        <a href="#" class="card-link">Mark solved</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection