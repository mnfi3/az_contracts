@extends('layouts.app')
@section('content')
    <section id="inputVisits">
        <div class="d-flex justify-content-between">
            <h4 class="my-3">بازدید از مراکز صنعتی و سازمان ها و صنایع یا جلسات برگزار شده</h4>
            <i class="fal fa-eye header-icon"></i>
        </div>
        <div class="container-fluid bg-four mt-3 p-3 border-round">
            <h5 class="mt-1 mb-3">بازدید جدید</h5>
            <form action="{{route('add-visit')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-md-2 col-form-label " for="date">زمان بازدید</label>
                    <div class="col-md-3">
                        <input type="text" id="date" required=""
                               class="form-control j-date"
                               name="date">
                    </div>
                    <label class="col-md-2 text-right  col-form-label  " for="field">مکان بازدید</label>
                    <div class="col-md-3">
                        <input type="text" id="field" required=""
                               class="form-control" name="place">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="fullName">رئیس مرکز صنعتی و سازمان مربوطه</label>
                    <div class="col-md-3">
                        <input type="text" id="fullName" required=""
                               class="form-control" name="organization_boss">
                    </div>
                    <label class="col-md-2 text-right  col-form-label  " for="tells">شماره تلفن های تماس سازمان با مرکز صنعتی</label>
                    <div class="col-md-3">
                        <input type="text" id="tells" required=""
                               class="form-control" name="phones">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="visitors">اعضای بازدید کننده</label>
                    <div class="col-md-3">
            <textarea type="text" id="visitors" required=""
                      class="form-control" rows="2" name="members"></textarea>
                    </div>
                    <label class="col-md-2 col-form-label text-right  " for="images">تصاویر</label>
                    <div class="col-md-3">
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
                    <label class="col-md-2 col-form-label  " for="documents">مکاتبات و نتیجه </label>
                    <div class="col-md-3">
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
                            ثبت بازدید
                        </button>
                    </div>
                </div>


            </form>
        </div>
    </section>

    <section id="allVisits">
        <h4 class="my-3">همه بازدید ها</h4>
        <div class="container-fluid mt- mb-5 p-3 bg-white border-round">
            <div class="d-flex">
                <button class="btn btn-app ml-auto" onclick="excelReport(this)">
                    <i class="fal fa-file-excel"></i>
                    دریافت خروجی
                </button>
            </div>
            <h5 class="py-2 ">بازدید ها :</h5>
            <div class="table-responsive">
                <table id="بازدید ها" class="table table-striped table-bordered ">
                    <thead class="text-center   ">
                    <tr>
                        <th class="text-center">ردیف</th>
                        <th class="text-center">زمان بازدید</th>
                        <th class="text-center">مکان بازدید</th>
                        <th class="text-center">رئیس مرکز صنعتی و سازمان مربوطه</th>
                        <th class="text-center">شماره تلفن های تماس سازمان با مرکز صنعتی</th>
                        <th class="text-center">اعضای بازدید کننده</th>
                        <th class="text-center">مشاهده</th>

                    </tr>
                    </thead>
                    <tbody class=" text-center">
                    @php($i = 0)
                    @php($date = new \App\Http\Controllers\PersianDate())
                    @foreach($visits as $visit)
                    <tr>
                        <th scope="row">{{++$i}}</th>
                        <td>{{$date->toPersiandate($visit->date,'Y/m/d')}}</td>
                        <td><a href="{{route('visit', $visit->id)}}">{{$visit->place}}</a></td>
                        <td>{{$visit->organization_boss}}</td>
                        <td>{{$visit->phones}}+</td>
                        <td>{{$visit->members}}</td>
                        <td>
                            <a href="{{route('visit', $visit->id)}}" class="btn btn-light">مشاهده</a>
                        </td>

                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection