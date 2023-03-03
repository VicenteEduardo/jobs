@extends('layouts.merge.dashboard')
@section('titulo', 'Adicionar Imagens da Galeria')

@section('content')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                <a href="{{ route('admin.gallery.index') }}"><u>Listar Galerias</u></a> >
                Adicionar Imagens da Galeria: {{ $gallery->name }}
            </h2>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action='{{ url("admin/imageGallery/store/$gallery->id") }}' enctype="multipart/form-data" method="POST" class="row">
                @csrf
                @include('forms._formImageGallery.index')
                <div class="col-md-12">
                    <div class="form-group text-center">
                        <button type="submit" class="btn px-5 col-md-4 btn-success">
                            Salvar Imagens
                            <span class="fe fe-chevron-right fe-16"></span>
                        </button>

                    </div>
                </div>
            </form>
        </div>
    </div>



@endsection
