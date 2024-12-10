<x-app-layout>
    <class="container">
        <div class="">
            <form action="{{ route('results.store') }}" method="post">
                @csrf
                
                <div class="form-row">
                    <div class="form-group col-md-3 col-12">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name">
                        @error('name')
                            <div class="text-danger">{{$message}}</div>                            
                        @enderror
                    </div>
                    <div class="form-group col-md-3 col-12">
                        <label for="roll">Roll_no:</label>
                        <input type="number" class="form-control" id="roll" name="roll">
                        @error('name')
                        <div class="text-danger">{{$message}}</div>                            
            	        @enderror

                    </div>

                    <div class="form-group col-md-3">
                        <label for="garde">Grade:</label>
                        <select id="grade" class="form-control" name="grade">
                            
                             <option value="{{session('grade_id')}}">{{session('grade')}}</option>
                          
                            
                        </select>
                        @error('name')
                        <div class="text-danger">{{$message}}</div>                            
                       @enderror

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
                <button type="submit" class="btn btn-success m-2">Add Result</button>
            </form>
        </div>

        {{-- This is view section  --}}
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Grade 1 results</h4>
            <div class="d-flex flex-row">
                <div class="text-white bg-warning p-2 d-flex align-items-center rounded">
                    <form action="{{route('import')}}" method="post" enctype="multipart/form-data">
                        @csrf
                      

                           
                            <input type="file" class="" name="image" id="image" class="form-control bg-primary">
                            <a href=""><button type="submit" class="bg-none">Import</button></a>
                            
                      
                    </form>
                    <a href="{{route('export')}}" class="mx-1 text-white bg-warning p-2 d-flex align-items-center bg-warning border rounded"><i data-feather="upload"></i>Exports</a>
                </div>
               
            </div>
            <a href="{{route('results.create')}}">Add result</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="mainTable" class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Roll</th>
                            <th>
                                Obtained Marks(GPA)
                            </th>
                            <th>Total marks</th>
                            <th>Result</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($results as $result)
                            
                        <tr>
                            <td>{{$result->Name}}</td>
                            <td>{{$result->roll_no}}</td>
                            <td>{{$result->GPA}}</td>
                            <td>{{$result->total}}</td>
                            <td>{{$result->result}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>

</x-app-layout>
