{{-- @dd($data) --}}

@extends('layouts.app')

@section('title')
    Projects
@endsection

@section('content')
    <section>
        {{-- Add new Project --}}
        <div class="add-project">
            <a class="btn btn-primary" href="{{ route('admin.projects.create') }}">ADD NEW PROJECT</a>
        </div>

        <h1 class= "mx-3 py-3 text-white">Admin</h1>
        <div class="container">
            <div class="projects-list">
                @foreach ($projects as $project)
                    <div class="project-card">
                        <a href="{{ route('admin.projects.show', $project->slug) }}">
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
