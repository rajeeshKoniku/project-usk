<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah SS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form" role="form">
                <div class="modal-body">
                    {{-- form --}}
                        <x-input name="Kode_SS" value="Kode SS" type="text"></x-input>
                        <x-textarea name="Sasaran" value="Sasaran"></x-textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
