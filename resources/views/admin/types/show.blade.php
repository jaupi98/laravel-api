@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Type Name -->
            <div class="col-6 d-flex justify-content-start align-items-end my-5">
                <h1>{{ $type->name }}</h1>
            </div>
            <!-- Link To Types List -->
            <div class="col-6 d-flex justify-content-end align-items-end my-5">
                <a href="{{ Route('admin.types.index') }}" class="btn btn-primary">Lista Tipologie</a>
            </div>
            <!-- Create, Edit Confirm Message -->
            @if (session('message'))
                <div class="col-12 mt-5">
                    <div class="alert alert-success">
                        <span>{{ session('message') }}</span>
                    </div>
                </div>
            @endif
            <div class="col-12 mb-5">
                <!-- Show Card -->
                <div class="card w-100">
                    <div class="card-body">
                        <!-- Type Slug -->
                        <div class="my-5 text-center">
                            <!-- Slug Label -->
                            <label class="fw-bold">Slug:</label>
                            <!-- Slug Content -->
                            <span class="d-inline-block">{{ $type->slug }}</span>
                        </div>
                        <!-- Type Projects -->
                        <div class="my-5 text-center">
                            <div class="row justify-content-center">
                                @if (count($type->projects) == 0)
                                    <span>Nessun Progetto appartenente alla Tipologia "{{ $type->name }}"</span>
                                @else
                                    <!-- Projects Label -->
                                    <label class="fw-bold">Progetti {{ $type->name }}:</label>
                                    <!-- List of Projects -->
                                    @foreach ($type->projects as $project)
                                        <div class="col-4 p-4">
                                            <div class="card h-100">
                                                @if (empty($project->cover_image))
                                                    <span>Immagine non disponibile</span>
                                                @else
                                                    <!-- Cover Image -->
                                                    <img src="{{ asset('storage/'.$project->cover_image) }}" alt="{{ $project->title }}-cover-image" class="card-img-top w-100">
                                                @endif
                                                <div class="card-body">
                                                    <!-- Project Title -->
                                                    <h5 class="card-title">{{ $project->title }}</h5>
                                                    <!-- Project Description -->
                                                    <p class="card-text">{{ $project->description }}</p>
                                                </div>
                                                <div class="card-footer py-3">
                                                    <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-primary">Vai al Progetto</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection