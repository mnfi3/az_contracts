@extends('layouts.app')
@section('content')

    <section id="searching">
      <div class="d-flex justify-content-between">
        <h4 class="my-3">گزارش گیری</h4>
        <i class="fal fa-chart-bar header-icon"></i>
      </div>
      <div class="container-fluid bg-four mt-2 p-3 " style="border-radius: 1rem;">

        <h6 class="mb-3 ">( .توجه : حداقل باید یکی از موارد را پر کنید)</h6>
        <div class="row">
          <div class="col-md-8">

            <form action="{{route('report-result')}}" method="post">
                @csrf
              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="post-title">متن مورد نظر</label>
                <div class="col-md-4">
                  <input type="text" id="post-title"  placeholder="متن مورد نظر را وارد کنید"
                         class="form-control" name="text" @if(!is_null($text)) value="{{$text}}" @endif>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="post-title"> دسته بندی سند</label>
                <div class="col-md-4">
                  <select required="" class="form-control" name="category_id"
                          style="font-weight: bold; min-height: 40px">
                    <option value="1"@if($category_id == 1) selected @endif>همه اسناد</option>
                    <option value="2"@if($category_id == 2) selected @endif>قرارداد</option>
                    <option value="3"@if($category_id == 3) selected @endif>تفاهم نامه</option>
                    <option value="4"@if($category_id == 4) selected @endif>پروپوزال</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-2 col-form-label " for="duration"> از تاریخ :</label>
                <div class="col-md-4">
                  <input type="text" id="duration"
                         class="form-control j-date"
                         name="from_date" @if(!is_null($from_date)) value="{{$from_date}}" @endif>
                </div>
                <label class="col-md-2 col-form-label  " for="duration2"> تا تاریخ :</label>
                <div class="col-md-4">
                  <input type="text" id="duration2"
                         class="form-control j-date"
                         name="to_date" @if(!is_null($to_date)) value="{{$to_date}}" @endif>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label  " for="price"> از مبلغ :</label>
                <div class="col-sm-4">
                  <input type="number" id="price"  class="form-control" placeholder="به ریال"
                         name="from_price" @if(!is_null($from_price)) value="{{$from_price}}" @endif>
                </div>
                <label class="col-sm-2 col-form-label  " for="price2"> تا مبلغ :</label>
                <div class="col-sm-4">
                  <input type="number" id="price2"  placeholder="به ریال" class="form-control "
                         name="to_price" @if(!is_null($to_price)) value="{{$to_price}}" @endif>
                </div>
              </div>

              <div class="row">
                <div class="col-md-2 ">
                  <button style="min-width: 200px" class="py-1 my-2 btn btn-lg btn-app" type="submit"> جستجو
                  </button>
                </div>
              </div>
            </form>



          </div>
        </div>
      </div>

    </section>

    <!--RESULTS-->
    <section id="results">
      <div class="container-fluid mt-2 mb-5 p-3 bg-white border-round">
        <div class="d-flex  ">
            @if(count($contracts) > 0)
                <h5 class="pt-2"> نتیجه جستجو : {{count($contracts)}} مورد یافت شد </h5>
            @endif
          <button  class="btn btn-app ml-auto" onclick="excelReport(this)">
            <i class="fal fa-file-excel"></i>
            دریافت خروجی
          </button>
        </div>
        <h5 class=" py-2 ">قرارداد ها :</h5>
        <div class="table-responsive ">
          <table id="قرارداد ها-جستجو" class="table table-striped table-bordered ">

            <thead class="text-center   ">
            <tr>
              <th>ردیف</th>
              <th>عنوان طرح</th>
              <th>شماره قرارداد بیرونی</th>
              <th>شماره قرارداد داخلی</th>
              <th>نوع طرح</th>
              <th> کارفرما</th>
              <th>مجریان طرح</th>
              <th>دانشکده مربوطه</th>
              <th>گروه مربوطه</th>
              <th>زمان شروع</th>
              <th>مدت قراداد</th>
              <th>تاریخ خاتمه قرارداد</th>
              <th>مشارکتی/انفرادی</th>
              <th>مبلغ طرح</th>
              <th>وضعیت</th>
              <th>مشاهده</th>
            </tr>
            </thead>
            <tbody class="text-center">

            @if(count($contracts) > 0)
                @php($i=0)
                @php($date = new \App\Http\Controllers\PersianDate())
                @foreach($contracts as $contract)
                    <tr>
                        <th scope="row">{{++$i}}</th>
                        <td>{{$contract->name}}</td>
                        <td>{{$contract->ext_no}}</td>
                        <td>{{$contract->int_no}}</td>
                        <td>{{$contract->type}}</td>
                        <td>{{$contract->employer}}</td>
                        <td>{{$contract->executer}}</td>
                        <td>{{$contract->department}}</td>
                        <td>{{$contract->group_name}}</td>
                        <td>{{$date->toPersiandate($contract->start_date, 'Y-m-d')}}</td>
                        <td>{{$contract->duration}}</td>
                        <td>{{$date->toPersiandate($contract->finish_date, 'Y-m-d')}}</td>
                        <td>{{$contract->participation}}</td>
                        <td>{{number_format($contract->cost)}}</td>
                        <td>{{$contract->status}}</td>
                        <td>
                            <a href="{{route('contract', $contract->id)}}" class="btn btn-light">مشاهده</a>
                        </td>
                    </tr>
                @endforeach
            @endif


            </tbody>

          </table>
        </div>
      </div>

      <div class="container-fluid mt- mb-5 p-3 bg-white border-round">
        <div class="d-flex">
            @if(count($memorandums) > 0)
                <h5 class="pt-2"> نتیجه جستجو : {{count($memorandums)}} مورد یافت شد </h5>
            @endif
          <button  onclick="excelReport(this)" class="btn btn-app ml-auto">
            <i class="fal fa-file-excel"></i>
            دریافت خروجی
          </button>
        </div>
        <h5 class="py-2 ">تفاهم نامه ها :</h5>
        <div class="table-responsive">
          <table id="تفاهم نامه ها-جستجو" class="table table-striped table-bordered ">
            <thead class="text-center   ">
            <tr>
              <th>ردیف</th>
              <th>موضوع</th>
              <th>تاریخ ارائه</th>
              <th>مشاهده</th>

            </tr>
            </thead>
            <tbody class=" text-center">

            @if(count($memorandums) > 0)
                @php($i=0)
                @php($date = new \App\Http\Controllers\PersianDate())
                @foreach($memorandums as $memorandum)
                    <tr>
                        <th scope="row">{{++$i}}</th>
                        <td>{{$memorandum->title}}</td>
                        <td>{{$date->toPersiandate($memorandum->date, 'Y-m-d')}}</td>
                        <td>
                            <a href="{{route('memorandum', $memorandum->id)}}" class="btn btn-light">مشاهده</a>
                        </td>
                    </tr>
                @endforeach
             @endif


            </tbody>
          </table>
        </div>
      </div>

      <div class="container-fluid mt- mb-5 p-3 bg-white border-round">
        <div class="d-flex">
            @if(count($proposals) > 0)
                <h5 class="pt-2"> نتیجه جستجو : {{count($proposals)}} مورد یافت شد </h5>
            @endif
        <button class="btn btn-app ml-auto" onclick="excelReport(this)">
          <i class="fal fa-file-excel"></i>
          دریافت خروجی
        </button>
        </div>
        <h5 class="py-2 ">پروپوزال ها :</h5>
        <div class="table-responsive">
          <table id="پروپوزال ها-جستجو" class="table table-striped table-bordered ">
            <thead class="text-center   ">
            <tr>
              <th>ردیف</th>
              <th>نام و نام خانوادگی</th>
              <th>تاریخ ارائه</th>
              <th>دانشکده مربوطه</th>
              <th>گروه مربوطه</th>
              <th>سازمان هدف</th>
              <th>عنوان پروپوزال</th>
              <th>مشاهده</th>

            </tr>
            </thead>
            <tbody class=" text-center">

            @if(count($proposals) > 0)
                {{--@php(print_r($proposals))--}}
                {{--@php(exit())--}}
                @php($i=0)
                @php($date = new \App\Http\Controllers\PersianDate())
                @foreach($proposals as $proposal)
                    <tr>
                        <th scope="row">{{++$i}}</th>
                        <td>{{$proposal->name}}</td>
                        <td>{{$date->toPersiandate($proposal->date, 'Y-m-d')}}</td>
                        <td>{{$proposal->department}}</td>
                        <td>{{$proposal->group_name}}</td>
                        <td>{{$proposal->employer}}</td>
                        <td>{{$proposal->title}}</td>
                        <td>
                            <a href="{{route('proposal', $proposal->id)}}" class="btn btn-light">مشاهده</a>
                        </td>

                    </tr>
                @endforeach
            @endif


            </tbody>
          </table>
        </div>
      </div>

    </section>


@endsection
