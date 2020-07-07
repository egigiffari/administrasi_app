
@extends('frontend.home')
@section('title', 'Penanggungjawab Pengajuan')
@section('title-content', 'Penanggungjawab Pengajuan')
@section('content')

    @if(count($errors)>0)
        @foreach($errors->all() as $error)
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        </div>
        @endforeach
    @endif

    <div class="row" style="padding:10px;">
        <div class="x_panel">
            <div class="x_title">
                <h2>List Penanggung Jawab</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-overflow">
                    <table class="table table-striped">
                        <thead>
                            <th>No</th>
                            <th>Pengajuan</th>
                            <th>Penanggung Jawab</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($categories as $result => $category)
                            
                            <tr>
                                <td>{{ $result + $categories->firstitem() }}</td>
                                <td>{{ $category->name }}</td>
                                <td>

                                    @if(count($category->responsibles) != 0)
                                        @foreach($category->responsibles as $responsible)
                                            <h2><span class="btn btn-primary btn-xs">{{ $responsible->users->name }}</span></h2>
                                        @endforeach
                                    @else
                                        Not Have Responsible Please Insert
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('request.responsible.show', $category->id) }}" class="btn btn-primary"><i class="fa fa-folder"></i>  View</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $categories->links() }}
            </div>
        </div>
    </div>

@endsection