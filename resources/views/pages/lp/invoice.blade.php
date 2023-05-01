<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">


<title>invoice page - Bootdey.com</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
    	body{margin-top:20px;
background-color: #f7f7ff;
}
#invoice {
    padding: 0px;
}

.invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
    padding: 15px
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #0d6efd
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .contacts {
    margin-bottom: 20px
}

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #0d6efd
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #0d6efd;
    background: #e7f2ff;
    padding: 10px;
}

.invoice main .notices .notice {
    font-size: 1.2em
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,
.invoice table th {
    padding: 15px;
    background: #eee;
    border-bottom: 1px solid #fff
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #0d6efd;
    font-size: 1.2em
}

.invoice table .qty,
.invoice table .total,
.invoice table .unit {
    text-align: right;
    font-size: 1.2em
}

.invoice table .no {
    color: #fff;
    font-size: 1.6em;
    background: #0d6efd
}

.invoice table .unit {
    background: #ddd
}

.invoice table .total {
    background: #0d6efd;
    color: #fff
}

.invoice table tbody tr:last-child td {
    border: none
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;
    border-top: 1px solid #aaa
}

.invoice table tfoot tr:first-child td {
    border-top: none
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0px solid rgba(0, 0, 0, 0);
    border-radius: .25rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
}

.invoice table tfoot tr:last-child td {
    color: #0d6efd;
    font-size: 1.4em;
    border-top: 1px solid #0d6efd
}

.invoice table tfoot tr td:first-child {
    border: none
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 8px 0
}

@media print {
    .invoice {
        font-size: 11px !important;
        overflow: hidden !important
    }
    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always
    }
    .invoice>div:last-child {
        page-break-before: always
    }
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #0d6efd;
    background: #e7f2ff;
    padding: 10px;
}
    </style>
</head>
<body>
<div class="container">
<div class="card">
<div class="card-body">
<div id="invoice">
<div class="toolbar hidden-print">
 <div class="text-end">
<button type="button" class="btn btn-dark" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
<button type="button" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>
</div>
<hr>
</div>
<div class="invoice overflow-auto">
<div style="min-width: 600px">
<header>
<div class="row">
<div class="col">
<a href="javascript:;">
    @if ($transaction->status == '1')
    <img src="{{asset('images/unpaid.jpg')}}" width="200" alt="">
    @else
    <img src="{{asset('images/paid.jpg')}}" width="200" alt="">

    @endif
{{-- <span class="badge text-bg-success">PAID</span> --}}
</a>
</div>
<div class="col company-details">
<h2 class="name">
<a target="_blank" href="javascript:;">
Arboshiki
</a>
</h2>
<div>455 Foggy Heights, AZ 85004, US</div>
<div>(123) 456-789</div>

</div>
</div>
</header>
<main>
<div class="row contacts">
<div class="col invoice-to">
<div class="text-gray-light">INVOICE TO:</div>
<h2 class="to">{{$transaction->customer->name}}</h2>
<div class="email">
    {{$transaction->customer->email}}
</div>
</div>
<div class="col invoice-details">
<h1 class="invoice-id">INV/ORD/{{$transaction->invoice_id}}</h1>
<div class="date">Date of Invoice: {{$transaction->created_at}}</div>
</div>
</div>
<table>
<thead>
<tr>
<th>#</th>
<th class="text-left">DESCRIPTION</th>
<th class="text-right">BOOKING DATE</th>
<th class="text-right">PRICE</th>
<th class="text-right">TOTAL</th>
</tr>
</thead>
<tbody>
<tr>
<td class="no">01</td>
<td class="text-left">
<h3>
<a target="_blank" href="javascript:;">
{{$transaction->product->name}}
</a>
</h3>
{{$transaction->product->description}}</td>
<td class="qty">{{$transaction->date}}</td>
<td class="qty">Rp{{$transaction->product->price}}</td>
<td class="total">Rp{{$transaction->product->price}}</td>
</tr>

</tbody>
<tfoot>
<tr>
<td colspan="2"></td>
<td colspan="2">SUBTOTAL</td>
<td>Rp{{$transaction->product->price}}</td>
</tr>
{{-- <tr>
<td colspan="2"></td>
<td colspan="2">TAX 25%</td>
<td>$1,300.00</td>
</tr> --}}
<tr>
<td colspan="2"></td>
<td colspan="2">GRAND TOTAL</td>
<td>Rp{{$transaction->product->price}}</td>
</tr>
</tfoot>
</table>
<div class="thanks">Thank you!</div>
<div class="notices">
<div>NOTICE:</div>
<div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
</div>
</main>
<footer>Invoice was created on a computer and is valid without the signature and seal.</footer>
</div>

<div></div>
</div>
</div>
</div>
</div>
</div>
{{-- <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://code.jquery.com/jquery-1.10.2.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
