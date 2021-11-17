<?php

namespace App\Domains\Statistics\Jobs;

use App\Models\StatisticsPromotionAge;
use Illuminate\Support\Facades\DB;
use Lucid\Units\QueueableJob;
use Throwable;

class IncreaseStatisticsPromotionAgeJob extends QueueableJob
{
    private array $data;

    /**
     * Create a new job instance.
     *
     * @param  array  $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @throws Throwable
     */
    public function handle()
    {
        $table = StatisticsPromotionAge::query()
            ->getModel()
            ->getTable();
        StatisticsPromotionAge::upsert(
            $this->data,
            [
                'statistics_date',
                'age_range',
                'localinfo_id',
            ],
            [
                'total_clicks' => DB::raw($table.'.total_clicks + 1'),
            ]
        );
    }
}