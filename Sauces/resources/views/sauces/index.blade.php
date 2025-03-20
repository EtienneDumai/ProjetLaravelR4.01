@extends('layouts.app')
@section('content')
<div class="container"></div>
    <div class="row">
        @foreach($sauces as $sauce)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="{{ $sauce->imageUrl }}" class="card-img-top" alt="{{ $sauce->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $sauce->name }}</h5>
                        <p class="card-text">{{ $sauce->description }}</p>
                        <a href="{{ route('sauces.show', $sauce->idSauce) }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection