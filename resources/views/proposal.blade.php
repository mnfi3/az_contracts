@extends('layouts.app')
@section('content')
  <section id="inputProposal">

    <div class="d-flex justify-content-between">
      <h4 class="my-3"> پروپوزال نمونه</h4>
      <div>
        <i class="fal fa-file-edit header-icon"></i>
        <i class="fal fa-sticky-note header-icon"></i>
      </div>

    </div>
    <div class="container-fluid bg-four mt-3 p-3 border-round">
      <h5 class="mt-1 mb-3"></h5>
      <div class="row">
        <div class="col-md-8">
          <form action="" method="post">
            <div class="form-group row">
              <label class="col-md-2 col-form-label" for="fullName">نام و نام خانوادگی</label>
              <div class="col-md-4">
                <input type="text" id="fullName" required=""
                       class="form-control" name="title">
              </div>
              <label class="col-md-2 text-right  col-form-label  " for="college">دانشکده مربوطه </label>
              <div class="col-md-4">
                <input type="text" id="college" required=""
                       class="form-control" name="college">
              </div>

            </div>

            <div class="form-group row">
              <label class="col-md-2 col-form-label " for="date">تاریخ ارایه </label>
              <div class="col-md-4">
                <input type="text" id="date" required=""
                       class="form-control j-date"
                       name="start-day">
              </div>
              <label class="col-md-2 text-right  col-form-label  " for="field">گروه مربوطه </label>
              <div class="col-md-4">
                <input type="text" id="field" required=""
                       class="form-control" name="finish-day">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2 col-form-label" for="proposalTitle">عنوان پروپوزال</label>
              <div class="col-md-4">
                <input type="text" id="proposalTitle" required=""
                       class="form-control" name="title">
              </div>
              <label class="col-md-2 text-right  col-form-label  " for="goalSystem">سازمان هدف</label>
              <div class="col-md-4">
                <input type="text" id="goalSystem" required=""
                       class="form-control start-day pwt-datepicker-input-element" name="">
              </div>

            </div>
            <div class="row">
              <label class="col-md-2 col-form-label  " for="documents">سند</label>
              <div class="col-md-4">
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
                  <i class="fal fa-edit mr-1"></i>
                  ویرایش پروپوزال
                </button>
              </div>
            </div>


          </form>
        </div>
        <div class="col-md-4">
          <div class="d-flex flex-column">
            <div class="d-flex mt-2 justify-content-between">
              <span class="mr-4">سند شماره یک</span>
              <div class="d-flex">
                <a href="#" class="btn btn-light btn-sm mr-1">بارگیری <i class="fal fa-download"></i></a>
                <form class="form-inline" action="" method=""
                      onsubmit="return confirm('آیا از حذف این سند مطمئن هستید؟')">
                  @csrf
                  <button type="submit" class="btn btn-sm btn-app">حذف
                  </button>
                </form>

              </div>
            </div>

            <div class="d-flex mt-2 justify-content-between">
              <span class="mr-4">سند شماره دو</span>
              <div class="d-flex">
                <a href="#" class="btn btn-light btn-sm mr-1">بارگیری <i class="fal fa-download"></i></a>
                <form class="form-inline" action="" method=""
                      onsubmit="return confirm('آیا از حذف این سند مطمئن هستید؟')">
                  @csrf
                  <button type="submit" class="btn btn-sm btn-app">حذف
                  </button>
                </form>

              </div>
            </div>

            <div class="d-flex mt-2 justify-content-between">
              <span class="mr-4">سند شماره سه</span>
              <div class="d-flex">
                <a href="#" class="btn  btn-light btn-sm mr-1 ">بارگیری <i class="fal fa-download"></i></a>
                <form class="form-inline" action="" method=""
                      onsubmit="return confirm('آیا از حذف این سند مطمئن هستید؟')">
                  @csrf
                  <button type="submit" class="btn btn-sm btn-app">حذف
                  </button>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
  <section id="allProposal">
    <h4 class="my-3">پروپوزال نمونه</h4>
    <div class="container-fluid mt- mb-5 p-3 bg-white border-round">
      <div class="d-flex mb-2">
        <h5 class="py-2 ">محتوای پورپوزال :</h5>
        <form class="form-inline ml-auto" action="" method="POST"
              onsubmit="return confirm('آیا از حذف پروپوزال مطمئن هستید؟')">
          @csrf
          <button type="submit" class="btn btn-app ml-auto">
            <i class="fal fa-times"></i>
            حدف پروپوزال
          </button>
        </form>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-bordered ">
          <thead class="text-center   ">
          <tr>
            <th>ردیف</th>
            <th>نام و نام خانوادگی</th>
            <th>ناریخ ارایه</th>
            <th>دانشکده مربوطه</th>
            <th>گروه مربوطه</th>
            <th>سازمان هدف</th>
            <th>عنوان پروپوزال</th>

          </tr>
          </thead>
          <tbody class=" text-center">
          <tr>
            <th scope="row">1</th>
            <td>پویا آکلیون</td>
            <td>1397/11/25</td>
            <td>فناوری اطلاعات</td>
            <td>نرم افزار</td>
            <td>امور دانشجویی</td>
            <td>
              پروپوزال اول
            </td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>
@endsection