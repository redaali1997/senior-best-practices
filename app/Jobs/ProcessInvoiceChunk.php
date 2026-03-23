<?php

namespace App\Jobs;

use App\Models\Invoice;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Collection;

class ProcessInvoiceChunk implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public int $start, public int $end)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Invoice::whereBetween('id', [$this->start, $this->end])->update(['status' => 'processed']);
    }
}
