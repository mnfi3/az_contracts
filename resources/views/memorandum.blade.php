@extends('layouts.app')
@section('content')
  <section id="memorandums">
    <div class="d-flex justify-content-between">
      <h4 class="my-3">تفاهم نامه نمونه</h4>
      <div>
        <i class="fal fa-file-edit header-icon"></i>
        <i class="fal fa-handshake header-icon"></i>
      </div>

    </div>
    <div class="container-fluid bg-four mt-3 p-3 border-round">
      <h5 class="mt-1 mb-3">ویرایش تفاهم نامه</h5>
      <div class="row">
        <div class="col-md-6">

          <form action="" method="post">
            <div class="form-group row">
              <label class="col-md-2 col-form-label" for="fullName">موضوع</label>
              <div class="col-md-6">
                <input type="text" id="fullName" required=""
                       class="form-control" name="title">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-2 col-form-label " for="date">تاریخ ارایه </label>
              <div class="col-md-6">
                <input type="text" id="date" required=""
                       class="form-control j-date"
                       name="start_day">
              </div>
            </div>
            <div class="row">
              <label class="col-md-2 col-form-label  " for="documents">سند</label>
              <div class="col-md-6">
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
                  ویرایش
                </button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-6">
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
                <a href="#" class="btn btn-light btn-sm mr-1">بارگیری <i class="fal fa-download"></i></a>
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

  <section id="allMemorandums">
    <h4 class="my-3"> تفاهم نامه نمونه</h4>
    <div class="container-fluid mt- mb-5 p-3 bg-white border-round">
      <div class="d-flex justify-content-between align-content-center">
        <h5>محتوای نامه نمونه</h5>
        <form action="" class="form-inline my-1" onsubmit="return confirm('آیا از حذف این تفاهم نامه مطمئن هستید؟')">
          <button type="submit" class="btn btn-app ml-auto">
            <i class="fal fa-times"></i>
            حذف تفاهم نامه
          </button>
        </form>
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-bordered ">
          <thead class="text-center   ">
          <tr>
            <th>ردیف</th>
            <th>موضوع</th>
            <th>ناریخ ارایه</th>
          </tr>
          </thead>
          <tbody class=" text-center">
          <tr>
            <th scope="row">1</th>
            <td>تفاهم نامه نمونه</td>
            <td>1385/15/04</td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>
@endsection