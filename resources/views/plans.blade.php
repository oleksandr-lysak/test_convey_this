@extends('layouts.app')

@section('title', 'Tariff Plans')
@section('description', 'Choose the best tariff plan for you')

@section('content')
    <div class="container py-5">
        <h1 class="text-center mb-4">Choose Your Tariff Plan</h1>

        <div class="row justify-content-center">
            @foreach ($plans as $plan)
                <div class="col-md-4 d-flex">
                    <div class="card text-center shadow-lg border-0 mb-4 d-flex flex-column w-100">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title mb-0">{{ $plan->name }}</h5>
                        </div>
                        <div class="card-body flex-grow-1">
                            <h3 class="text-primary">${{ number_format($plan->price, 2) }} <small class="text-muted">/
                                    month</small></h3>
                            <ul class="list-unstyled text-left">
                                @foreach ($plan->features as $key => $feature)
                                    <li>✔ {{ $key }} {{ $feature }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-footer bg-white">
                            @if (auth()->user()->plan_id == $plan->id)
                                <button class="btn btn-secondary" disabled>Your plan</button>
                            @else
                                <form action="{{ url('/plans/change') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                                    <button type="submit" class="btn btn-primary">Buy</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
