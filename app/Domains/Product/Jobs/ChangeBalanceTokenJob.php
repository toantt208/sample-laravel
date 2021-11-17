<?php

namespace App\Domains\Product\Jobs;

use App\Exceptions\BusinessException;
use App\ValueObjects\Amount;
use Illuminate\Support\Facades\Http;
use Lucid\Units\Job;
use Throwable;

class ChangeBalanceTokenJob extends Job
{
    private string $userUid;
    private Amount $amount;
    private string $reason;

    /**
     * Create a new job instance.
     *
     * @param string $userUid
     * @param Amount $amount
     * @param string $reason
     */
    public function __construct(string $userUid, Amount $amount, string $reason)
    {
        $this->userUid = $userUid;
        $this->amount  = $amount;
        $this->reason  = $reason;
    }

    /**
     * Execute the job.
     * @throws Throwable
     */
    public function handle()
    {
        $response = Http::post(config('services.domain.wallet') . '/admin/rewards', [
            'user_uid'     => $this->userUid,
            'token_amount' => $this->amount->amount(),
            'reason'       => $this->reason,
        ]);

        throw_if(
            $response->status() >= 400,
            BusinessException::class,
            __('messages.payment.update_balance_token_fail'),
        );
    }
}
