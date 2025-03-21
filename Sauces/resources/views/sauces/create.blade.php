@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Ajouter une sauce</h1>
        <form action="{{ route('sauces.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="manufacturer" class="form-label">Marque</label>
                <input type="text" name="manufacturer" id="manufacturer" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="mainPepper" class="form-label">Epice principal </label>
                <input type="text" name="mainPepper" id="mainPepper" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="imageUrl" class="form-label">Image</label>
                <input type="file" name="imageUrl" id="imageUrl" class="form-control">
            </div>
            <div class="mb-3">
                <label for="heat" class="form-label">Niveau d'épice</label>
                <input type="number" name="heat" id="heat" class="form-control" min="1" max="10" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Créer la sauce</button>
        </form>
    </div>

@endsection