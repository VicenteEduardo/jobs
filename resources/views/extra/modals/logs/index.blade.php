<div class="modal fade p-5" id="logs{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="logs{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logs{{ $item->id }}">Registo de Actividade do ID {{ $item->id }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="col-12 p-3">

               <p class="text-dark"> {{ $item->message }}</p>
            </div>
        </div>
    </div>
</div>
