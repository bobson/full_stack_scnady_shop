<?php

namespace App\Service;

class PriceService
{
    public function processPrices(array &$product, array $row)
    {
        if (!empty($row['amount'])) {
            $product['prices'] = [
                'amount' => $row['amount'],
                'currency_label' => $row['currency_label'],
                'currency_symbol' => $row['currency_symbol']
            ];
        }
    }
}
