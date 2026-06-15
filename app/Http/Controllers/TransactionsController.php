<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Transactions;
use App\TransactionDetail;
use App\Products;
use App\Customers;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transactions::with(['customer', 'user',])->get();
        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Ambil transaksi terakhir
        $lastTransaction = Transactions::latest('transaction_id')->first();
        $nextId = $lastTransaction ? $lastTransaction->transaction_id + 1 : 1;

        // Format invoice: INV-YYYYMMDD-XXX
        $invoiceCode = 'INV-' . date('Ymd') . '-' . str_pad($nextId, 3, '0', STR_PAD_LEFT);

        $customers = Customers::all();
        $products = Products::all();
        return view('transactions.create', compact('customers', 'products', 'invoiceCode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $request->validate([
            'customer_id'     => 'nullable|exists:customers,customer_id',
            'payment_method'  => 'required|string',
            'paid_amount'     => 'required|numeric',
            'cart_items'      => 'required',
            'grand_total'     => 'required|numeric',
            'change_amount'   => 'required|numeric'
        ]);

        DB::beginTransaction();
        try {

            // Simpan transaksi utama
            $transaction = Transactions::create([

                'customer_id'       => $request->customer_id,
                'user_id'           => auth()->id() ?? 5,
                'payment_method'    => $request->payment_method,
                'discount'          => $request->discount_hidden ?? 0,
                'total_amount'      => $request->grand_total,
                'paid_amount'       => $request->paid_amount,
                'change_amount'     => $request->change_amount,
                'transaction_date'  => now(),
                'status'            => $request->payment_method == 'cash' ? 'success' : 'pending'
            ]);

            //buat kode invoice berdasarkan id yang sudah pasti ada
            $transaction->transaction_code = 'INV-' . date('Ymd') . '-' . str_pad($transaction->transaction_id, 3, '0', STR_PAD_LEFT);
            $transaction->save();
            // Ambil semua item cart
            $items = json_decode($request->cart_items, true);

            foreach ($items as $item) {
                TransactionDetail::create([
                    'transaction_id' => $transaction->transaction_id,
                    'product_id'     => $item['id'],
                    'price'          => $item['price'],
                    'quantity'       => $item['qty'],
                    'subtotal'       => $item['price'] * $item['qty'],
                ]);

                // Kurangi stok produk
                Products::where('product_id', $item['id'])
                    ->decrement('stock', $item['qty']);
            }

            DB::commit();
            return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil disimpan!');
        } catch (\Throwable $e) {
            DB::rollBack();
            dd($e->getMessage());
            return back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transactions::with(['customer', 'user', 'details.product'])->findOrFail($id);
        return view('transactions.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            // Hapus dulu semua detail transaksi yang berhubungan
            TransactionDetail::where('transaction_id', $id)->delete();

            // Baru hapus data transaksinya
            Transactions::where('transaction_id', $id)->delete();

            DB::commit();

            return redirect()->route('transactions.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('transactions.index');
        }
    }
}
