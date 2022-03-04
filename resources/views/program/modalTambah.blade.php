<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Program</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- form --}}
                <form>
                    <x-select name="ik_id" value="IK ID">
                        @foreach ($ikData as $item)
                            <option class="text-light" value="{{$item->id}}">{{$item->Kode_IK}}</option>
                        @endforeach
                    </x-select>
                    <x-input name="Kd_Program" value="KD Program" type="text"></x-input>
                    <x-textarea name="Program" value="Program"></x-textarea>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save">Save</button>
            </div>
        </div>
    </div>
</div>
