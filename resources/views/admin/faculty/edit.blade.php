<x-app-layout>
    <div>
        <class="container">
          <div>
            <h2>Faculty Edit</h2>
          </div>
          <br>

            <form action="{{route('faculties.update',$faculty->id)}}" method="post">
              @csrf
              @method('PUT')
               
                <div class="form-row">
                    
                    <div class="form-group col-md-3 mr-3">
                        <label for="name">Faculty Name:</label>
                        <input type="text" id="name" class="form-control" name="name" value="{{$faculty->name}}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                   
                </div>

                <button type="submit" class="btn btn-success">Update</button>
                
            </form>
            <br>
        </div>
    </div>
   
</x-app-layout>