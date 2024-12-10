<x-user-dashboard>
    <div>
        <div class="container">
            <form action="">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="grade">Grade:</label>
                        <input type="text" value="{{ session('grade') }}" class="form-control" readonly>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="section">Section:</label>
                        <input type="text" value="'{{ session('section') }}'" class="form-control" readonly>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="Subject">Subject:</label>
                        <input type="text" value="{{ session('subject') }}" class="form-control" readonly>
                    </div>
                </div>
            </form>
            <form action="{{ route('submarks.update',$mark->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-row">


                    <div class="form-group col-md-3 mr-3">
                        <label for="roll">Roll no:</label>
                        <input type="number" value="{{ $mark->roll_no }}" class="form-control" name="roll_no">
                        @error('roll_no')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3 mr-3">
                        <label for="marks">Marks:</label>
                        <input type="number" value="{{$mark->marks}}" class="form-control" name="marks" step="0.1"
                            min="1" max="100">
                        @error('marks')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <button type="submit" class="btn btn-success" name="save" value="save">Update</button>
            </form>
        </div>
    </div>
</x-user-dashboard>
