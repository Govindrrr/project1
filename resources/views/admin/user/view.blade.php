<x-user-dashboard>
    <div>
        <div class="container">



            <form action="" method="post">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <form action="">
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="grade">Grade:</label>
                                            <input type="text" value="{{session('grade')}}" class="form-control" readonly>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="section">Section:</label>
                                            <input type="text" value="'{{session('section')}}'" class="form-control"
                                                readonly>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="Subject">Subject:</label>
                                            <input type="text" value="{{ session('subject') }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="mainTable" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Select</th>
                                                <th>Name</th>
                                                <th>Roll no</th>
                                                <th>Marks</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (session('marks')->all() as $mark)
                                                <tr>
                                                    <td><input type="checkbox" name="selected_users[]"
                                                            value="{{ $mark->id }}"></td>
                                                    <td>Bike</td>
                                                    <td>{{ $mark->roll_no }}</td>
                                                    <td>{{ $mark->marks }}</td>
                                                    <td class="d-flex">
                                                        
                                                        <div class="d-flex align-items-center">
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
                                    <a href="{{route('submarks.create')}}">create</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            </form>
        </div>
    </div>

</x-user-dashboard>
