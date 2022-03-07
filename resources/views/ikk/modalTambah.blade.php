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
                     <x-select name="kode_ik" value="KODE IK">
                        @foreach ($dataIk as $item)
                            <option id="kode_ik" class="text-light" value="{{ $item->kode_ik }}">{{ $item->kode_ik }}</option>
                        @endforeach
                    </x-select>
                    <x-select name="kode_prog" value="KODE PROG">
                        @foreach ($dataProg as $item)
                            <option id="kode_prog" class="text-light" value="{{ $item->kode_prog }}">{{ $item->kode_prog }}</option>
                        @endforeach
                    </x-select>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save">Save</button>
            </div>
        </div>
    </div>
</div>
