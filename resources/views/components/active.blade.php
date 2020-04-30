@foreach ($users as $user)
                            <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->role->name}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Action
                                        </button>
                                        <div class="dropdown-menu">
                                          {{-- <a class="dropdown-item" href="#">Action</a> --}}

                                          @if (empty($user->blocked_at))

                                            <a onclick="event.preventDefault();
                                            if(confirm('Are you sure!')){
                                            document.getElementById('block-form-{{$user->id}}')
                                            .submit()}" class="dropdown-item">Block</a>

                                            @else
                                            <a onclick="event.preventDefault();
                                            if(confirm('Are you sure!')){
                                            document.getElementById('block-form-{{$user->id}}')
                                            .submit()}" class="dropdown-item">Active</a>
                                            @endif
                                          <form id="block-form-{{$user->id}}" method="post" action="{{route('block.update',$user->id)}}" style="dislplay:none">
                                            @csrf
                                            @method('put')

                                          </form>

                                          {{-- <div class="dropdown-divider"></div> --}}
                                          {{-- <a class="dropdown-item" href="#">Separated link</a> --}}
                                        </div>
                                      </div>
                                </td>
                            </tr>

                            @endforeach
