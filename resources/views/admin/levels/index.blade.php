<x-app-layout>
    <div>
        <div class="container">
          <div>
            <h2>Levels</h2>
          </div>
          <br>

            <form action="{{route('levels.store')}}" method="post">
              @csrf
               
                <div class="form-row">
                    
                    <div class="form-group col-md-3 mr-3">
                        <label for="level">Level:</label>
                        <input type="text" id="level" class="form-control" name="level">
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

                <button type="submit" class="btn btn-success">Add</button>
                
            </form>
            <br>

            <div class="card">
              <div class="card-header">
                <h4>levels</h4>
              </div>
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">SN</th>
                      <th scope="col">class</th>
                      <th scope="col">Subjects</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($levels as $index => $level)
                        
                  
                    <tr>
                      <th scope="row">{{ ++$index }}</th>
                      <td>{{$level->level}}</td>
                      <td>{{$level->subjects->pluck('name')->implode(" ,")}}</td>
                      {{-- <td>{{$subject->Faculties->pluck('name')->implode(" ,")}}</td> --}}
                      <td class="d-flex">
                        <div>
                          <a href="{{route('levels.edit',$level->id)}}"><button class="btn btn-primary">Edit</button></a>

                        </div>
                        <div>
                          <form action="{{route('levels.destroy',$level->id)}}" method="post">
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