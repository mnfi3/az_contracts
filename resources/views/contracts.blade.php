@extends('layouts.app')
@section('content')
    <section id="inputProposal">
        <div class="d-flex justify-content-between">
            <h4 class="my-3">قرارداد ها</h4>
            <i class="fal fa-file-contract header-icon"></i>
        </div>
        <div class="container-fluid bg-four mt-3 p-3 border-round">
            <h5 class="mt-1 mb-3">قرارداد جدید</h5>

            <form action="{{route('add-contract')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="title">عنوان طرح</label>
                    <div class="col-md-3">
                        <input type="text" id="title" required=""
                               class="form-control" name="name">
                    </div>
                    <label class="col-md-2 text-right  col-form-label  " for="titleType">نوع طرح</label>
                    <div class="col-md-3">
                        <input type="text" id="titleType" required=""
                               class="form-control" name="type">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="outsideNumber">شماره قرارداد بیرونی</label>
                    <div class="col-md-3">
                        <input type="text" id="insideNumber" required=""
                               class="form-control" name="ext_no">
                    </div>
                    <label class="col-md-2 text-right col-form-label" for="insideNumber">شماره قرارداد داخلی</label>
                    <div class="col-md-3">
                        <input type="text" id="insideNumber" required=""
                               class="form-control" name="int_no">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="employer">کارفرما</label>
                    <div class="col-md-3">
                        <input type="text" id="employer" required=""
                               class="form-control" name="employer">
                    </div>
                    <label class="col-md-2 text-right  col-form-label" for="projectExecutives">مجریان طرح</label>
                    <div class="col-md-3">
                        <input type="text" id="projectExecutives" required=""
                               class="form-control" name="executer">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="college">دانشکده مربوطه</label>
                    <div class="col-md-3">
                        <input type="text" id="college" required=""
                               class="form-control" name="department">
                    </div>
                    <label class="col-md-2 text-right  col-form-label" for="field">گروه مربوطه</label>
                    <div class="col-md-3">
                        <input type="text" id="field" required=""
                               class="form-control" name="group_name">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label " for="startDay">زمان شروع</label>
                    <div class="col-md-3">
                        <input type="text" id="startDay" required=""
                               class="form-control j-date"
                               name="start_date">
                    </div>

                    <label class="col-md-2 text-right col-form-label " for="finishDay">زمان خاتمه قرارداد</label>
                    <div class="col-md-3">
                        <input type="text" id="finishDay" required=""
                               class="form-control j-date"
                               name="finish_date">
                    </div>

                </div>
                <div class="form-group row">
                    <label class="col-md-2  col-form-label " for="term">مدت قرارداد</label>
                    <div class="col-md-3">
                        <input type="text" id="term" required=""
                               class="form-control"
                               name="duration">
                    </div>

                    <label class="col-md-2 text-right  col-form-label " for="type">مشارکتی یا انفرادی</label>
                    <div class="col-md-3">
                        <input type="text" id="type" required=""
                               class="form-control"
                               name="participation">
                    </div>

                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="amount">مبلغ طرح(ریال) </label>
                    <div class="col-md-3">
                        <input type="number" id="amount" required=""
                               class="form-control" name="cost">
                    </div>

                    <label class="col-md-2 text-right  col-form-label " for="status">وضعیت طرح</label>
                    <div class="col-md-3">
                        <input type="text" id="status" required=""
                               class="form-control"
                               name="status">
                    </div>


                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="colleges">همکاران طرح </label>
                    <div class="col-md-3">
                        <input type="text" id="colleges" required=""
                               class="form-control" name="partners">
                    </div>

                    <label class="col-md-2 text-right  col-form-label " for="status">پرداخت اول(ریال) </label>
                    <div class="col-md-3">
                        <input type="number" id="colleges"
                               class="form-control" name="pay1">
                    </div>

                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="colleges">پرداخت دوم(ریال) </label>
                    <div class="col-md-3">
                        <input type="number" id="colleges"
                               class="form-control" name="pay2">
                    </div>

                    <label class="col-md-2 text-right  col-form-label " for="status">پرداخت سوم(ریال) </label>
                    <div class="col-md-3">
                        <input type="number" id="colleges"
                               class="form-control" name="pay3">
                    </div>

                </div>


                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="colleges">پرداخت نهایی(ریال) </label>
                    <div class="col-md-3">
                        <input type="number" id="colleges"
                               class="form-control" name="pay_final">
                    </div>

                </div>

                <div class="row">
                    <label class="col-md-2 col-form-label  " for="documents">اسناد</label>
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
                            ثبت قرارداد
                        </button>
                    </div>
                </div>


            </form>
        </div>
    </section>
    <section id="allProposal">
        <h4 class="my-3">همه قرارداد ها</h4>
        <div class="container-fluid mt- mb-5 p-3 bg-white border-round">
            <div class="d-flex">
                <button  class="btn btn-app ml-auto" onclick="excelReport(this)">
                    <i class="fal fa-file-excel"></i>
                    دریافت خروجی
                </button>
            </div>
            <h5 class="py-2 ">قرارداد ها :</h5>
            <div class="table-responsive">
                <table id="قرارداد ها" class="table table-striped table-bordered ">
                    <thead class="text-center   ">
                    <tr>
                        <th>ردیف</th>
                        <th>عنوان طرح</th>
                        <th>شماره قرارداد بیرونی</th>
                        <th>شماره قرارداد داخلی</th>
                        <th>نوع طرح</th>
                        <th> کارفرما</th>
                        <th>مجریان طرح</th>
                        <th>همکاران طرح</th>
                        <th>دانشکده مربوطه</th>
                        <th>گروه مربوطه</th>
                        <th>زمان شروع</th>
                        <th>مدت قراداد</th>
                        <th>تاریخ خاتمه قرارداد</th>
                        <th>مشارکتی/انفرادی</th>
                        <th>مبلغ طرح</th>
                        <th>وضعیت</th>
                        <th>پرداخت اول</th>
                        <th>پرداخت دوم</th>
                        <th>پرداخت سوم</th>
                        <th>پرداخت نهایی</th>
                        <th>مشاهده</th>
                    </tr>
                    </thead>
                    <tbody class=" text-center">

                    {{--          @php($i=0)--}}
                    {{--          @php($date = new \App\Http\Controllers\PersianDate())--}}
                    <?php
                    $i=0;
                    $date = new \App\Http\Controllers\PersianDate();
                    $originaldate = date("Y-m-d");
                    $converted = DateTime::createFromFormat("Y-m-d", $originaldate);
                    $converted1months = $converted->add(new DateInterval("P1M"));//1 month later
                    ?>
                    @foreach($contracts as $contract)

                        <tr class="

                            @if(strlen($contract->finish_date) > 2 && $originaldate > $contract->finish_date) status-finished
                            @elseif(strlen($contract->finish_date) > 2 && $converted1months > $contract->finish_date) status-is-finishing
                            @endif

                                ">


                            <th scope="row">{{++$i}}</th>
                            <td><a class="
                            @if(strlen($contract->finish_date) > 2 && $originaldate > $contract->finish_date) text-dark
                            @endif
                                        " href="{{route('contract', $contract->id)}}">{{$contract->name}}</a></td>
                            <td>{{$contract->ext_no}}</td>
                            <td>{{$contract->int_no}}</td>
                            <td>{{$contract->type}}</td>
                            <td>{{$contract->employer}}</td>
                            <td>{{$contract->executer}}</td>
                            <td>{{$contract->partners}}</td>
                            <td>{{$contract->department}}</td>
                            <td>{{$contract->group_name}}</td>
                            <td>{{$date->toPersiandate($contract->start_date,'Y/m/d')}}</td>
                            <td>{{$contract->duration}}</td>
                            <td>{{$date->toPersiandate($contract->finish_date,'Y/m/d')}}</td>
                            <td>{{$contract->participation}}</td>
                            <td>{{number_format($contract->cost)}} ریال </td>
                            <td>{{$contract->status}}</td>
                            <td>{{$contract->pay1}}</td>
                            <td>{{$contract->pay2}}</td>
                            <td>{{$contract->pay3}}</td>
                            <td>{{$contract->pay_final}}</td>
                            <td>
                                <a href="{{route('contract', $contract->id)}}" class="btn btn-light">مشاهده</a>
                            </td>

                        </tr>
                    @endforeach



                    </tbody>

                </table>
            </div>
        </div>
    </section>
@endsection