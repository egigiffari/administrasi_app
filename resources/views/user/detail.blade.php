@extends('frontend.home')
@section('title', 'Detail User')
@section('title-content', 'Detail User')
@section('content')

    <div class="col-sm-12 col-md-12 col-xl-12">
        <a href="{{ route('user.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
    </div>

    <div class="x_panel">
        <div class="x_title">
            <h2>Information <strong>{{$user->name}}</strong></h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">

                <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                    <div class="profile_img">
                        <div id="crop-avatar">
                            <!-- Current avatar -->
                            <img title="Change the avatar" class="img-responsive avatar-view" alt="Avatar" style="max-width:200px;" src="{{asset($user->image)}}">
                        </div>
                    </div>
                    <h3>{{ $user->name }}</h3>

                    <ul class="list-unstyled user_data">
                    <li><i class="fa fa-map-marker user-profile-icon"></i> {{$user->address}}
                    </li>

                    <li>
                        <i class="fa fa-briefcase user-profile-icon"></i>
                        @foreach($user->positions as $position)
                            {{$position->name}},
                        @endforeach
                    </li>

                    <li class="m-top-xs">
                        <i class="fa fa-phone user-profile-icon"></i> {{$user->phone}}
                    </li>
                    <li class="m-top-xs">
                        <i class="fa fa-envelope user-profile-icon"></i> {{$user->email}}
                    </li>
                    </ul>

                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                    <br>
                    <br style="margin-bottom:20px;">

                    <div class="profile_img">
                        <div id="crop-avatar">
                            <!-- Current avatar -->
                            <img title="Change the avatar" class="img-responsive avatar-view" alt="Avatar" style="max-width:200px;" src="{{asset($user->signature)}}">
                        </div>
                    </div>

                </div>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="profile_title">
                        <div class="col-md-6"><h2>User Activity Report</h2></div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="table-overflow">
                        <table class="table table-striped">
                            <thead>
                                <th>Date</th>
                                <th>Code</th>
                                <th style="width:20%">Category</th>
                                <th>Perihal</th>
                                <th>Jumlah</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach($requests as $request)
                                <tr>
                                    <td>{{ $request->updated_at->diffForHumans() }}</td>
                                    <td>{{ $request->code }}</td>
                                    <td>{{ $request->categories->name }}</td>
                                    <td>{{ $request->perihal }}</td>
                                    <td>{{ 'Rp ' . number_format($request->total) }}</td>
                                    <td><a href="{{ route('request.pengajuan.show', $request->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$requests->links()}}
                </div>

            </div>
        </div>
    </div>

@endsection