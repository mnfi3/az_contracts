@extends('layouts.app')
@section('content')
    <section id="inputProposal">

        <div class="d-flex justify-content-between">
            <h4 class="my-3">عنوان فرصت مطالعاتی</h4>
            <div>
                <i class="fal fa-file-edit header-icon"></i>
                <i class="fal fa-sticky-note header-icon"></i>
            </div>

        </div>
        <div class="container-fluid bg-four mt-3 p-3 border-round">
            <h5 class="mt-1 mb-3"></h5>
            <div class="row">
                <div class="col-md-8">

                    <form action="{{route('opportunity-edit')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="fullName">مجری</label>
                            <div class="col-md-4">
                                <input type="text" id="fullName" required="" value="{{$opportunity->executer}}"
                                       class="form-control" name="executer">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label " for="date">تاریخ شروع </label>
                            <div class="col-md-4">
                                <input type="text" id="date" required="" value="{{$opportunity->start_date}}"
                                       class="form-control j-date"
                                       name="start_date">
                            </div>
                            <label class="col-md-2 col-form-label " for="date">تاریخ پایان </label>
                            <div class="col-md-4">
                                <input type="text" id="date" required="" value="{{$opportunity->finish_date}}"
                                       class="form-control j-date"
                                       name="finish_date">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 text-right  col-form-label  " for="goalSystem">شرکت صنعتی طرف قرارداد</label>
                            <div class="col-md-4">
                                <input type="text" id="goalSystem" required="" value="{{$opportunity->company}}"
                                       class="form-control start-day pwt-datepicker-input-element" name="company">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2 col-form-label" for="documents">سند</label>
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

                        <input type="hidden" name="id" value="{{$opportunity->id}}">

                        <div class="row">
                            <div class="col-md-2 ">
                                <button class="my-2 btn  btn-app" type="submit">
                                    <i class="fal fa-edit mr-1"></i>
                                    ویرایش فرصت مطالعاتی
                                </button>
                            </div>
                        </div>


                    </form>
                </div>
                <div class="col-md-4">
                    <div class="d-flex flex-column">

                        @foreach($opportunity->documents as $document)
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
    <section id="allProposal">
        <div class="container-fluid mt- mb-5 p-3 bg-white border-round">
            <div class="d-flex mb-2">
                <h5 class="py-2 ">محتوای فرصت مطالعاتی :</h5>
                <form class="form-inline ml-auto" action="{{route('opportunity-remove')}}" method="POST"
                      onsubmit="return confirm('آیا از حذف فرصت مطالعاتی مطمئن هستید؟')">
                    @csrf
                    <input type="hidden" name="id" value="{{$opportunity->id}}">
                    <button type="submit" class="btn btn-app ml-auto">
                        <i class="fal fa-times"></i>
                        حذف فرصت مطالعاتی
                    </button>
                </form>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-bordered ">
                    <thead class="text-center   ">
                    <tr>
                        <th class="text-center">ردیف</th>
                        <th class="text-center">مجری</th>
                        <th class="text-center">تاریخ شروع</th>
                        <th class="text-center">تاریخ پایان</th>
                        <th class="text-center">شرکت صنعتی طرف قرارداد</th>
                    </tr>
                    </thead>
                    <tbody class=" text-center">
                    @php($date = new \App\Http\Controllers\PersianDate())
                    <tr>
                        <th scope="row" class="text-center">1</th>
                        <td>{{$opportunity->executer}}</td>
                        <td>{{$date->toPersiandate($opportunity->start_date, 'Y/m/d')}}</td>
                        <td>{{$date->toPersiandate($opportunity->finish_date , 'Y/m/d')}}</td>
                        <td>{{$opportunity->company}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection