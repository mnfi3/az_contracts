@extends('layouts.app')
@section('content')
  <section id="inputProposal">
    <div class="d-flex justify-content-between">
      <h4 class="my-3">{{$contract->name}}</h4>
      <div>
        <i class="fal fa-file-edit header-icon"></i>
        <i class="fal fa-file-contract header-icon"></i>
      </div>
    </div>
    <div class="container-fluid bg-four mt-3 p-3 border-round">
      <h5 class="mt-1 mb-3">ویرایش قرارداد</h5>

      <form action="{{route('edit-contract')}}" method="post" enctype="multipart/form-data">
          @csrf
        <div class="form-group row">
          <label class="col-md-2 col-form-label" for="title">عنوان طرح</label>
          <div class="col-md-3">
            <input type="text" id="title" required="" value="{{$contract->name}}"
                   class="form-control" name="name" disabled>
          </div>
          <label class="col-md-2 text-right  col-form-label  " for="titleType">نوع طرح</label>
          <div class="col-md-3">
            <input type="text" id="titleType" required="" value="{{$contract->type}}"
                   class="form-control" name="type" disabled>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2 col-form-label" for="outsideNumber">شماره قرارداد بیرونی</label>
          <div class="col-md-3">
            <input type="text" id="outsideNumber" required="" value="{{$contract->ext_no}}"
                   class="form-control" name="ext_no" disabled>
          </div>
          <label class="col-md-2 text-right col-form-label" for="insideNumber">شماره قرارداد داخلی</label>
          <div class="col-md-3">
            <input type="text" id="insideNumber" required="" value="{{$contract->int_no}}"
                   class="form-control" name="int_no" disabled>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2 col-form-label" for="employer">کارفرما</label>
          <div class="col-md-3">
            <input type="text" id="employer" required="" value="{{$contract->employer}}"
                   class="form-control" name="employer" disabled>
          </div>
          <label class="col-md-2 text-right  col-form-label" for="projectExecutives">مجریان طرح</label>
          <div class="col-md-3">
            <input type="text" id="projectExecutives" required="" value="{{$contract->executer}}"
                   class="form-control" name="executer" disabled>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2 col-form-label" for="college">دانشکده مربوطه</label>
          <div class="col-md-3">
            <input type="text" id="college" required="" value="{{$contract->department}}"
                   class="form-control" name="department" disabled>
          </div>
          <label class="col-md-2 text-right  col-form-label" for="field">گروه مربوطه</label>
          <div class="col-md-3">
            <input type="text" id="field" required="" value="{{$contract->group_name}}"
                   class="form-control" name="group_name" disabled>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2 col-form-label " for="startDay">زمان شروع</label>
          <div class="col-md-3">
            <input type="text" id="startDay" required="" value="{{$contract->start_date}}"
                   class="form-control j-date"
                   name="start_date" disabled>
          </div>

          <label class="col-md-2 text-right col-form-label " for="finishDay">زمان خاتمه قرارداد</label>
          <div class="col-md-3">
            <input type="text" id="finishDay" required="" value="{{$contract->finish_date}}"
                   class="form-control j-date"
                   name="finish_date" disabled>
          </div>

        </div>
        <div class="form-group row">
          <label class="col-md-2  col-form-label " for="term">مدت قرارداد</label>
          <div class="col-md-3">
            <input type="text" id="term" required="" value="{{$contract->duration}}"
                   class="form-control start-day pwt-datepicker-input-element"
                   name="duration" disabled>
          </div>

          <label class="col-md-2 text-right  col-form-label " for="type">مشارکتی یا انفرادی</label>
          <div class="col-md-3">
            <input type="text" id="type" required="" value="{{$contract->participation}}"
                   class="form-control"
                   name="participation" disabled>
          </div>

        </div>

        <div class="form-group row">
          <label class="col-md-2 col-form-label" for="amount">مبلغ طرح </label>
          <div class="col-md-3">
            <input type="text" id="amount" required="" value="{{$contract->cost}}"
                   class="form-control" name="cost" disabled>
          </div>

            <label class="col-md-2 text-right  col-form-label " for="status">وضعیت طرح</label>
            <div class="col-md-3">
                <input type="text" id="status" required="" value="{{$contract->status}}"
                       class="form-control"
                       name="status" disabled>
            </div>

        </div>

          <div class="form-group row">
              <label class="col-md-2 col-form-label" for="colleges">همکاران طرح </label>
              <div class="col-md-3">
                  <input type="text" id="colleges" required="" value="{{$contract->partners}}"
                         class="form-control" name="partners" disabled>
              </div>

              <label class="col-md-2 text-right  col-form-label " for="status"  >پرداخت اول(ریال) </label>
              <div class="col-md-3">
                  <input type="number" id="pay1" required="" value="{{$contract->pay1}}"
                         class="form-control" name="pay1" disabled>
              </div>

          </div>

          <div class="form-group row">
              <label class="col-md-2 col-form-label" for="colleges">پرداخت دوم(ریال) </label>
              <div class="col-md-3">
                  <input type="number" id="pay2"  value="{{$contract->pay2}}"
                         class="form-control" name="pay2" disabled>
              </div>

              <label class="col-md-2 text-right  col-form-label " for="status">پرداخت سوم(ریال) </label>
              <div class="col-md-3">
                  <input type="number" id="pay3"  value="{{$contract->pay3}}"
                         class="form-control" name="pay3" disabled>
              </div>

          </div>


          <div class="form-group row">
              <label class="col-md-2 col-form-label" for="colleges">پرداخت نهایی(ریال) </label>
              <div class="col-md-3">
                  <input type="number" id="payLast"  value="{{$contract->pay_final}}"
                         class="form-control" name="pay_final" disabled>
              </div>

          </div>

        <div class="row">
          <label class="col-md-2 col-form-label  " for="documents">اسناد</label>
          <div class="col-md-3">
            <div id="fileInputsContainer" class="d-flex flex-column">
              <div class="d-flex">
                <input type="file" id="documents"
                       class="form-control-file" name="documents[]" id="doc">
                <button class="btn btn-sm btn-light" onclick="addDocumentInput()" disabled>سند جدید</button>
              </div>
            </div>
          </div>
        </div>
          <input type="hidden" name="id" value="{{$contract->id}}">
        <div class="row">
          <div class="col-md-2 ">
             
            <button class="my-2 btn  btn-app" type="submit">
              <i class="fal fa-edit mr-1"></i>
              ذخیره
            </button>
          </div>
        </div>

      </form>
	      <button class="my-2 btn  btn-app mr-auto" onclick="myFunction()">
                  <i class="fal fa-edit mr-1"></i>
                  ویرایش
              </button>
    </div>
  </section>

  <section id="proposalDocuments">
    <div class="d-flex justify-content-between">
      <h4 class="mt-4">اسناد </h4>
    </div>
    <div class="container-fluid bg-four mt-3 p-3 border-round">
      <h5 class="mt-1 mb-3">ویرایش اسناد </h5>
      <div class="col-md-4">
        <div class="d-flex flex-column">

            @foreach($contract->documents as $document)
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
  </section>

  <section id="allProposal">
    {{--<h4 class="my-3">{{$contract->name}}</h4>--}}
    <div class="container-fluid mt- mb-5 p-3 bg-white border-round">
      <div class="d-flex mb-2">
        <h5 class="py-2 ">محتوای قرارداد :</h5>
        <form class="form-inline ml-auto" action="{{route('remove-contract')}}" method="POST"
              onsubmit="return confirm('آیا از حذف قرارداد مطمئن هستید؟')">
          @csrf
            <input type="hidden" name="id" value="{{$contract->id}}">
          <button type="submit" class="btn btn-app ml-auto">
            <i class="fal fa-times"></i>
            حذف قرارداد
          </button>
        </form>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-bordered ">

          <thead class="text-center   ">
          <tr>
              <th>عنوان طرح</th>
              <th>شماره قرارداد بیرونی</th>
              <th>شماره قرارداد داخلی</th>
              <th>نوع طرح</th>
              <th> کارفرما</th>
              <th>مجریان طرح</th>
              <th>همکاران طرح طرح</th>
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
          </tr>
          </thead>
          <tbody class=" text-center">
          @php($date = new \App\Http\Controllers\PersianDate())
          <tr>
            <td>{{$contract->name}}</td>
            <td>{{$contract->ext_no}}</td>
            <td>{{$contract->int_no}}</td>
            <td>{{$contract->type}}</td>
            <td>{{$contract->employer}}</td>
            <td>{{$contract->executer}}</td>
            <td>{{$contract->partners}}</td>
            <td>{{$contract->department}}</td>
            <td>{{$contract->group_name}}</td>
            <td>{{$date->toPersiandate($contract->start_date, 'Y/m/d')}}</td>
            <td>{{$contract->duration}}</td>
            <td>{{$date->toPersiandate($contract->finish_date, 'Y/m/d')}}</td>
            <td>{{$contract->participation}}</td>
            <td>{{number_format($contract->cost)}} ریال </td>
            <td>{{$contract->status}}</td>
            <td>{{$contract->pay1}}</td>
            <td>{{$contract->pay2}}</td>
            <td>{{$contract->pay3}}</td>
            <td>{{$contract->pay_final}}</td>
          </tbody>

          </tr>
        </table>
      </div>
    </div>
  </section>
    <script>
    function myFunction() {
		 document.getElementById("title").disabled = !document.getElementById("title").disabled;
         document.getElementById("pay1").disabled = !document.getElementById("pay1").disabled;
		 document.getElementById("pay2").disabled = !document.getElementById("pay2").disabled;
		 document.getElementById("pay3").disabled = !document.getElementById("pay3").disabled;
		 document.getElementById("payLast").disabled = !document.getElementById("payLast").disabled;
		  document.getElementById("titleType").disabled = !document.getElementById("titleType").disabled;
		 document.getElementById("insideNumber").disabled = !document.getElementById("insideNumber").disabled;
		 document.getElementById("outsideNumber").disabled = !document.getElementById("outsideNumber").disabled;
		 document.getElementById("employer").disabled = !document.getElementById("employer").disabled;
		 document.getElementById("projectExecutives").disabled = !document.getElementById("projectExecutives").disabled;
		 document.getElementById("startDay").disabled = !document.getElementById("startDay").disabled;
		 document.getElementById("finishDay").disabled = !document.getElementById("finishDay").disabled;
		 document.getElementById("term").disabled = !document.getElementById("term").disabled;
		 document.getElementById("college").disabled = !document.getElementById("college").disabled;
		 document.getElementById("amount").disabled = !document.getElementById("amount").disabled;
		 document.getElementById("field").disabled = !document.getElementById("field").disabled;
		 document.getElementById("type").disabled = !document.getElementById("type").disabled;
		 document.getElementById("status").disabled = !document.getElementById("status").disabled;
		 document.getElementById("colleges").disabled = !document.getElementById("colleges").disabled;
		 document.getElementById("doc").disabled = !document.getElementById("doc").disabled;
		
		 }
  </script>
@endsection