<?php

namespace App\Imports;

use App\Models\QuestionPersonal;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class QuestionPersonalImport implements ToModel,WIthStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function startRow(): int
    {
        return 2;
    }
    
    public function model(array $row)
    {
        return new QuestionPersonal([
            'question' => $row[1],
            'a' => $row[2],
            'b' => $row[3],
            'c' => $row[4],
            'd' => $row[5],
            'e' => $row[6],
            'poin_a' => $row[7],
            'poin_b' => $row[7],
            'poin_c' => $row[7],
            'poin_d' => $row[7],
            'poin_e' => $row[7]
        ]);
    }
}
