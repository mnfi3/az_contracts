@extends('layouts.app')
@section('content')
  <section id="memorandums">
    <div class="d-flex justify-content-between">
      <h4 class="my-3">تفاهم نامه ها</h4>
      <i class="fal fa-handshake header-icon"></i>
    </div>
    <div class="container-fluid bg-four mt-3 p-3 border-round">
      <h5 class="mt-1 mb-3">تفاهم نامه جدید</h5>

      <form action="{{route('add-memorandum')}}" method="post" enctype="multipart/form-data">
          @csrf
        <div class="form-group row">
          <label class="col-md-2 col-form-label" for="fullName">موضوع</label>
          <div class="col-md-3">
            <input type="text" id="fullName" required=""
                   class="form-control" name="title">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-md-2 col-form-label " for="date">تاریخ عقد </label>
          <div class="col-md-3">
            <input type="text" id="date" required=""
                   class="form-control j-date"
                   name="date">
          </div>
        </div>

          <div class="form-group row">
              <label class="col-md-2 col-form-label" for="organization">سازمان طرف قرارداد تفاهم نامه</label>
              <div class="col-md-3">
                  <select name="organization" class="form-control" >
                      <option value=""></option>
                      <option value="خصوصی">خصوصی</option>
                      <option value="دولتی">دولتی</option>
                      <option value="ملی">ملی</option>
                      <option value="بین المللی">بین المللی</option>
                  </select>
              </div>
          </div>
          <div class="form-group row">
              <label class="col-md-2 col-form-label" for="number">شماره تفاهم نامه</label>
              <div class="col-md-3">
                  <input type="text" id="number"
                         class="form-control" name="number">
              </div>
          </div>

        <div class="row">
          <label class="col-md-2 col-form-label  " for="documents">سند</label>
          <div class="col-md-3">
            <div id="fileInputsContainer" class="d-flex flex-column">
              <div class="d-flex">
                <input type="file" id="documents" required=""
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
              ثبت تفاهم نامه
            </button>
          </div>
        </div>
      </form>
    </div>
  </section>

  <section id="allMemorandums">
    <h4 class="my-3">همه تفاهم نامه ها</h4>
    <div class="container-fluid mt- mb-5 p-3 bg-white border-round">
      <div class="d-flex">
        <button  class="btn btn-app ml-auto" onclick="excelReport(this)">
          <i class="fal fa-file-excel"></i>
          دریافت خروجی
        </button>
      </div>
      <h5 class="py-2 ">تفاهم نامه ها :</h5>
      <div class="table-responsive">
        <table id="تفاهم نامه ها" class="table table-striped table-bordered ">
          <thead class="text-center   ">
          <tr>
            <th class="text-center">ردیف</th>
            <th class="text-center">موضوع</th>
            <th class="text-center">تاریخ عقد</th>
            <th class="text-center">سازمان طرف قرارداد تفاهم نامه</th>
            <th class="text-center">شماره تفاهم نامه</th>
            <th class="text-center">مشاهده</th>

          </tr>
          </thead>
          <tbody class=" text-center">

          @php($i=0)
          @php($date = new \App\Http\Controllers\PersianDate())
          @foreach($memorandums as $memorandum)
          <tr>
            <th scope="row">{{++$i}}</th>
            <td><a href="{{route('memorandum', $memorandum->id)}}">{{$memorandum->title}}</a></td>
            <td>{{$date->toPersiandate($memorandum->date, 'Y/m/d')}}</td>
              <td>{{$memorandum->organization}}</td>
              <td>{{$memorandum->number}}</td>
            <td>
              <a href="{{route('memorandum', $memorandum->id)}}" class="btn btn-light">مشاهده</a>
            </td>

          </tr>
          @endforeach



          </tbody>
        </table>
      </div>
    </div>
  </section>
@endsection