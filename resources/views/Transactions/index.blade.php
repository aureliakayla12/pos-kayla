@extends('template.layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Daftar Transaksi
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Transaksi</th>
            <th>Customer</th>
            <th>Kasir</th>
            <th>Total</th>
            <th>Status</th>
            <th>Metode Pembayaran</th>
            <th>Tanggal</th>
            <th>
                <a href={{route('transactions.create')}} class="btn btn-primary btn-sm">+Create Transaction</a>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transactions as $v )
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $v->transaction_code }}</td>
            <td>{{ $v->customer->name ?? '-' }}</td>
            <td>{{ $v->user->name ?? '-' }}</td>
            <td>{{ number_format($v->total, 0, ',', ',') }}</td>
            <td>{{ $v->status }}</td>
            <td>{{ $v->payment_method }}</td>
            <td>{{ $v->transaction_date }}</td>
            <td>
                <form action="{{route('transactions.destroy', $v->transaction_id)}}" method="POST" style="display: inline">
                {{csrf_field()}}
                @method('DELETE')
                <a href="{{ route('transactions.print', $v->transaction_id)}}">Print Struk</a>
                <a href="{{ route('transactions.show', $v->transaction_id)}}">Detail</a>
                <button type="submit" onclick="return confirm('Are you sure want to delete this transaction?')" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
            </div>
        </div>
    </div>
</div>
@endsection
