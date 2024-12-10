<x-app-layout>
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
        <form action="{{ route('submarks.store') }}" method="post">
            @csrf

            <div class="form-row">


                <div class="form-group col-md-3 mr-3">
                    <label for="roll">Roll no:</label>
                    <input type="number" value="{{ ++$roll }}" class="form-control" name="roll_no">
                    @error('roll_no')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-3 mr-3">
                    <label for="marks">Marks:</label>
                    <input type="number" value="" class="form-control" name="marks" step="0.1"
                        min="1" max="100">
                    @error('marks')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <button type="submit" class="btn btn-primary" name="save" value="save">Insert Marks</button>
        </form>
        
        <div class="row my-2">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                       <h5>View and Edit</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="mainTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Select</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Roll no</th>
                                        <th class="text-center">Marks</th>
                                        <th class="text-center">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                   
                                  
                                    @foreach (session('marks')->all() as $mark)
                                            
                                        <tr>
                                            <td><input type="checkbox" name="selected_users[]"
                                                    value="{{ $mark->id }}"></td>
                                            <td class="text-center">Bike</td>
                                            <td class="text-center">{{$mark->roll_no}}</td>
                                            <td class="text-center">{{ $mark->marks }}</td>
                                            <td class="d-flex justify-content-center">
                                                        
                                                <div class="d-flex align-items-center justify-items-center">
                                                    <a href="{{route('submarks.edit',$mark->id)}}" class="bg-warning text-white mx-3 px-3 py-2 text-decoration-none rounded">Edit</a>
                                                    <form action="{{ route('submarks.destroy', $mark->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach
                                  

                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

</x-app-layout>
