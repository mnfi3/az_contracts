@extends('layouts.app')
@section('content')
    <section id="memorandums">
        <div class="d-flex justify-content-between">
            <h4 class="my-3">{{$memorandum->title}}</h4>
            <div>
                <i class="fal fa-file-edit header-icon"></i>
                <i class="fal fa-handshake header-icon"></i>
            </div>

        </div>
        <div class="container-fluid bg-four mt-3 p-3 border-round">
            <h5 class="mt-1 mb-3">ویرایش تفاهم نامه</h5>
            <div class="row">
                <div class="col-md-6">

                    <form action="{{route('edit-memorandum')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="fullName">موضوع</label>
                            <div class="col-md-6">
                                <input type="text" id="fullName" required="" value="{{$memorandum->title}}"
                                       class="form-control" name="title">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label " for="date">تاریخ ارائه </label>
                            <div class="col-md-6">
                                <input type="text" id="date" required=""  value="{{$memorandum->date}}"
                                       class="form-control j-date"
                                       name="date">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2 col-form-label  " for="documents">سند</label>
                            <div class="col-md-6">
                                <div id="fileInputsContainer" class="d-flex flex-column">
                                    <div class="d-flex">
                                        <input type="file" id="documents"
                                               class="form-control-file" name="documents[]">
                                        <button class="btn btn-sm btn-light" onclick="addDocumentInput()">سند جدید</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="id" value="{{$memorandum->id}}">

                        <div class="row">
                            <div class="col-md-2 ">
                                <button class="my-2 btn  btn-app" type="submit">
                                    <i class="fal fa-edit mr-1"></i>
                                    ویرایش
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="d-flex flex-column">

                        @foreach($memorandum->documents as $document)
                            <div class="d-flex mt-2 justify-content-between">
                                <span class="mr-4">{{$document->name}}</span>
                                <div class="d-flex">
                                    <a href="{{\Illuminate\Support\Facades\Request::root() . '/' . $document->path}}" download class="btn btn-light btn-sm mr-1">بارگیری <i class="fal fa-download"></i></a>
                                    <form class="form-inline" action="{{route('remove-document')}}" method="post"
                                          onsubmit="return confirm('آیا از حذف این سند مطمئن هستید؟')">
                                        @csrf
                                        <input type="hidden" name="document_id" value="{{$document->id}}">
                                        <button type="submit" class="btn btn-sm btn-app">حذف
                                        </button>
                                    </form>

                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>

        </div>
    </section>

    <section id="allMemorandums">
        <h4 class="my-3"> تفاهم نامه نمونه</h4>
        <div class="container-fluid mt- mb-5 p-3 bg-white border-round">
            <div class="d-flex justify-content-between align-content-center">
                <h5>محتوای نامه نمونه</h5>
                <form action="{{route('remove-memorandum')}}" method="post" class="form-inline my-1" onsubmit="return confirm('آیا از حذف این تفاهم نامه مطمئن هستید؟')">
                    @csrf
                    <input type="hidden" name="id" value="{{$memorandum->id}}">
                    <button type="submit" class="btn btn-app ml-auto">
                        <i class="fal fa-times"></i>
                        حذف تفاهم نامه
                    </button>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered ">
                    <thead class="text-center   ">
                    <tr>
                        <th>موضوع</th>
                        <th>تاریخ ارائه</th>
                    </tr>
                    </thead>
                    <tbody class=" text-center">
                    @php($date = new \App\Http\Controllers\PersianDate())
                    <tr>
                        <td>{{$memorandum->title}}</td>
                        <td>{{$date->toPersiandate($memorandum->date, 'Y/m/d')}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection