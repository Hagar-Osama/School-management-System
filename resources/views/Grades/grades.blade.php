@extends('layouts.master')
@section('title')
{{trans('grades.Grades')}}
@endsection
@section('css')
@toastr_css
@endsection

@section('title')
Grades
@stop
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('grades.Grades')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}" class="default-color">{{trans('grades.Home')}}</a></li>
                <li class="breadcrumb-item active">{{trans('grades.Grades List')}}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                    {{ trans('Grades.Add Grade') }}
                </button>
                <br><br>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{trans('grades.Grade Name')}}</th>
                                <th>{{trans('grades.Notes')}}</th>
                                <th>{{trans('grades.Actions')}}</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter = 1; ?>
                            @isset($grades)
                            @foreach($grades as $grade)
                            <tr>
                                <td>{{$counter++}}</td>
                                <td>{{$grade->name}}</td>
                                <td>{{$grade->notes}}</td>
                                <td> <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{ $grade->id }}" title="{{ trans('grades.Edit Grade') }}"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $grade->id }}" title="{{ trans('grades.Delete Grade') }}"><i class="fa fa-trash"></i></button>
                                </td>

                            </tr>
                            <!-- edit_modal_Grade -->
                            <div class="modal fade" id="edit{{ $grade->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                                {{ trans('grades.Edit Grade') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- add_form -->
                                            <form action="{{route('grades.update')}}" method="post">
                                                @method('PUT')
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="Name" class="mr-sm-2">{{ trans('grades.Grade Name_ar') }}
                                                            :</label>
                                                        <input id="Name" type="text" name="name" class="form-control" value="{{$grade->getTranslation('name', 'ar')}}" required>
                                                        <input id="id" type="hidden" name="grade_id" class="form-control" value="{{ $grade->id }}">
                                                    </div>
                                                    <div class="col">
                                                        <label for="Name_en" class="mr-sm-2">{{ trans('grades.Grade Name_en') }}
                                                            :</label>
                                                        <input type="text" class="form-control" value="{{$grade->getTranslation('name', 'en')}}" name="name_en">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">{{ trans('Grades.Notes') }}
                                                        :</label>
                                                    <textarea class="form-control" name="notes" id="exampleFormControlTextarea1" rows="3">{{ $grade->notes }}</textarea>
                                                </div>
                                                <br><br>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('grades.Close') }}</button>
                                                    <button type="submit" class="btn btn-success">{{ trans('grades.Submit') }}</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- delete_modal_Grade -->
                            <div class="modal fade" id="delete{{ $grade->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                                {{ trans('Grades.Delete Grade') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('grades.destroy')}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                {{ trans('grades.Delete Warning') }}
                                                @if(App::getLocale() == 'ar')
                                                <div class="col">
                                                    <input id="Name" type="text" name="name" class="form-control" value="{{$grade->getTranslation('name', 'ar')}}" required>
                                                </div>
                                                @else
                                                <div class="col">
                                                    <input type="text" class="form-control" value="{{$grade->getTranslation('name', 'en')}}" name="name_en">
                                                </div>
                                                @endif
                                                <input id="id" type="hidden" name="grade_id" class="form-control" value="{{ $grade->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('Grades.Close') }}</button>
                                                    <button type="submit" class="btn btn-danger">{{ trans('Grades.Submit') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endisset
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>{{trans('grades.Grade Name')}}</th>
                                <th>{{trans('grades.Notes')}}</th>
                                <th>{{trans('grades.Actions')}}</th>

                            </tr>
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- add_modal_Grade -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ trans('Grades.Add Grade') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- add_form -->
                    <form action="{{ route('grades.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="Name" class="mr-sm-2">{{ trans('Grades.Grade Name_ar') }}
                                    :</label>
                                <input id="Name" type="text" name="name" class="form-control">
                            </div>
                            <div class="col">
                                <label for="Name_en" class="mr-sm-2">{{ trans('Grades.Grade Name_en') }}
                                    :</label>
                                <input type="text" class="form-control" name="name_en" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">{{ trans('Grades.Notes') }}
                                :</label>
                            <textarea class="form-control" name="notes" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <br><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('Grades.Close') }}</button>
                    <button type="submit" class="btn btn-success">{{ trans('Grades.Submit') }}</button>
                </div>
                </form>

            </div>
        </div>
    </div>


</div>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection