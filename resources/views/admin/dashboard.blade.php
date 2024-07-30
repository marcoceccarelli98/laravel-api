@extends('layouts.app')

@section('content')
    <section>

        {{-- Add new Project --}}
        <div class="add-project">
            <a class="btn btn-primary" href="{{ route('admin.projects.create') }}">ADD NEW PROJECT</a>
        </div>
        {{-- @dd($projects) --}}

        <div class="container">
            {{-- <div class="row justify-content-center">
            <div class="col mt-4">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    
                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        
                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div> --}}

            <table class="mt-4 table table-dark table-bordered table-hover table-striped text-white">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">#id</th>
                        <th scope="col">Titolo</th>
                        <th scope="col">Status</th>
                        <th scope="col">Tipo</th>
                        <th class="px-5 text-end" scope="col">Operazioni</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($projects as $project)
                        {{-- @dd($project->slug) --}}
                        <tr>
                            <th style="width: 5%;" class="text-center lh-40" scope="row">
                                {{ $project->id }}</th>
                            <td style="width: 20%;" class="px-4 lh-40">{{ $project->title }}
                            </td>
                            <td style="width: 20%;" class="px-4 lh-40">{{ $project->status }}
                            </td>
                            <td style="width: 20%;" class="px-4 lh-40">
                                {{ $project->type?->name ?: 'Nessun tipo selezionato' }}</td>
                            <td style="width: 35%;" class="px-5 text-end">
                                {{-- SHOW --}}
                                <a href="{{ route('admin.projects.show', $project->slug) }}" class="btn btn-primary"><i
                                        class="fas fa-eye"></i></a>


                                {{-- EDIT --}}
                                <a href="{{ route('admin.projects.edit', $project) }}" class="btn bg-warning mx-2"><i
                                        class="fas fa-pen"></i></a>

                                {{-- DELETE --}}
                                <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger"
                                    type="submit">
                                    <i class="fas fa-trash-can"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <ul>
            </ul>

        </div>
    </section>

    <!-- Modal -->
    <div class="modal" id="exampleModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Are u sure u want to delete : {{ $project->title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Abort</button>
                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger"
                            type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
