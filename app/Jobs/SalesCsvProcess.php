<?php

namespace App\Jobs;

use App\Models\attendance;
use Carbon\Carbon;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SalesCsvProcess implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    public $header;
    /**
     * Create a new job instance.
     */
    public function __construct($data, $header)
    {
        $this->data = $data;
        $this->header = $header;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //

        // dd($this->data, $this->header);
        foreach ($this->data as $sale) {
            $saleData = array_combine($this->header, $sale);

            if (isset($saleData['current_date'])) {
                $saleData['current_date'] = Carbon::createFromFormat('d-m-Y', $saleData['current_date'])->format('Y-m-d');
            }

            attendance::create($saleData);
        }

    }
}
