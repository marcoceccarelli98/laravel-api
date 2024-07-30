{{-- @dd($data) --}}

@extends('layouts.app')

@section('title')
    Projects
@endsection

@section('content')
    {{-- @dd($data) --}}
    <section>
        <h1 class= "mx-3 py-3 text-white">Guest</h1>
        <div class="container">
            <div class="projects-list">
                @foreach ($projects as $project)
                    <div class="project-card">
                        <a href="{{ route('projects.show', $project) }}">
                            <div class="image-container">
                                <img src="{{ $project['images'][0] }}" alt="Thumb not found">
                            </div>
                            <div class="title-container">
                                <p>{{ $project['title'] }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
