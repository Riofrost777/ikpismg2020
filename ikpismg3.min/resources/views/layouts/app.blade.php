<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('IKPI Semarang Website') }}</title>
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('material') }}/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('material') }}/img/favicon.png">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- ImgAreaSelect CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/imgareaselect/0.9.10/css/imgareaselect-animated.css">
    <!-- Datepicker CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
    <!-- Slick Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" />
    <link href="{{ asset('material') }}/css/carousel.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="{{ asset('material') }}/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('material') }}/demo/demo.css" rel="stylesheet" />
    <!-- Hide Scrollbar -->
    <style type="text/css">
      ::-webkit-scrollbar {
          display: none;
      }

      input#fileInput {
        display: inline-block;
        width: 150px;
        padding: 80px 0 0 0;
        height: 50px;
        overflow: hidden;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        background: url('{{ asset('material') }}/img/Upload.png') center center no-repeat #e4e4e4;
        border-radius: 20px;
        background-size: 60px 60px;
      }

    </style>
    </head>
    <body class="{{ $class ?? '' }}">
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @include('layouts.page_templates.auth')
        @endauth
        @guest()
            @include('layouts.page_templates.guest')
        @endguest
        
        <!--   Core JS Files   -->
        <script src="{{ asset('material') }}/js/core/jquery.min.js"></script>
        <script src="{{ asset('material') }}/js/core/popper.min.js"></script>
        <script src="{{ asset('material') }}/js/core/bootstrap-material-design.min.js"></script>
        <script src="{{ asset('material') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <!-- Plugin for the momentJs  -->
        <script src="{{ asset('material') }}/js/plugins/moment.min.js"></script>
        <!--  Plugin for Sweet Alert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.7.0/dist/sweetalert2.all.min.js"></script>
        <!-- Plugin for imgAreaSelect -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/imgareaselect/0.9.10/js/jquery.imgareaselect.min.js"></script>
        <script>
          //set image coordinates
          function updateCoords(im,obj){
              $('#x').val(obj.x1);
              $('#y').val(obj.y1);
              $('#w').val(obj.width);
              $('#h').val(obj.height);
              $('#sw').val(im.width);
              $('#sh').val(im.height);
          }

          //check coordinates
          function checkCoords(){
              if(parseInt($('#w').val())) return true;
              Swal.fire({
                icon: 'warning',
                text: 'Please select a crop region then press submit.'
              })
              return false;
          }

          $(document).ready(function(){
              //prepare instant image preview
              var p = $("#filePreview");
              $("#fileInput").change(function(){
                  //fadeOut or hide preview
                  p.fadeOut();

                  //prepare HTML5 FileReader
                  var oFReader = new FileReader();
                  oFReader.readAsDataURL(document.getElementById("fileInput").files[0]);

                  oFReader.onload = function (oFREvent) {
                      p.attr('src', oFREvent.target.result).fadeIn();
                  };
              });

              //implement imgAreaSelect plugin
              $('img#filePreview').imgAreaSelect({
                  // set crop ratio (optional)
                  aspectRatio: '1:1',
                  onSelectEnd: updateCoords
              });
          });
        </script>
        <!-- <script src="{{ asset('material') }}/js/plugins/sweetalert2.js"></script> -->
        <!-- Forms Validations Plugin -->
        <script src="{{ asset('material') }}/js/plugins/jquery.validate.min.js"></script>
        <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
        <script src="{{ asset('material') }}/js/plugins/jquery.bootstrap-wizard.js"></script>
        <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
        <script src="{{ asset('material') }}/js/plugins/bootstrap-selectpicker.js"></script>
        <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
        <script src="{{ asset('material') }}/js/plugins/bootstrap-datetimepicker.min.js"></script>
        <script>
          $('.date-pickers').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:00',
            sideBySide: true
          });
        </script>
        <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
        <script src="{{ asset('material') }}/js/plugins/bootstrap-tagsinput.js"></script>
        <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
        <script src="{{ asset('material') }}/js/plugins/jasny-bootstrap.min.js"></script>
        <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
        <script src="{{ asset('material') }}/js/plugins/fullcalendar.min.js"></script>
        <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
        <script src="{{ asset('material') }}/js/plugins/jquery-jvectormap.js"></script>
        <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
        <script src="{{ asset('material') }}/js/plugins/nouislider.min.js"></script>
        <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
        <!-- Library for adding dinamically elements -->
        <script src="{{ asset('material') }}/js/plugins/arrive.min.js"></script>
        <!--  Google Maps Plugin    -->
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE'"></script>
        <!-- Chartist JS -->
        <script src="{{ asset('material') }}/js/plugins/chartist.min.js"></script>
        <!--  Notifications Plugin    -->
        <script src="{{ asset('material') }}/js/plugins/bootstrap-notify.js"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="{{ asset('material') }}/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
        <!-- Carousel JS -->
        <script type="text/javascript">
          $('#myCarousel').carousel({
              interval: 3000,
          })
        </script>
        <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" ></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" ></script>
        <!-- DataTables.net Plugin for export file/print -->
        <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
        <!-- PRINT AND EXPORT DATATABLE FUNCTION -->

        <!-- CREATE DATATABLES -->
        <script>
          $(document).ready(function() {
            $('#user-table').DataTable({
              ordering: false,
              scrollX:true,
              language: {
                emptyTable: 'No member here yet'
              }
            });
          } );
        </script>
        <script>
          $(document).ready(function() {
            $('#event-table').DataTable({
              ordering: false,
              scrollX:true,
              language: {
                emptyTable: 'No event create yet'
              }
            });
          } );
        </script>
        <script>
          $(document).ready(function() {
            $('#attendance-table').DataTable({
              ordering: false,
              scrollX:true,
              language: {
                emptyTable: 'No event yet'
              }
            });
          } );
        </script>
        <script>
          $(document).ready(function() {
            $('#list-attendance-table').DataTable({
              ordering: false,
              scrollX:true,
              language: {
                emptyTable: 'No member attend in this event yet'
              }
            });
          } );
        </script>
        <script>
          $(document).ready(function() {
            $('#list-attendance-table2').DataTable({
              ordering: false,
              scrollX:true,
              language: {
                emptyTable: 'No guest attend in this event yet'
              }
            });
          } );
        </script>
        <script>
          $(document).ready(function() {
            $('#article-table').DataTable({
              ordering: false,
              scrollX:true,
              language: {
                emptyTable: 'No article created yet'
              }
            });
          } );
        </script>
        <script>
          $(document).ready(function() {
            $('#user-ppls-table').DataTable({
              ordering: false,
              scrollX:true,
              dom: 'Bfrtip',
              buttons: {
                buttons: [{
                  extend: 'print',
                  text: '<i class="fa fa-print"></i> Print',
                  title: $('#ppls').text(),
                  exportOptions: {
                    columns: ':not(.no-print)'
                  },
                  footer: true,
                  autoPrint: false
                }, {
                  extend: 'pdf',
                  text: '<i class="fa fa-file-pdf-o"></i> PDF',
                  title: $('#ppls').text(),
                  exportOptions: {
                    columns: ':not(.no-print)'
                  },
                  footer: true
                }],
                dom: {
                  container: {
                    className: 'dt-buttons'
                  },
                  button: {
                    className: 'btn btn-primary'
                  }
                }
              }
            });
          } );
        </script>
        <script>
          $(document).ready(function() {
            $('#user-pplus-table').DataTable({
              ordering: false,
              scrollX:true,
              dom: 'Bfrtip',
              buttons: {
                buttons: [
                  {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i> Print',
                    title: $('#pplus').text(),
                    exportOptions: {
                      columns: ':not(.no-print)'
                    },
                    footer: true,
                    autoPrint: false
                  },
                  {
                    extend: 'pdf',
                    text: '<i class="fa fa-file-pdf-o"></i> PDF',
                    title: $('#pplus').text(),
                    exportOptions: {
                      columns: ':not(.no-print)'
                    },
                    footer: true
                  },
                  {
                    extend: 'excel',
                    text: '<i class="fa fa-file-excel-o"></i> Excel',
                    title: $('#pplus').text(),
                    exportOptions: {
                      columns: ':not(.no-print)'
                    },
                    footer: true
                  }
                ],
                dom: {
                  container: {
                    className: 'dt-buttons'
                  },
                  button: {
                    className: 'btn btn-primary'
                  }
                }
              }
            });
          } );
        </script>
        <!-- Script for uploading invoice -->
        <script>
          $(function(){
            $("#invoice-upload").on('click', function(e){
              e.preventDefault();
              $("#invoice:hidden").trigger('click');
            });
          });
        </script>
        <script>
          $(document).ready(function(){
            $('#invoice').change(function() {
            // submit the form 
                $('#invoice-form').submit();
            });
          });
        </script>
        <!-- END -->
        <!-- Script for uploading attachment -->
        <script>
          $(function(){
            $("#attachment-upload").on('click', function(e){
              e.preventDefault();
              $("#attachment:hidden").trigger('click');
            });
          });
        </script>
        <script>
          $(document).ready(function(){
            $('#attachment').change(function() {
            // submit the form 
                $('#attachment-form').submit();
            });
          });
        </script>
        <!-- END -->
        <!-- Script for uploading article photo -->
        <script>
          $(function(){
            $("#article-upload").on('click', function(e){
              e.preventDefault();
              $("#input-photo:hidden").trigger('click');
            });
          });
        </script>
        <!-- END -->
        <!-- Material Dashboard DEMO methods, don't include it in your project! -->
        <script src="{{ asset('material') }}/demo/demo.js"></script>
        <script src="{{ asset('material') }}/js/settings.js"></script>
        @stack('js')
    </body>
</html>