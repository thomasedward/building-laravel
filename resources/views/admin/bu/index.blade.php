@extends('admin.layouts.layout')

@section('title')
التحكم فى العقارات 
@endsection

@section('header')
<!-- DataTables -->
{!! Html::style('admin/plugins/datatables/dataTables.bootstrap.css') !!}


@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
        التحكم فى العقارات 
    </h1>
  <ol class="breadcrumb pull-left">
    <li><a href=" {{ url('/controlpanel') }} "><i class="fa fa-dashboard"></i> الرئيسية</a></li>
    <li class="active"><a href="{{ url('/controlpanel/building') }}">التحكم فى العقارات 
    </a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content" >
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">التحكم فى العقارات </h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="data" class="table table-bordered table-hover text-center">
            <thead>
              <tr>
                <th>#</th>
                <th>اسم العقار</th>
                <th>السعر </th>
                <th>النوع  </th>
                <th>تاريخ الاضافة</th>
                <th>الحالة </th>
                <th>التحكم</th>
              </tr>
            </thead>
            <tbody>

           {{--     @foreach ($users as $user)
              <tr>
                  <td>{{  $user->id}}</td>
                  <td>{{  $user->name}}</td>
                  <td>{{  $user->email}}</td>
                  <td>{{  $user->created_at}}</td>
                  <td> {{  $user->admin == 1 ? 'مدير' : 'عضو'}}</td>
                  <td> 
                     
                          <a href="{{ url('/controlpanel/users/'.$user->id.'/edit ') }}">
                            <button type="button" class="btn btn-default " style="width:47%">
                            تعديل
                          </button>
                         </a>
                       
                       
                            <a href="{{ url('/controlpanel/user/'.$user->id .'/delete ') }}">
                              <button type="button" class="btn btn-danger " style="width:47%" >
                              حذف
                            </button>
                            </a>
                          


                  </td>
                 
                </tr>
              @endforeach  --}}
            
          
            </tbody>
            <tfoot>
              <tr>
                    <th>#</th>
                    <th>اسم العقار</th>
                    <th>السعر </th> 
                    <th>النوع  </th>
                    <th>تاريخ الاضافة</th>
                    <th>الحالة </th>
                    <th>التحكم</th>
              </tr>
            </tfoot>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section>
     

@endsection

@section('footer')



<!-- DataTables -->
{!! Html::script('admin/plugins/datatables/jquery.dataTables.min.js') !!}
{!! Html::script('admin/plugins/datatables/dataTables.bootstrap.min.js') !!}

<script type="text/javascript">
    
  /*    $('#example2').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true
      });
  */

      var lastIdx = null;

      $('#data thead th').each( function () {
          if($(this).index()  < 2 || $(this).index() == 6 ){
              var classname = $(this).index() == 6  ?  'date' : 'dateslash';
              var title = $(this).html();
              $(this).html( '<input type="text" class="' + classname + '" data-value="'+ $(this).index() +'" placeholder="  البحث : '+title+'" />' );
          }else if($(this).index() == 3){
            $(this).html( '<select><option value="0"> شقه </option><option value="1"> فيلا  </option> <option value="2"> شاليه  </option> </select>' );
          }
          else if($(this).index() ==  5){
            $(this).html( '<select><option value="0"> غير مفعل </option><option value="1">  مفعل </option></select>' );
        }
    
      } );
    
      var table = $('#data').DataTable({
          processing: true,{{--  #شريك تحميل بيظهر  --}}
          serverSide: true,{{--  #هيستخدم ال serverside عن طريق ال ajax  --}} 
          ajax: '{{ url('/controlpanel/building/data') }}{{ $id }}',{{--  #هيروح فين   --}}
          columns: [
            {data: 'id', name: 'id'},
            {data: 'bu_name', name: 'bu_name'},
            {data: 'bu_price', name: 'bu_price'},
            {data: 'bu_type', name: 'bu_type'},
            {data: 'created_at', name: 'created_at'},
            {data: 'bu_status', name: 'bu_status'},
           // {data: 'bu_image', name: 'bu_image'},
           // {data: 'exame', name: 'exame'},
            {data: 'control', name: ''}
          ],
          "language": {
              "url": "{{ Request::root()  }}/admin/cus/Arabic.json"
          },
          "stateSave": false,{{--  #بيفضل شايل الحاجة الا هدور عليها  --}}
          "responsive": true,
          "order": [[0, 'desc']], {{--  #الترتيب تنازلى  --}}
          "pagingType": "full_numbers",{{--  #يظهر ارقام التنقل   --}}
          aLengthMenu: [
              [25, 50, 100, 200, -1],
              [25, 50, 100, 200, "All"]
          ],{{--  #عاوز يظهر كام عضو او عنصر  بشكل عام   --}}
          iDisplayLength: 25,
          fixedHeader: true,{{--  #يعندى لو الصفحة كبيرة الheader بيحرك معايا  --}}
    
          "oTableTools": {
              "aButtons": [
    
    
                  {
                      "sExtends": "csv",
                      "sButtonText": "ملف اكسل",
                      "sCharSet": "utf16le"
                  },
                  {
                      "sExtends": "copy",
                      "sButtonText": "نسخ المعلومات",
                  },
                  {
                      "sExtends": "print",
                      "sButtonText": "طباعة",
                      "mColumns": "visible",
    
    
                  }
              ],
    
              "sSwfPath": "{{ Request::root()  }}/admin/cus/copy_csv_xls_pdf.swf"
          },
    
          "dom": '<"pull-left text-left" T><"pullright" i><"clearfix"><"pull-right text-right col-lg-6" f > <"pull-left text-left" l><"clearfix">rt<"pull-right text-right col-lg-6" pi > <"pull-left text-left" l><"clearfix"> '{{--  #شوية تظبيطات قبل الجدول  --}}
          ,initComplete: function ()
          {
              var r = $('#data tfoot tr');
              r.find('th').each(function(){
                  $(this).css('padding', 8);
              });
              $('#data thead').append(r);
              $('#search_0').css('text-align', 'center');
          }
    
      });
    
      table.columns().eq(0).each(function(colIdx) {
          $('input', table.column(colIdx).header()).on('keyup change', function() {
              table
                      .column(colIdx)
                      .search(this.value)
                      .draw();
          });
    
    
    
    
      });{{--  #بيعمل شوية تصميمات على العنصر لما ادوس عليه  --}}
    
    
    
      table.columns().eq(0).each(function(colIdx) {
          $('select', table.column(colIdx).header()).on('change', function() {
              table
                      .column(colIdx)
                      .search(this.value)
                      .draw();
          });
    
          $('select', table.column(colIdx).header()).on('click', function(e) {
              e.stopPropagation();
          });
      }); {{--  #بيعمل شوية تصميمات على العنصر لما يجى المواس عليه  --}}
    
    
      $('#data tbody')
              .on( 'mouseover', 'td', function () {
                  var colIdx = table.cell(this).index().column;
    
                  if ( colIdx !== lastIdx ) {
                      $( table.cells().nodes() ).removeClass( 'highlight' );
                      $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
                  }
              } )
              .on( 'mouseleave', function () {
                  $( table.cells().nodes() ).removeClass( 'highlight' );
              } );{{--  #بيعمل شوية تصميمات على الجدول بيشكل عام  لما يجى المواس عليه  --}}


  </script>



@endsection
