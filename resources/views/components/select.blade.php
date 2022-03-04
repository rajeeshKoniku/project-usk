<div class="mb-3 row">
    <label for="{{$name}}" class="col-sm-2 col-form-label">{{$value}}</label>
    <div class="col-sm-10">
        <select class="form-select text-dark" name="{{$name}}" id="{{$name}}" required>
            {{$slot}}
        </select>
    </div>
</div>
