@extends('frontend.home')
@section('title', 'Details Penanggungjawab')
@section('title-content', 'Details Penanggungjawab')
@section('content')

    @if(count($errors)>0)
        @foreach($errors->all() as $error)
        <div class="col-md-12 col-sm-12 col-xl-12">
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        </div>
        @endforeach
    @endif

    <div class="col-sm-12 col-md-12 col-xl-12">
        <a href="{{ route('request.responsible.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
    </div>

    <div class="x_panel">
        <div class="x_title">
            <h2>Information <strong>{{$category->name}}</strong></h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-xl-6">
                    <form action="{{ route('request.responsible.store') }}" method="post" data-parsley-validate class="form-horizontal form-label-left">    
                        @csrf
                        <input type="hidden" name="category_id" value="{{ $category->id }}">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_id">User <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select name="user_id" id="user_id" class="form-control js-example-matcher-start">
                                  @foreach($users as $user)
                                  <option value="{{ $user->id }}">{{ $user->name }}</option>
                                  @endforeach
                              </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="as">Sebagai <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="selected" name="as" class="form-control">
                                    <option value="">Please Select Position</option>
                                    @foreach($positions as $position)
                                        <option value="{{ $position->name }}">{{ $position->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="subject">Status <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="subject" name="subject" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="priority">Prioritas <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="number" id="priority" name="priority" required="required" class="form-control col-md-7 col-xs-12">
                              <small class="text-danger">Value : (0 ~ 99), Semakin Besar Menjadi Prioritas</small>
                            </div>
                        </div>

                        <div class="form-group">
                                <button type="reset" class="btn btn-danger">Reset Penanggungjawab</button>
                                <button type="submit" class="btn btn-primary">Save Penanggungjawab</button>
                        </div>

                    </form>
                </div>
                <div class="col-sm-12 col-md-6 col-xl-6">
                    <div class="profile_title">
                        <div class="col-md-6"><h2>Information</h2></div>
                        <div class="clearfix"></div>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <th>Priority</th>
                            <th>Penanggungjawab</th>
                            <th>Sebagai</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($responsibles as $result => $responsible)
                            <tr>
                                <td>{{ $result + $responsibles->firstitem() }}</td>
                                <td>{{ $responsible->users->name }}</td>
                                <td>{{ $responsible->as }}</td>
                                <td>{{ $responsible->subject }}</td>
                                <td>
                                    <form action="{{ route('request.responsible.destroy', $responsible->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" onclick="return confirm('Are You Sure Delete This Item?');"><i class="fa fa-trash"></i>  Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    {{$responsibles->links()}}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('css')
        <link href="/frontend/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
@endsection

@section('js')
    <!-- Parsley -->
    <script src="/frontend/vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Select2 -->
    <script src="/frontend/vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="/frontend/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>

    <script>
        $(".js-example-matcher-start").select2({
            matcher: function(params, data) {
                // If there are no search terms, return all of the data
                if ($.trim(params.term) === '') { return data; }

                // Do not display the item if there is no 'text' property
                if (typeof data.text === 'undefined') { return null; }

                // `params.term` is the user's search term
                // `data.id` should be checked against
                // `data.text` should be checked against
                var q = params.term.toLowerCase();
                if (data.text.toLowerCase().indexOf(q) > -1 || data.id.toLowerCase().indexOf(q) > -1) {
                    return $.extend({}, data, true);
                }

                // Return `null` if the term should not be displayed
                return null;
            }
        });
  </script>

@endsection