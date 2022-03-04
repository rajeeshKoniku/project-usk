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
                    <x-select name="ss_id" value="SS ID">
                        @foreach ($ssData as $item)
                            <option class="text-light" value="{{ $item->id }}">{{ $item->Kode_SS }}</option>
                        @endforeach
                    </x-select>
                    <x-input type="text" name="Kode_IK" value="Kode IK" />
                    <x-textarea type="text" name="Indikator_Kinerja" value="Indikator Kinerja" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save">Save</button>
            </div>
        </div>
    </div>
</div>
