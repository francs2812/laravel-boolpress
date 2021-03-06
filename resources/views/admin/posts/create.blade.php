@extends('layouts.app')

@section('content')
    <h1>Crea una nuovo post</h1>

    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control" id="title" placeholder="Inserisci il titolo del post" name="title">
        </div>

        <div class="form-group">
            <label for="content">Descrizione</label>
            <input type="content" class="form-control" id="content" placeholder="Inserisci il tsto del post" name="content">
        </div>

        <div class="form-group">
            <label for="category_id">Categoria</label>
            <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                <option value="">-- Seleziona una categoria --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ ($category->id == old('category_id')) ? 'selected' : '' }}
                        >{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <h5>Tag ricerca</h5>
        <div class="form-group mb-5"> 
            @foreach ($tags as $tag)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" name="tags[]" type="checkbox" id="tag-{{ $tag->id }}" value="{{ $tag->id }}"
                    {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}
                    >
                    <label class="form-check-label" for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                </div>     
            @endforeach 
            @error('tags')
                <div>
                    <small class="text-danger">{{ $message }}</small> 
                </div>
            @enderror  
        </div>

        <div class="form-group">
            <label for="cover">Importa cover</label>
            <input type="file" name="cover" class="form-control-file" id="cover">
            @error('cover')
                <div>
                    <small class="text-danger">{{ $message }}</small> 
                </div>
            @enderror  
        </div>
        
        <button type="submit" class="btn btn-primary">Salva</button>
        
    </form>
    @endsection