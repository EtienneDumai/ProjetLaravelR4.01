@extends('layouts.app');
@section('content')
<div class="container">
    <h1>Modifier la sauce</h1>
    <form action="{{ route('sauces.update', $sauce->idSauce) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $sauce->name) }}" required>
        </div>
        <div class="form-group">
            <label for="manufacturer">Marque</label>
            <input type="text" name="manufacturer" id="manufacturer" class="form-control" value="{{ old('manufacturer', $sauce->manufacturer) }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $sauce->description) }}</textarea>
        </div>
        <div class="form-group">
            <label for="mainPepper">Epice principal</label>
            <input type="text" name="mainPepper" id="mainPepper" class="form-control" value="{{ old('mainPepper', $sauce->mainPepper) }}" required>
        </div>
        <div class="form-group">
            <label for="heat">Niveau d'épice</label>
            <input type="number" name="heat" id="heat" class="form-control" value="{{ old('heat', $sauce->heat) }}" min="1" max="10" required>
        </div>
        <div class="form-group">
            <label for="imageUrl">Image</label>
            <input type="file" name="imageUrl" id="imageUrl" class="form-control">
            @if($sauce->imageUrl)
                <p>Image actuelle :</p>
                <img src="{{ asset($sauce->imageUrl) }}" alt="Sauce Image" class="img-thumbnail" width="150">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour la sauce</button>
    </form>
</div>
@endsection