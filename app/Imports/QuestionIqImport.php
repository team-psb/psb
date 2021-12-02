<?php

namespace App\Imports;

use App\Models\QuestionIq;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class QuestionIqImport implements ToModel, WithStartRow
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
        return new QuestionIq([
            'question' => $row[1],
            'a' => $row[2],
            'b' => $row[3],
            'c' => $row[4],
            'd' => $row[5],
            'e' => $row[6],
            'answer_key' => $row[7]
        ]);
    }
}
