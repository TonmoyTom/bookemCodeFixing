<?php

namespace App\Http\Controllers\Api;

use App\Models\ProviderBalance;
use App\Models\ProviderPaymentMethod;
use App\Models\Withdraw;
use Illuminate\Http\Request;

class WalletApiController extends ApiBaseController
{
    public function index()
    {
        $data['balance'] = ProviderBalance::where('provider_id', auth()->id())
                            ->get(['balance', 'total_balance'])->first();
        $data['withdrawHistories'] = Withdraw::where('provider_id', auth()->id())
            ->with('providerCard:id,card_number,bank_name,cardholder_name')
            ->latest()->get()
            ->makeHidden(['provider_id', 'card_id', 'updated_at']);

        return $this->sendResponse($data);
    }


    public function withdraw(Request $request)
    {
        $providerBalance = ProviderBalance::where('provider_id', auth()->id());
        $balancecount = $providerBalance->first();
        $rowCount = $providerBalance->where('provider_id', auth()->id())->count();

        if ($rowCount == 0) {
            return $this->sendError('You need must complete the service.');
        } else {
            if ($request->amount > $balancecount->balance) {
                return $this->sendError('You do not have sufficient balance.');
            } else {
                $this->validate($request, [
                    'card_id' => 'required',
                    'amount' => 'required'
                ]);
                $data = new Withdraw();
                $data->provider_id = auth()->id();
                $data->card_id = $request->card_id;
                $data->amount = $request->amount;
                $amoundiv = $request->amount;
                if ($amoundiv) {
                    $balance = ProviderBalance::where('provider_id', auth()->id())->first();
                    $balance->balance = $balance->balance - $amoundiv;
                    $balance->save();
                }
                $data->save();
                return $this->sendSuccess('Withdraw Successfull!!');
            }
        }
    }
}

