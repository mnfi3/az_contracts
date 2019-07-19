@extends('layouts.app')
@section('content')
    <section id="inputProposal">
        <div class="d-flex justify-content-between">
            <h4 class="my-3">فرصت مطالعاتی</h4>
            <i class="fal fa-sticky-note header-icon"></i>
        </div>
        <div class="container-fluid bg-four mt-3 p-3 border-round">
            <h5 class="mt-1 mb-3">فرصت مطالعاتی جدید</h5>
            <form action="{{route('opportunity-add')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="fullName">مجری</label>
                    <div class="col-md-3">
                        <input type="text" id="fullName" required=""
                               class="form-control" name="executer">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label " for="date">تاریخ شروع </label>
                    <div class="col-md-3">
                        <input type="text" id="date" required=""
                               class="form-control j-date"
                               name="start_date">
                    </div>
                    <label class="col-md-2 col-form-label " for="date">تاریخ پایان </label>
                    <div class="col-md-3">
                        <input type="text" id="date" required=""
                               class="form-control j-date"
                               name="finish_date">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="proposalTitle">شرکت صنعتی طرف قرارداد</label>
                    <div class="col-md-3">
                        <input type="text" id="proposalTitle" required=""
                               class="form-control" name="company">
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2 col-form-label  " for="documents">سند</label>
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
                            ثبت فرصت مطالعاتی
                        </button>
                    </div>
                </div>


            </form>
        </div>
    </section>
    <section id="allProposal">
        <h4 class="my-3">همه ثبت فرصت های مطالعاتی</h4>
        <div class="container-fluid mt- mb-5 p-3 bg-white border-round">
            <div class="d-flex">
                <button  class="btn btn-app ml-auto" onclick="excelReport(this)">
                    <i class="fal fa-file-excel"></i>
                    دریافت خروجی
                </button>
            </div>
            <h5 class="py-2 ">فرصت های مطالعاتی :</h5>
            <div class="table-responsive">
                <table id="پروپوزال ها" class="table table-striped table-bordered ">
                    <thead class="text-center   ">
                    <tr>
                        <th class="text-center">ردیف</th>
                        <th class="text-center">مجری</th>
                        <th class="text-center">تاریخ شروع</th>
                        <th class="text-center">تاریخ پایان</th>
                        <th class="text-center">شرکت صنعتی طرف قرارداد</th>
                        <th class="text-center">مشاهده</th>

                    </tr>
                    </thead>
                    <tbody class=" text-center">
                    @php($i=0)
                    @php($date = new \App\Http\Controllers\PersianDate())
                    @foreach($opportunities as $opportunity)
                        <tr>
                            <th scope="row" class="text-center">{{++$i}}</th>
                            <td>{{$opportunity->executer}}</td>
                            <td>{{$date->toPersiandate($opportunity->start_date, 'Y/m/d')}}</td>

                            <td>{{$date->toPersiandate($opportunity->finish_date, 'Y/m/d')}}</td>
                            <td>{{$opportunity->company}}</td>
                            <td>
                                {{--<a href="{{route('proposal', $proposal->id)}}" class="btn btn-light">مشاهده</a>--}}
                                <a href="{{route('opportunity', $opportunity->id)}}" class="btn btn-light">مشاهده</a>
                            </td>
                        </tr>
                     @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection