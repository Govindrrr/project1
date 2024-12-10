<x-app-layout>
    <div>
        <div class="container">
          <div>
            <h2>Faculty Section</h2>
          </div>
          <br>

            <form action="{{route('subjects.store')}}" method="post">
              @csrf
               
                <div class="form-row">
                    
                    <div class="form-group col-md-3 mr-3">
                        <label for="name">Subject Name:</label>
                        <input type="text" id="name" class="form-control" name="name">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    <div class="form-group col-md-3 mr-3">
                        <label for="faculty">Faculty:</label>
                        
                        <select name="faculty[]" id="faculty" class="form-control select2" multiple>
                         @foreach ($faculties as $faculty)
                             
                         <option value="{{$faculty->id}}">{{$faculty->name}}</option>
                         @endforeach
                              
                        
                        </select>
                          @error('faculty')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                   
                </div>

                <button type="submit" class="btn btn-success">Add New Subjects</button>
                
            </form>
            <br>

            <div class="card">
              <div class="card-header">
                <h4>Subjects</h4>
              </div>
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">SN</th>
                      <th scope="col">Name</th>
                      <th scope="col">Faculty</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($subjects as $index => $subject)
                        
                  
                    <tr>
                      <th scope="row">{{ ++$index }}</th>
                      <td>{{$subject->name}}</td>
                      <td>{{$subject->Faculties->pluck('name')->implode(" ,")}}</td>
                      <td class="d-flex">
                        <div>
                          <a href="{{route('subjects.edit',$subject->id)}}"><button class="btn btn-primary">Edit</button></a>

                        </div>
                        <div>
                          <form action="{{route('subjects.destroy',$subject->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
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
   
</x-app-layout>