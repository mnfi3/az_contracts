@extends('layouts.app')
@section('content')
    <section id="inputVisit">

        <div class="d-flex justify-content-between">
            <h4 class="my-3">بازدید از {{$visit->place}}</h4>
            <div>
                <i class="fal fa-file-edit header-icon"></i>
                <i class="fal fa-eye header-icon"></i>
            </div>

        </div>
        <div class="container-fluid bg-four mt-3 p-3 border-round">
            <h5 class="mt-1 mb-3"></h5>
            <div class="row">
                <div class="col-md-8">
                    <form action="{{route('edit-visit')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input name="id" value="{{$visit->id}}" type="hidden">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label " for="date">زمان بازدید</label>
                            <div class="col-md-4">
                                <input type="text" id="date" required=""
                                       class="form-control j-date"
                                       name="date" value="{{$visit->date}}">
                            </div>
                            <label class="col-md-2 text-right  col-form-label  " for="field">مکان بازدید</label>
                            <div class="col-md-4">
                                <input type="text" id="field" required=""
                                       class="form-control" name="place" value="{{$visit->place}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="fullName">رئیس مرکز صنعتی و سازمان مربوطه</label>
                            <div class="col-md-4">
                                <input type="text" id="fullName" required=""
                                       class="form-control" name="organization_boss" value="{{$visit->organization_boss}}">
                            </div>
                            <label class="col-md-2 text-right  col-form-label  " for="tells">شماره تلفن های تماس سازمان با مرکز صنعتی</label>
                            <div class="col-md-4">
                                <input type="text" id="tells" required=""
                                       class="form-control" name="phones" value="{{$visit->phones}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="visitors">اعضای بازدید کننده</label>
                            <div class="col-md-4">
                        <textarea type="text" id="visitors" required=""
                            class="form-control" rows="2" name="members">{{$visit->members}}</textarea>
                            </div>
                            <label class="col-md-2 col-form-label text-right  " for="images">تصاویر</label>
                            <div class="col-md-4">
                                <div id="imageInputsContainer" class="d-flex flex-column">
                                    <div class="d-flex">
                                        <input type="file" id="images"
                                               class="form-control-file" name="images[]" accept="image/*">
                                        <button class="btn btn-sm btn-light" onclick="addImageInput()">تصویر جدید</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-2 col-form-label  " for="documents">مکاتبات و نتیجه متغیر</label>
                            <div class="col-md-4">
                                <div id="fileInputsContainer" class="d-flex flex-column">
                                    <div class="d-flex">
                                        <input type="file" id="documents"
                                               class="form-control-file" name="documents[]">
                                        <button class="btn btn-sm btn-light" onclick="addDocumentInput()">سند جدید</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2 ">
                                <button class="my-2 btn  btn-app" type="submit">
                                    <i class="fal fa-plus mr-1"></i>
                                    ویرایش بازدید
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="col-md-4">
                    <div class="d-flex flex-column">

                        @foreach($visit->documents as $document)
                        <div class="d-flex mt-2 justify-content-between">
                            <span class="mr-4">{{$document->name}}</span>
                            <div class="d-flex">
                                <a  href="{{\Illuminate\Support\Facades\Request::root() . '/' . $document->path}}" download class="btn btn-light btn-sm mr-1">بارگیری <i class="fal fa-download"></i></a>
                                <form class="form-inline" action="{{route('remove-document')}}" method="post"
                                      onsubmit="return confirm('آیا از حذف این سند مطمئن هستید؟')">
                                    @csrf
                                    <input name="document_id" value="{{$document->id}}" type="hidden">
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

    <section id="visitImages">
        {{--<div class="d-flex justify-content-between">--}}
            {{--<h4 class="mt-4">تصاویر بازدید نمونه</h4>--}}
        {{--</div>--}}
        <div class="container-fluid bg-four mt-3 p-3 border-round">
            <h5 class="mt-1 mb-3">مشاهده و حذف تصاویر</h5>
            <div class="row">

                @foreach($visit->photos as $photo)
                <div class="col-md-3 mb-3">
                    <form class="form-inline mt-0 mb-1" action="{{route('remove-photo')}}" method="post"
                          onsubmit="return confirm('آیا از حذف این تصویر مطمئن هستید؟')">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-app">حذف
                        </button>
                        <input name="photo_id" value="{{$photo->id}}" type="hidden">
                    </form>
                    <a> {{--link to image--}}
                        <img class="visit-img" src="{{asset($photo->path)}}" alt="">
                    </a>
                </div>
                @endforeach



            </div>

        </div>
    </section>

    <section id="allVisit">
        {{--<h4 class="my-3">بازدید نمونه</h4>--}}
        <div class="container-fluid mt- mb-5 p-3 bg-white border-round">
            <div class="d-flex mb-2">
                <h5 class="py-2 ">محتوای بازدید :</h5>
                <form class="form-inline ml-auto" action="{{route('remove-visit')}}" method="POST"
                      onsubmit="return confirm('آیا از حذف بازدید مطمئن هستید؟')">
                    @csrf
                    <input type="hidden" name="id" value="{{$visit->id}}">
                    <button type="submit" class="btn btn-app ml-auto">
                        <i class="fal fa-times"></i>
                        حذف بازدید
                    </button>
                </form>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-bordered ">
                    <thead class="text-center   ">
                    <tr>
                        <th class="text-center">ردیف</th>
                        <th class="text-center">زمان بازدید</th>
                        <th class="text-center">مکان بازدید</th>
                        <th class="text-center">رئیس مرکز صنعتی و سازمان مربوطه</th>
                        <th class="text-center">شماره تلفن های تماس سازمان با مرکز صنعتی</th>
                        <th class="text-center">اعضای بازدید کننده</th>
                    </tr>
                    </thead>
                    <tbody class=" text-center">

                    @php($date = new \App\Http\Controllers\PersianDate())
                    <tr>
                        <th scope="row">1</th>
                        <td>{{$date->toPersiandate($visit->date, 'Y/m/d')}}</td>
                        <td>{{$visit->place}}</td>
                        <td>{{$visit->organization_boss}}</td>
                        <td>{{$visit->phones}}</td>
                        <td>{{$visit->members}}</td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection