<x-app-layout>
    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                  <a href="" class="text-decoration-none pr-3"><i data-feather="arrow-left-circle"></i><h6>Back</h6></a>
                    <h4>
                        Teacher tables
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>phone</th>
                                <th>adress</th>
                                <th>subjects</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($users as $index => $user)
                                <tr>
                                    <td>{{ ++$index }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td>{{ $user->subjects->pluck('name')->implode(' ,') }}</td>

                                    <td class="d-flex gap-1">
                                        <div class="p-2">

                                            <a href="{{route('users.edit',$user->id)}}" class="btn btn-primary">Detail</a>
                                        </div>
                                        <div class="p-2">

                                            <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                              @csrf
                                              @method('DELETE')
                                                <button class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                          
                            @endforeach


                        </table>

                        <a href="{{ route('users.create') }}">Create</a>
                    </div>
                </div>
</x-app-layout>
