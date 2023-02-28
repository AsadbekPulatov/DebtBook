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
                                            <a href="{{ route('admin.users.update', $item->id) }}"
                                               class="btn btn-success">
                                                {{ __("messages.active") }}
                                            </a>
                                        @else
                                            <a href="{{ route('admin.users.update', $item->id) }}"
                                               class="btn btn-danger">
                                                {{ __("messages.inactive") }}
                                            </a>
                                        @endif
                                        <a href="{{ route('admin.users.delete', $item->id) }}" class="btn btn-danger ml-3">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
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
