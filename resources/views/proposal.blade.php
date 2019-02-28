@extends('layouts.app')
@section('content')
  <section id="inputProposal">

    <div class="d-flex justify-content-between">
      <h4 class="my-3">{{$proposal->title}}</h4>
      <div>
        <i class="fal fa-file-edit header-icon"></i>
        <i class="fal fa-sticky-note header-icon"></i>
      </div>

    </div>
    <div class="container-fluid bg-four mt-3 p-3 border-round">
      <h5 class="mt-1 mb-3"></h5>
      <div class="row">
        <div class="col-md-8">

          <form action="{{route('edit-proposal')}}" method="post" enctype="multipart/form-data">
              @csrf
            <div class="form-group row">
              <label class="col-md-2 col-form-label" for="fullName">نام و نام خانوادگی</label>
              <div class="col-md-4">
                <input type="text" id="fullName" required="" value="{{$proposal->name}}"
                       class="form-control" name="name">
              </div>
              <label class="col-md-2 text-right  col-form-label  " for="college">دانشکده مربوطه </label>
              <div class="col-md-4">
                <input type="text" id="college" required="" value="{{$proposal->department}}"
                       class="form-control" name="department">
              </div>

            </div>

            <div class="form-group row">
              <label class="col-md-2 col-form-label " for="date">تاریخ ارائه </label>
              <div class="col-md-4">
                <input type="text" id="date" required="" value="{{$proposal->date}}"
                       class="form-control j-date"
                       name="date">
              </div>
              <label class="col-md-2 text-right  col-form-label  " for="field">گروه مربوطه </label>
              <div class="col-md-4">
                <input type="text" id="field" required="" value="{{$proposal->group_name}}"
                       class="form-control" name="group_name">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label" for="proposalTitle">عنوان پروپوزال</label>
              <div class="col-md-4">
                <input type="text" id="proposalTitle" required="" value="{{$proposal->title}}"
                       class="form-control" name="title">
              </div>
              <label class="col-md-2 text-right  col-form-label  " for="goalSystem">سازمان هدف</label>
              <div class="col-md-4">
                <input type="text" id="goalSystem" required="" value="{{$proposal->employer}}"
                       class="form-control start-day pwt-datepicker-input-element" name="employer">
              </div>

            </div>
            <div class="row">
              <label class="col-md-2 col-form-label  " for="documents">سند</label>
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

              <input type="hidden" name="id" value="{{$proposal->id}}">

            <div class="row">
              <div class="col-md-2 ">
                <button class="my-2 btn  btn-app" type="submit">
                  <i class="fal fa-edit mr-1"></i>
                  ویرایش پروپوزال
                </button>
              </div>
            </div>


          </form>
        </div>
        <div class="col-md-4">
          <div class="d-flex flex-column">

              @foreach($proposal->documents as $document)
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
    <h4 class="my-3">{{$proposal->title}}</h4>
    <div class="container-fluid mt- mb-5 p-3 bg-white border-round">
      <div class="d-flex mb-2">
        <h5 class="py-2 ">محتوای پورپوزال :</h5>
        <form class="form-inline ml-auto" action="{{route('remove-proposal')}}" method="POST"
              onsubmit="return confirm('آیا از حذف پروپوزال مطمئن هستید؟')">
          @csrf
            <input type="hidden" name="id" value="{{$proposal->id}}">
          <button type="submit" class="btn btn-app ml-auto">
            <i class="fal fa-times"></i>
            حذف پروپوزال
          </button>
        </form>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-bordered ">
          <thead class="text-center   ">
          <tr>
            <th>نام و نام خانوادگی</th>
            <th>تاریخ ارائه</th>
            <th>دانشکده مربوطه</th>
            <th>گروه مربوطه</th>
            <th>سازمان هدف</th>
            <th>عنوان پروپوزال</th>

          </tr>
          </thead>
          <tbody class=" text-center">
          @php($date = new \App\Http\Controllers\PersianDate())
          <tr>
            <td>{{$proposal->name}}</td>
            <td>{{$date->toPersiandate($proposal->date, 'Y/m/d')}}</td>
            <td>{{$proposal->department}}</td>
            <td>{{$proposal->group_name}}</td>
            <td>{{$proposal->employer}}</td>
            <td>{{$proposal->title}} </td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>
@endsection