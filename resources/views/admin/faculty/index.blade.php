<x-app-layout>
    <div>
        <div class="container">
          <div>
            <h2>Faculty Section</h2>
          </div>
          <br>

            <form action="{{route('faculties.store')}}" method="post">
              @csrf
               
                <div class="form-row">
                    
                    <div class="form-group col-md-3 mr-3">
                        <label for="name">Faculty Name:</label>
                        <input type="text" id="name" class="form-control" name="name">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                   
                </div>

                <button type="submit" class="btn btn-success">Add New Faculty</button>
                
            </form>
            <br>

            <div class="card">
              <div class="card-header">
                <h4>Faculties</h4>
              </div>
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">SN</th>
                      <th scope="col">Name</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($faculties as $index => $faculty)
                        
                  
                    <tr>
                      <th scope="row">{{ ++$index }}</th>
                      <td>{{$faculty->name}}</td>
                      <td class="d-flex">
                        <div>
                          <a href="{{route('faculties.edit',$faculty->id)}}"><button class="btn btn-primary">Edit</button></a>

                        </div>
                        <div>
                          <form action="{{route('faculties.destroy',$faculty->id)}}" method="post">
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