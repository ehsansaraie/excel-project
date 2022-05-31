<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;

class SymbolsImport implements ToCollection
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function collection(Collection $rows)
    {
        $insert_data = [];
        foreach ($rows as $row) {
            if (is_string($row[0]) && is_int($row[2])) {
                $insert_data[] = [
                    'symbol'                      => $row[0],
                    'name'                        => $row[1],
                    'number'                      => $row[2],
                    'volume'                      => $row[3],
                    'value'                       => $row[4],
                    'price_yesterday'             => $row[5],
                    'price_first'                 => $row[6],
                    'last_transaction_amount'     => $row[7],
                    'last_transaction_changed'    => $row[8],
                    'last_transaction_percentage' => $row[9],
                    'final_price_amount'          => $row[10],
                    'final_price_change'          => $row[11],
                    'final_price_percentage'      => $row[12],
                    'price_least'                 => $row[13],
                    'price_most'                  => $row[14],
                ];
            }
        }

        return DB::table('symbols')->insert($insert_data);
    }
}
