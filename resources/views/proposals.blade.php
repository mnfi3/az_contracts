@extends('layouts.app')
@section('content')
  <section id="inputProposal">
    <div class="d-flex justify-content-between">
      <h4 class="my-3">پروپوزال ها</h4>
      <i class="fal fa-sticky-note header-icon"></i>
    </div>
    <div class="container-fluid bg-four mt-3 p-3 border-round">
      <h5 class="mt-1 mb-3">پروپوزال جدید</h5>
      <form action="{{route('add-proposal')}}" method="post" enctype="multipart/form-data">
          @csrf
        <div class="form-group row">
          <label class="col-md-2 col-form-label" for="fullName">نام و نام خانوادگی</label>
          <div class="col-md-3">
            <input type="text" id="fullName" required=""
                   class="form-control" name="name">
          </div>
          <label class="col-md-2 text-right  col-form-label  " for="college">دانشکده مربوطه </label>
          <div class="col-md-3">
            <input type="text" id="college" required=""
                   class="form-control" name="department">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-md-2 col-form-label " for="date">تاریخ ارائه </label>
          <div class="col-md-3">
            <input type="text" id="date" required=""
                   class="form-control j-date"
                   name="date">
          </div>
          <label class="col-md-2 text-right  col-form-label  " for="field">گروه مربوطه </label>
          <div class="col-md-3">
            <input type="text" id="field" required=""
                   class="form-control" name="group_name">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2 col-form-label" for="proposalTitle">عنوان پروپوزال</label>
          <div class="col-md-3">
            <input type="text" id="proposalTitle" required=""
                   class="form-control" name="title">
          </div>
          <label class="col-md-2 text-right  col-form-label  " for="goalSystem">سازمان هدف</label>
          <div class="col-md-3">
            <input type="text" id="goalSystem" required=""
                   class="form-control start-day pwt-datepicker-input-element" name="employer">
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
              ثبت پروپوزال
            </button>
          </div>
        </div>


      </form>
    </div>
  </section>
  <section id="allProposal">
    <h4 class="my-3">همه پروپوزال ها</h4>
    <div class="container-fluid mt- mb-5 p-3 bg-white border-round">
      <div class="d-flex">
        <button  class="btn btn-app ml-auto" onclick="excelReport(this)">
          <i class="fal fa-file-excel"></i>
          دریافت خروجی
        </button>
      </div>
      <h5 class="py-2 ">پروپوزال ها :</h5>
      <div class="table-responsive">
        <table id="پروپوزال ها" class="table table-striped table-bordered ">
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
          @php($i=0)
          @php($date = new \App\Http\Controllers\PersianDate())
          @foreach($proposals as $proposal)
          <tr>
            <th scope="row">{{++$i}}</th>
            <td>{{$proposal->name}}</td>
            <td>{{$date->toPersiandate($proposal->date, 'Y/m/d')}}</td>
            <td>{{$proposal->department}}</td>
            <td>{{$proposal->group_name}}</td>
            <td>{{$proposal->employer}}</td>
            <td>{{$proposal->title}}</td>
            <td>
              <a href="{{route('proposal', $proposal->id)}}" class="btn btn-light">مشاهده</a>
            </td>

          </tr>
          @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </section>
@endsection