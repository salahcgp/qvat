<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Purchase Invoices- {{ $company_name }}</title>
        <!-- Bootstrap CSS -->
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css"/>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.2/b-colvis-1.5.1/b-flash-1.5.2/b-html5-1.5.2/b-print-1.5.2/datatables.min.css"/>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Styles -->
        <style>
        html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: sans-serif;
        
        }
        .full-height {
        height: 100vh;
        }
        .flex-center {
        display: flex;
        justify-content: left;
        }
        .position-ref {
        position: relative;
        }
        .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
        }
        .content {
        text-align: left;
        }
        .title {
        font-size: 14px;
        }
        .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
        }
        .m-b-md {
        margin-bottom: 30px;
        }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
            <div class="top-right links">
                @auth
                <a href="{{ url('/admin/home') }}">Home</a>
                @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
                @endauth
            </div>
            @endif
            
            
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">Filter report by:</div>
                            <div class="panel-body">
                                <form method="GET" action="/search_pur">
                                    
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label" for="select">
                                            Company *
                                        </label>
                                        <select class="col-5" id="company" name="company">
                                            @foreach ($company_list as $cl)
                                            <option value="{{ $cl->id }}">{{ $cl->company_name }}</option>
                                            @endforeach
                                        </select>
                                        
                                        <label class="col-1 col-form-label" for="select">
                                            From:
                                        </label>
                                        <div class="input-daterange input-group col-3" id="datepicker">
                                            <input type="text" class="input-sm form-control" name="start_date" required/>
                                            <span class="input-group-addon">to</span>
                                            <input type="text" class="input-sm form-control" name="end_date" required/>
                                        </div>
                                        
                                        
                                        
                            <button class="btn btn-success" name="Save" type="submit" value="search_pur">Save</button>
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                
                <div class="row">
                    <div class="col-md-12 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">Purchase Invoices- {{ $company_name }}</div>
                            <div class="panel-body">
                                <table class="table table-sm" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>Invoice No</th>
                                            <th>Invoice Date</th>
                                            <th>Supplier Name</th>
                                            <th>Supplier TRN</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Discount</th>
                                            <th>Amount before VAT</th>
                                            <th>VAT</th>
                                            <th>Total Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($purchase_data as $sd)
                                        <tr>
                                            <td>{{ $sd->invoice_no }}</td>
                                            
                                            <td>{{ Carbon\Carbon::parse($sd->invoice_date)->format('d-m-Y') }}</td>
                                            <td>{{ $sd->supplier_name }}</td>
                                            <td>{{ $sd->trn }}</td>
                                            <td class="text-right">{{ $sd->quantity }}</td>
                                            <td class="text-right">{{ $sd->price }}</td>
                                            <td class="text-right">{{ $sd->discount }}</td>
                                            <td class="text-right">{{ $sd->amount_before_vat }}</td>
                                            <td class="text-right">{{ $sd->vat }}</td>
                                            <td class="text-right">{{ $sd->transaction_total }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- jQuery -->
        <script src="//code.jquery.com/jquery.js"></script>
        
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        <!-- DataTables -->
        
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.2/b-colvis-1.5.1/b-flash-1.5.2/b-html5-1.5.2/b-print-1.5.2/datatables.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
        
        <script>
        $(document).ready(function() {
        $('#datatable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
        'copyHtml5',
        'excelHtml5',
        'csvHtml5',
        'pdfHtml5'
        ]
        } );
        } );
        </script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
        
        <script type="text/javascript">
        $('#datepicker').datepicker({
                    format: "dd/mm/yyyy",
                    autoclose: true,
                    todayHighlight: true
    });
        </script>
    </body>
</html>