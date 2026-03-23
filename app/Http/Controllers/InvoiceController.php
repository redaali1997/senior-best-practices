<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessInvoiceChunk;
use App\Models\Invoice;
use Illuminate\Bus\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;
use Throwable;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function updateAllStatus()
    {
        $batch = Bus::batch([
            new ProcessInvoiceChunk(1, 1000),
            new ProcessInvoiceChunk(1001, 2000),
            new ProcessInvoiceChunk(2001, 3000),
        ])
            ->then(function (Batch $batch) {
                // All jobs completed successfully
            })
            ->catch(function (Batch $batch, Throwable $throwable) {
                // One or more jobs failed
            })
            ->finally(function (Batch $batch) {
                // Batch finished
            })
            ->dispatch();

        return response()->json(['batch_id' => $batch->id]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
