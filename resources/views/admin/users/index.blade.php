@extends('admin.master')
@section('content')
    <div class="row">

        <!-- /.col-md-6 -->
        <div class="col">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title" style="font-size: x-large">{{ __("messages.users") }}</h3>
                </div>
                <div class="card-body">
                    {{--                    @include("admin.types.create")--}}
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __("messages.name") }}</th>
                                <th>{{ __("messages.email") }}</th>
                                <th>{{ __("messages.role") }}</th>
                                <th>{{ __("messages.action") }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $item)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->role}}</td>
                                    <td class="d-flex">
                                        @if($item->status == 1)
                                            <a href="{{ route('admin.users.update', $item->id) }}" class="btn btn-success">
                                                {{ __("messages.active") }}
                                            </a>
{{--                                            <p class="btn btn-success">{{ __("messages.active") }}</p>--}}
                                        @else
                                            <a href="{{ route('admin.users.update', $item->id) }}" class="btn btn-danger">
                                                {{ __("messages.inactive") }}
                                            </a>
{{--                                            <p class="btn btn-danger">{{ __("messages.inactive") }}</p>--}}
                                        @endif
                                        {{--                                        <button type="button" onclick="edit({{$item->id}})" class="btn btn-warning"--}}
                                        {{--                                                data-toggle="modal" data-target="#modal-edit">--}}
                                        {{--                                            <i class="fa fa-pen"></i>--}}
                                        {{--                                        </button>--}}


                                        {{--                                        <form action="{{route('types.destroy', $item->id)}}" method="post">--}}
                                        {{--                                            @method('DELETE')--}}
                                        {{--                                            @csrf--}}
                                        {{--                                            <button type="submit" class="btn btn-danger show_confirm"><i--}}
                                        {{--                                                    class="fa fa-trash"></i></button>--}}
                                        {{--                                        </form>--}}

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{--                @include("admin.types.edit")--}}
            </div>

        </div>
        <!-- /.col-md-6 -->
    </div>
@endsection
@section('custom-scripts')
    <script>

        @if ($message = Session::get('success'))
        toastr.success("{{$message}}");
        @endif

        @if ($message = Session::get('error'))
        toastr.error("{{$message}}");
        @endif

    </script>
@endsection
