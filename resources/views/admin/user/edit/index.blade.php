@extends('layouts.merge.dashboard')
@section('titulo', 'Editar Conta')
@section('content')


<div class="content-body">
    <form action="{{ url('admin/user/delete',$user->id) }}" >
        @csrf
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="category_id">
                        Tem certeza de que deseja excluir este item ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Apagar</button>
                    </div>
                </div>
            </div>
        </div>
        <button class="text-left text-white btn btn-danger btn-fw" id="deleteCategoryBtn" value="{{ $user->id }}">
            <i class="fa fa-trash"></i>
            Eliminar Conta
        </button>
    </form>


    <div class="card shadow">


        </button>
        <div class="card-body">

            <h2 class="my-5 text-center">Editar conta de {{$user->name}} </h2>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4 alert alert-danger" :errors="$errors" />
            <div class="row align-items-center">

                <form class="col-lg-12 mt-2 col-md-12 col-12 mx-auto" method="POST" action="{{ route('admin.user.update', $user->id) }}">
                    @method('PUT')
                    @include('forms._formUser.index')
                    <button class="btn btn-lg  btn-primary btn-block" type="submit">Salvar Alterações</button>
                </form>
            </div>

        </div>

    </div>

</div>


<script>
    $(document).ready(function() {

        $('#deleteCategoryBtn').click(function(e) {
            e.preventDefault();
            var category_id = $(this).val();
            console.log(category_id);
            $('#category_id').val(category_id);
            $('#deleteModal').modal('show');

        });
    });
</script>
@endsection
