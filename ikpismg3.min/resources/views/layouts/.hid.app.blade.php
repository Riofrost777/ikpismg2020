<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('IKPI Semarang Web') }}</title>
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
    <!-- CSS Files -->
    <link href="{{ asset('material') }}/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('material') }}/demo/demo.css" rel="stylesheet" />
    <!-- Hide Scrollbar -->
    <style type="text/css">
      ::-webkit-scrollbar {
          display: none;
      }

      input#file {
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
        <script src="{{ asset('material') }}/js/plugins/sweetalert2.js"></script>
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
        <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js" ></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" ></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" ></script>
        <!-- <script src="{{ asset('material') }}/js/plugins/jquery.dataTables.min.js"></script> -->
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
        <!-- ImgAreaSelect JS -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/imgareaselect/0.9.10/js/jquery.imgareaselect.min.js"></script> -->
        <!-- <script>
            jQuery(function($) {
      
                var p = $("#previewimage");
                $("body").on("change", ".avatar", function(){
     
                    var imageReader = new FileReader();
                    imageReader.readAsDataURL(document.querySelector(".avatar").files[0]);
     
                    imageReader.onload = function (oFREvent) {
                        p.attr('src', oFREvent.target.result).fadeIn();
                    };
                });
     
                ('#previewimage').imgAreaSelect({
                    aspectRatio: '1:1',
                    maxWidth: '100', // this value is in pixels
                    show : true,
                    onSelectEnd: function (img, selection) {
                        $('input[name="x1"]').val(selection.x1);
                        $('input[name="y1"]').val(selection.y1);
                        $('input[name="w"]').val(selection.width);
                        $('input[name="h"]').val(selection.height);            
                    }
                });
            });
        </script> -->
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
        <!-- <script>
          function deleteEvent() {
            event.preventDefault(); // prevent form submit
            var form = document.querySelector("#event-"+$id); // storing the form
                    swal({
              title: "Are you sure?",
              text: "But you will still be able to retrieve this file.",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Yes, archive it!",
              cancelButtonText: "No, cancel please!",
              closeOnConfirm: false,
              closeOnCancel: false
            },
            function(isConfirm){
              if (isConfirm) {
                form.submit();          // submitting the form when user press yes
              } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
              }
            });
            }
        </script> -->
        <!-- Material Dashboard DEMO methods, don't include it in your project! -->
        <!-- <script src="{{ asset('material') }}/demo/demo.js"></script>
        <script src="{{ asset('material') }}/js/settings.js"></script> -->
        @stack('js')
    </body>
</html>