<?php

namespace OldTimeGuitarGuy\Plaid\Services;

/**
 * The /auth endpoint allows you to collect a user's bank account and
 * routing number, along with basic account data and balances. The
 * product performs two crucial functions—it translates bank access
 * credentials (username & password) into an accurate account and
 * routing number. No input of account or routing number is necessary.
 * Secondly it validates that this is the owner of this account number,
 * in a NACHA compliant manner. No need for micro-deposits or any other
 * secondary authentication.
 *
 * https://plaid.com/docs/api/#auth
 */
class Exchange extends Base\Service
{
    /**
     * Get the main endpoint for this service
     *
     * @param  string|null $path
     *
     * @return string
     */
    public function endpoint($path = null)
    {
        return $this->path('transaction', $path);
    }

    /**
     * Get the transactions
     *
     * @param $start_date
     * @param $end_date
     * @return \OldTimeGuitarGuy\Plaid\Contracts\Http\Response
     */
    public function get($start_date, $end_date)
    {
        return $this->request->post($this->endpoint(),[
            'start_date' => $start_date,
            'end_date' => $end_date
        ]);
    }
}