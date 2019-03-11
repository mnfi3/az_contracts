function addDocumentInput() {
  var referenceNode = document.getElementById('fileInputsContainer').lastChild;
  var newNode = document.createElement("DIV");
  newNode.className += 'mt-1'
  newNode.innerHTML = '<input type="file"  required=""\n' +
    '                       class="form-control-file" name="documents[]">'
  referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
}

function addImageInput() {
  var referenceNode = document.getElementById('imageInputsContainer').lastChild;
  var newNode = document.createElement("DIV");
  newNode.className += 'mt-1'
  newNode.innerHTML = '<input type="file"  required=""\n' +
    '                       class="form-control-file" name="images[]">'
  referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
}

$(document).ready(function () {
  new persianDate().format("dddd, MMMM DD YYYY");
  $('.j-date').persianDatepicker({
    autoClose: true,
    navigator: {
      scroll: {
        enabled: false
      }
    },
    format: 'DD / MM / YYYY'
  });
});
window.excelReport = function (elm) {
  var sheetname = $("#chainnames").children(":selected").text();
  var tableId = $(elm).parent().siblings('.table-responsive').children(":first").attr('id');
  tableToExcel(tableId, sheetname);
}

$(document).on('click', '#exportreptoexcelfile', function (event) {
  //working great with Arabic without filename
  console.log(event)
  var sheetname = "sf";//$("#chainnames").children(":selected").text();
  tableToExcel('students', sheetname);

});

var tableToExcel = (function () {
  var uri = 'data:application/vnd.ms-excel;base64,'
    ,
    template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table border="2px"><tr>{table}</table></body></html>'
    , base64 = function (s) {
      return window.btoa(unescape(encodeURIComponent(s)))
    }
    , format = function (s, c) {
      return s.replace(/{(\w+)}/g, function (m, p) {
        return c[p];
      })
    }
  return function (table, name) {
    var tableId = table
    if (!table.nodeType) table = document.getElementById(table)
    var orginalTable = table.innerHTML
    var lastColValid = false
    if ($(table).hasClass('course-payment')) {
      lastColValid = true
    }
    for (var j = 0; j < table.rows.length; j++) {
      if (j == 3) {
        table.rows[j].cells[1].width = 180
        table.rows[j].cells[2].width = 180
        table.rows[j].cells[3].width = 180
        try {
          table.rows[j].cells[4].width = 180
        } catch (err) {
        }
      }
      if (!lastColValid) {

        var lastIndex = $(table.rows[j]).children(":last").index()
        table.rows[j].deleteCell(lastIndex)
        // table.rows[j].deleteCell(lastIndex - 1)
      }
    }
    // table.innerHTML=table.innerHTML.replace('/تومان/g','')
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    table.innerHTML = orginalTable
    // window.location.href = uri + base64(format(template, ctx))
    var dt = new Date();
    var day = dt.getDate();
    var month = dt.getMonth() + 1;
    var year = dt.getFullYear();
    var postfix = day + "." + month + "." + year;
    var result = uri + base64(format(template, ctx));
    var a = document.createElement('a');
    a.href = result;
    a.download = name + tableId + ' _ ' + postfix + '.xls';
    a.click();
    return true;
  }
})()