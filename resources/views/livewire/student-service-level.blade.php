<div>
    <div class="form-group">
        <label for="student_id">Student Name</label>
        <select wire:model="selectedStudent" class="form-control" name="student_id">
            @foreach ($students as $s)
                <option value="{{ $s->id }}">{{ $s->name }}</option>
            @endforeach
        </select>
    </div>
    
    @if (!is_null($selectedStudent))
        <div class="form-group row d-none">
            <label for="service_id">Service Name</label>
            <select wire:model="selectedService" class="form-control" name="service_id">
                @foreach ($services as $s)
                    <option value="{{ $s->id }}">{{ $s->name }} | charge {{ $s->price }}</option>
                @endforeach
            </select>
        </div>
    @endif

    @if (!is_null($selectedService))
        <div class="form-group row d-none">
            <label for="service_id">Level Name</label>
            <select class="form-control" name="level_id">
                @foreach ($levels as $l)
                    <option value="{{ $l->id }}">{{ $l->levelname }}</option>
                @endforeach
            </select>
        </div>
    @endif


</div>
