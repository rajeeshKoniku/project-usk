<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Kegiatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form" role="form">
                <div class="modal-body">
                    {{-- form --}}
                    <x-select name="program_id" value="Kode Program">
                        @foreach ($programData as $item)
                            <option class="text-light" value="{{ $item->id }}">{{ $item->kode_prog }}</option>
                        @endforeach
                    </x-select>
                    <x-input name="kode_keg" value="Kode Kegiatan" type="text"></x-input>
                    <x-textarea name="uraian_kegiatan" value="Uraian Kegiatan"></x-textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
