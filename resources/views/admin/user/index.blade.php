<x-app-layout>
    <div>
        <div class="container">
            <form action="{{ route('submarks.create') }}" method="get">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="garde">Grade:</label>
                        <select id="grade" class="form-control" name="grade">
                            {{-- @foreach ($user->levels as $level) --}}
                            @foreach ($levels as $level)
                             <option value="{{$level->id}}">{{$level->level}}</option>
                            @endforeach
                            
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="section">Section:</label>
                        <select id="section" class="form-control" name="section">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="subject">Subject:</label>
                        <select id="subject" class="form-control" name="subject">
                            {{-- @foreach ($user->subjects as $subject) --}}
                            @foreach ($subjects as $subject)
                                
                            <option value="{{$subject->id}}">{{$subject->name}}</option>
                            @endforeach
                        </select>
                        @error('subject')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <button type="submit" class="btn btn-primary" name="save" value="save">Enter Field</button>
            </form>
        </div>
    </div>

</x-app-layout>
