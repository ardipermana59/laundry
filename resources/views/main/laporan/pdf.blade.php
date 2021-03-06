<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <style type="text/css">
    .text-center {
      text-align: center !important;
    }
    .table:not(.table-dark) {
    color: inherit;
    }
    .card-body>.table {
        margin-bottom: 0;
    }
    .table {
        table-layout: fixed;
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        background-color: transparent;
    }
    table {
        border-collapse: collapse;
    }
    *, ::after, ::before {
        box-sizing: border-box;
    }
    thead {
        display: table-header-group;
        vertical-align: middle;
        border-color: inherit;
    }
    tr {
        display: table-row;
        vertical-align: inherit;
        border-color: inherit;
    }
    .table thead th {
        vertical-align: bottom;
    }
    .table td, .table th {
        padding: .75rem;
        vertical-align: top;
    }
    .align-middle {
        vertical-align: middle!important;
    }
    tbody {
        display: table-row-group;
        vertical-align: middle;
        border-color: inherit;
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0,0,0,.05);
    }
    td {
        display: table-cell;
        vertical-align: inherit;
    }

  </style>
</head>
<body>
  @php $total = 0 @endphp
  <h1 class="text-center">Laporan Keuangan Laundry</h1>
    <h3 class="text-center text-muted">Jl. Pagaden Subang Jawa Barat Indonesia</h3>
    <table class="table table-striped" border="1" align="center">
      <thead>
        <tr>
          <th class="text-center align-middle" style="width: 7%">No</th>
          <th class="text-center align-middle">Tanggal</th>
          <th class="text-center align-middle">Invoice</th>
          <th class="text-center align-middle">Pemasukan</th>
        </tr>
      </thead>
      <tbody class="text-center">
        @forelse($datas as $data)
          @php $total = $total + $data->total @endphp
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ tanggalIndonesia($data->updated_at) }}</td>
            <td>{{ $data->invoice_code }}</td> 
            <td>{{ formatRp($data->total) }}</td>
        </tr>
          @empty
        <tr>
          <td class="text-center" colspan="4">tidak ada data</td>
        </tr>
          @endforelse
        <tr>
          <td colspan="3" class="font-weight-bold">Total</td>
          <td>{{ formatRp($total) }}</td>
        </tr>
      </tbody>
    </table>
</body>
</html>