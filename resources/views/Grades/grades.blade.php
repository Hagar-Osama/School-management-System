@extends('layouts.master')

@section('css')

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
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}" class="default-color">Home</a></li>
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
                                <td> <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{ $grade->id }}" title="{{ trans('Grades.Edit') }}"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $grade->id }}" title="{{ trans('Grades.Delete') }}"><i class="fa fa-trash"></i></button>
                                </td>

                            </tr>
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

@endsection