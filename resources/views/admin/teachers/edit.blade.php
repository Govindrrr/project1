<x-app-layout>
    <div class="card">
        <div class="card-header">
            <a href="{{route('users.index')}}" class="text-decoration-none pr-3"><i data-feather="arrow-left-circle"></i><h6>Back</h6></a>
            <h4>Edit Teacher detail</h4>
        </div>
        <div class="card-body">
            <form action="{{route('users.update',$user->id)}}" method="post">
                @csrf
                @method('PUT')
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="phone">Phone Number</label>
                    <input type="number" class="form-control" name="phone" id="phone" value="{{$user->phone}}">
                    @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}">
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" id="address" value="{{$user->address}}">
                    @error('address')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>

                <div class="form-group col-md-6">
                    <label>Subjects</label>
                    <select name="subject[]" class="form-control selectric rounded" multiple="">
                        @foreach ($user->subjects as $sub)
                            <option value="{{$sub->id}}" selected>{{$sub->name}}</option>
                        @endforeach
                        @foreach ($subjects as $subject)
                            
                        <option value="{{$subject->id}}">{{$subject->name}}</option>
                        @endforeach
                      
                    </select>
                    @error('subject')
                    <div class="text-danger">{{ $message }}</div>
                 @enderror
                </div>
                <div class="form-group col-md-6">
                    <label>Classes</label>
                    <select name="levels[]" class="form-control selectric rounded" multiple="">
                         @foreach ($user->levels as $level)
                            <option value="{{$level->id}}" selected>{{$level->level}}</option>
                        @endforeach
                        @foreach ($levels as $level)
                            <option value="{{ $level->id }}">{{ $level->level }}</option>
                        @endforeach

                    </select>
                    @error('levels')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</x-app-layout>
