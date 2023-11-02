@extends('layouts.customer')

@section('title')
Assets
@endsection

@section('breadcrumbs')
Assets
@endsection


<style>

    .header{
      text-align: center;
    }
    .header img{
      float:left;
      margin-left: 20%;
    }
    .header h4{
      /* position: relative; */
      margin-right: 20%;
      margin-top: 10px;
      /* line-height: 0.9px; */
      font-family: 'Poppins', sans-serif;
    }

    .top_rw{ background-color:#f4f4f4; }
	.td_w{ }
	button{ padding:5px 10px; font-size:14px;}
    .invoice-box {
        max-width: 890px;
        margin: auto;
        padding:10px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 14px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
		border-bottom: solid 1px #ccc;
    }
    .invoice-box table td {
        padding: 5px;
        vertical-align:middle;
    }
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
		font-size:12px;
    }
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }


    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    .rtl table {
        text-align: right;
    }
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
</style>
@section('content')
<div class="grid grid-cols-12 gap-6 mt-5">
    <button type="button" class="button bg-theme-1 flex items-center w-20 border text-white dark:border-dark-5 dark:text-white" onclick="window.history.go(-1); return false;"><i data-feather="arrow-left"></i> Back</button>
</div>

@if (session()->has('success'))
<div id="alert-border-3" class="flex items-center p-4 mt-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800" role="alert">
    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
    </svg>
    <div class="ml-3 text-sm font-medium">
        {{ session('success') }}
    </div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700 alert-del"  data-dismiss-target="#alert-border-3" aria-label="Close">
      <span class="sr-only">Dismiss</span>
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
      </svg>
    </button>
</div>
@endif
@if (session()->has('warning'))
<div id="alert-border-3" class="flex items-center p-4 mt-4 text-orange-800 border-t-4 border-orange-300 bg-orange-50 dark:text-orange-400 dark:bg-gray-800 dark:border-orange-800" role="alert">
    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
    </svg>
    <div class="ml-3 text-sm font-medium">
        {{ session('warning') }}
    </div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-orange-50 text-orange-500 rounded-lg focus:ring-2 focus:ring-orange-400 p-1.5 hover:bg-orange-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700 alert-del"  data-dismiss-target="#alert-border-3" aria-label="Close">
      <span class="sr-only">Dismiss</span>
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
      </svg>
    </button>
</div>
@endif


<div class="invoice-box" id="myDiv" >
    <table cellpadding="0" cellspacing="0">

        <tr class="top"  >
            <td colspan="3" >
                <table>
                    <tr>
                        <td>

                            <div class="header">
                                <div class="logo">
                                    <img class="w-20" src="{{asset('img/logo.png')}}" style="border-radius:30px;">
                                   <h4>
                                     <b>BULAN WATER DISTRICT</b> <br>
                                       De Vera St., Zone 4, Bulan, Sorsogon <br>

                                   </h4>


                                </div>
                            </div>


                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr class="information">
              <td colspan="3">
                <table>
                    @foreach ($req_info as $data )

                    <tr>

                        <td>

                            <b>Name: </b>{{$data->user->name}}<br>
                            <b>Date: </b>{{$data->date_assigned}}<br>
                            <b>Address: </b>{{$data->user->address}}<br>
                            <b>Account No: </b>{{$data->account_no}}<br>

                        </td>
                         <td colspan="2">
                            <b> Request No:  </b>{{$data->req_no}} <br>
                            <b> Technician Assigned:  </b>{{$data->technician->name}} <br>
                            <b> Service:  </b>{{$data->service->name}} <br>
                            <b> Service Description:  </b>{{$data->service->description}} <br>
                        </td>
                    </tr>

                    @endforeach

                </table>
            </td>
        </tr>
        <td colspan="3">
        <table cellspacing="0px" cellpadding="2px">
        <tr class="heading">
            <td style="width:10%;">
                QTY.
            </td>
            <td style="width:10%; text-align:center;">
                UNIT
            </td>
            <td style="width:30%; text-align:right;">
                MATERIALS
            </td>
             <td style="width:15%; text-align:right;">
               UNIT PRICE
            </td>
             <td style="width:15%; text-align:right;">
               AMOUNT
            </td>
             <td style="width:15%; text-align:right;">
               UNIT COST
            </td>
            <td style="width:15%; text-align:right;">
                AMOUNT
             </td>
        </tr>
        @foreach($assigned_asset as $data)

        <tr class="item">
            <td style="width:25%;">
                {{$data->qty ?? 'n/a'}}
              </td>
              <td style="width:10%; text-align:center;">
                {{$data->asset->unit ?? 'n/a'}}
              </td>
              <td style="width:30%; text-align:right;">
                {{$data->asset->materials ?? 'n/a'}}
              </td>
              <td style="width:15%; text-align:right;">
                {{number_format($data->unit_price, 2, '.', ',') ?? 'n/a'}}
              </td>
              <td style="width:15%; text-align:right;">
                {{number_format($data->total_price_amount, 2, '.', ',') ?? 'n/a'}}
              </td>
              <td style="width:15%; text-align:right;">
                {{number_format($data->unit_cost_lbc, 2, '.', ',') ?? 'n/a'}}
              </td>
              <td style="width:15%; text-align:right;">
                {{number_format($data->total_cost_lbc, 2, '.', ',') ?? 'n/a'}}
              </td>
          </tr>


        @endforeach
        <tr class="total">
            <td colspan="7" align="right" >  Total Amount  :  <b> {{number_format($totalCostLbc + $totalPriceAmount, 2, '.', ',')}} </b> </td>
        </tr>


        </td>
        </table>

        <tr>
           <td colspan="3">
             <table cellspacing="0px" cellpadding="2px">
                <tr>
                    <td width="50%">
                        <b> Declaration: </b> <br>
                        We declare that this invoice shows the actual price of the goods
                        described above and that all particulars are true and correct.
                    </td>
                    <td>
                     * This is a computer generated invoice and does not
                      require a physical signature
                    </td>
                </tr>
                 <tr>
                    <td width="50%">
                    </td>
                    <td>
                         <b> Authorized Signature </b>
                        <br>
                        <br>
                        ...................................

                        <br>
                        <br>
                        <br>
                    </td>

                </tr>
             </table>
           </td>
        </tr>
    </table>
</div>



@endsection
@push('custom-scripts')
<script src="{{asset('js/html2canvas.js')}}"></script>
<script>
    var alert_del = document.querySelectorAll('.alert-del');
    alert_del.forEach((x) =>
        x.addEventListener('click', function () {
        x.parentElement.classList.add('hidden');
        })
    );
</script>

<script>
    $(document).ready(function () {
        $('#qty_hide').hide();
        $('#additional-info').hide();
        var qtyInput = document.getElementById("qty");

        $('#asset_id').on('change', function () {
            var selectedOption  = $(this).find(':selected');
            var selectedUnit = selectedOption.data('unit');
            var unitPrice = selectedOption.data('unit-price');
            var unitCost = selectedOption.data('unit-cost');

            if (selectedUnit === 'n/a') {
                $('#qty_hide').hide();
                $('#additional-info').show();
                $('#unit-info').hide();
                $('#unit-price-info').text('Unit Price: ' + unitPrice);
                $('#unit-cost-info').text('Unit Cost: ' + unitCost);
                qtyInput.removeAttribute("required");
            } else {
                $('#qty_hide').show();
                $('#additional-info').show();
                $('#unit-info').show();
                $('#unit-info').text('Unit: ' + selectedUnit);
                $('#unit-price-info').text('Unit Price: ' + unitPrice);
                $('#unit-cost-info').text('Unit Cost: ' + unitCost);
                qtyInput.setAttribute("required", "required");
            }
        });
    });
</script>



@endpush
