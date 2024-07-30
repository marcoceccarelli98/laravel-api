@extends('layouts.app')

@section('title')
    Projects - Add New
@endsection

@section('content')
    <section>
        <div class="container">
            <h1 class="pt-5 text-white">Aggiungi un nuovo Progetto</h1>

            @if ($errors->any())
                <div class="mt-5 alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="mt-5" action="{{ route('admin.projects.store') }}" method="POST">
                @csrf

                {{-- TITLE --}}
                <div class="text-white form-group">
                    <label for="title">Titolo</label>
                    <input value="Boolflix" type="text" name="title" id="title" class="form-control" required>
                </div>

                {{-- TYPE --}}
                <div class="mt-5 text-white form-group">
                    <label>Titolo</label>
                    <select name="type_id" class="form-select" aria-label="Default select example">
                        <option value="" selected>Seleziona il Tipo</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- TECHNOLOGY --}}
                <div class="mt-5 text-white form-group">
                    <label for="technologies">Technologies : </label>
                    @foreach ($technologies as $technology)
                        <div class="form-check form-check-inline">
                            <input type="checkbox" name="technologies[]" class="text-white btn-check"
                                id="tech-{{ $technology->id }}" value="{{ $technology->id }}" autocomplete="off"
                                {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
                            <label class="btn text-white" for="tech-{{ $technology->id }}">{{ $technology->name }}</label>
                        </div>
                    @endforeach
                </div>

                {{-- DESCRIPTION --}}
                <div class="text-white mt-4 form-group">
                    <label for="description">Descrizione</label>
                    <textarea name="description" id="description" class="form-control" required>Progetto simile a Netflix</textarea>
                </div>

                {{-- STATUS --}}
                <div class="text-white mt-4 form-group">
                    <label for="status">Status</label>
                    <input value="WIP" type="text" name="status" id="status" class="form-control" required>
                </div>

                {{-- START DATE --}}
                <div class="text-white mt-4 form-group">
                    <label for="start_date">Data Inizio</label>
                    <input value="2020-05-07" type="date" name="start_date" id="start_date" class="form-control">
                </div>

                {{-- END DATE --}}
                <div class="text-white mt-4 form-group">
                    <label for="end_date">Data Fine</label>
                    <input type="date" name="end_date" id="end_date" class="form-control">
                </div>

                {{-- IMAGES --}}
                <div class="text-white mt-4 form-group">
                    <label for="images">Immagini (separate da virgola)</label>
                    <input
                        value="https://yt3.googleusercontent.com/i0PPodnHGyWQ9m2XSQ2pjzxhKfSwoK2eI2DlcFjFdsmLqE3jMhBkkh-Hihato9qMcZf9t1ekFQ=s900-c-k-c0x00ffffff-no-rj"
                        type="text" name="images" id="images" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary mt-4">Create Project</button>
            </form>
        </div>
    </section>
@endsection
