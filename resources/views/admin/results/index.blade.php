<x-user-dashboard>
    <div class="container">
        <form action="{{ route('results.create') }}" method="get">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="garde">Grade:</label>
                    <select id="grade" class="form-control" name="grade">
                        @foreach ($levels as $level)
                         <option value="{{$level->id}}">{{$level->level}}</option>
                        @endforeach
                        
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="section">Section:</label>
                    <select id="section" class="form-control" name="section">
                        <option value="A" selected>A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">See Results</button>
        </form>
    </div>
</x-user-dashboard>