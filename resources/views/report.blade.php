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
            <form action="" method="post">
              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="post-title"> عنوان قرارداد</label>
                <div class="col-md-4">
                  <input type="text" id="post-title" required="" placeholder="نام سند مورد نظر را وارد کنید"
                         class="form-control" name="title">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="post-title"> دسته بندی سند</label>
                <div class="col-md-4">
                  <select required="" class="form-control" name="category-id"
                          style="font-weight: bold; min-height: 40px">
                    <option value="1">همه اسناد</option>
                    <option value="2">قرارداد</option>
                    <option value="3">تفاهم نامه</option>
                    <option value="4">پروپوزال</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-2 col-form-label " for="duration"> از تاریخ :</label>
                <div class="col-md-4">
                  <input type="text" id="duration" required=""
                         class="form-control j-date"
                         name="start-day">
                </div>
                <label class="col-md-2 col-form-label  " for="duration2"> تا تاریخ :</label>
                <div class="col-md-4">
                  <input type="text" id="duration2" required=""
                         class="form-control j-date" name="finish-day">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label  " for="price"> از مبلغ :</label>
                <div class="col-sm-4">
                  <input type="text" id="price" required="" class="form-control" placeholder="به ریال"
                         name="start-price">
                </div>
                <label class="col-sm-2 col-form-label  " for="price2"> تا مبلغ :</label>
                <div class="col-sm-4">
                  <input type="text" id="price2" required="" placeholder="به ریال" class="form-control "
                         name="last-price">
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
          <h5 class="pt-2"> نتیجه جستوجو : 12 مورد یافت شد </h5>
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
              <th>ویرایش</th>
            </tr>
            </thead>
            <tbody class=" text-center">
            <tr>
              <th scope="row">1</th>
              <td>پیاده سازی نرم افزار کلود</td>
              <td>98668</td>
              <td>154894</td>
              <td>سازمانی</td>
              <td>بویر</td>
              <td>عباسی مهر</td>
              <td>فناوری اطلاعات</td>
              <td>نرم افزار</td>
              <td>97/12/25</td>
              <td>یک سال</td>
              <td>98/12/25</td>
              <td>انفرادی</td>
              <td>45،000،000</td>
              <td>
                <a href="{{route('contract')}}" class="btn btn-light">ویرایش</a>
              </td>

            </tr>

            </tbody>

          </table>
        </div>
      </div>

      <div class="container-fluid mt- mb-5 p-3 bg-white border-round">
        <div class="d-flex">
          <h5 class="pt-2"> نتیجه جستوجو : 12 مورد یافت شد </h5>
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
              <th>ناریخ ارایه</th>
              <th>ویرایش</th>

            </tr>
            </thead>
            <tbody class=" text-center">
            <tr>
              <th scope="row">1</th>
              <td>تفاهم یکم</td>
              <td>1397/12/25</td>
              <td>
                <a href="{{route('memorandum')}}" class="btn btn-light">ویرایش</a>
              </td>

            </tr>
            <tr>
              <th scope="row">1</th>
              <td>تفاهم دوم</td>
              <td>1397/12/25</td>
              <td>
                <a href="{{route('memorandum')}}" class="btn btn-light">ویرایش</a>
              </td>

            </tr>
            <tr>
              <th scope="row">1</th>
              <td>تفاهم سوم</td>
              <td>1397/12/25</td>
              <td>
                <a href="{{route('memorandum')}}" class="btn btn-light">ویرایش</a>
              </td>
            </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="container-fluid mt- mb-5 p-3 bg-white border-round">
        <div class="d-flex">
          <h5 class="pt-2"> نتیجه جستوجو : 12 مورد یافت شد </h5>
        <button class="btn btn-app ml-auto" onclick="excelReport(this)">
          <i class="fal fa-file-excel"></i>
          دریافت خروجی
        </button>
        </div>
        <h5 class="py-2 ">پورپوزال ها :</h5>
        <div class="table-responsive">
          <table id="پروپوزال ها-جستجو" class="table table-striped table-bordered ">
            <thead class="text-center   ">
            <tr>
              <th>ردیف</th>
              <th>نام و نام خانوادگی</th>
              <th>ناریخ ارایه</th>
              <th>دانشکده مربوطه</th>
              <th>گروه مربوطه</th>
              <th>سازمان هدف</th>
              <th>عنوان پروپوزال</th>
              <th>ویرایش</th>

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
              <td>
                <a href="{{route('proposal')}}" class="btn btn-light">ویرایش</a>
              </td>

            </tr>
            <tr>
              <th scope="row">2</th>
              <td>پویا آکلیون</td>
              <td>1397/11/25</td>
              <td>فناوری اطلاعات</td>
              <td>نرم افزار</td>
              <td>امور دانشجویی</td>
              <td>
                پروپوزال اول
              </td>
              <td>
                <a href="{{route('proposal')}}" class="btn btn-light">ویرایش</a>
              </td>

            </tr>

            </tbody>
          </table>
        </div>
      </div>

    </section>


@endsection
