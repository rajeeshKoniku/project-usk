<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah IKU</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- form --}}
                <form>
                    <x-textarea type="text" name="kebutuhan_kegiatan" value="kebutuhan kegiatan" />
                    <x-textarea type="text" name="rincian_komponen" value="rincian komponen" />
                    <x-input type="text" name="akun" value="akun" />
                    <x-input type="text" name="jenis_belanja" value="jenis belanja" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save">Save</button>
            </div>
        </div>
    </div>
</div>
