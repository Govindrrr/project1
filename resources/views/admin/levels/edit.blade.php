<x-app-layout>
    <div>
        <class="container">
          <div>
            <h2>Edit Levels</h2>
          </div>
          <br>

          <form action="{{route('levels.update',$level->id)}}" method="post">
            @csrf
            @method('PUT')
             
              <div class="form-row">
                  
                  <div class="form-group col-md-3 mr-3">
                      <label for="level">Level:</label>
                      <input type="text" id="level" class="form-control" name="level" value="{{$level->level}}">
                      @error('level')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  <div class="form-group col-md-3 mr-3">
                      <label for="subject">Subject:</label>
                      
                      <select name="subject[]" id="subject" class="form-control select2" multiple>
                       @foreach ($subjects as $subject)
                           
                       <option value="{{$subject->id}}">{{$subject->name}}</option>
                       @endforeach
                            
                      
                      </select>
                        @error('subject')
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