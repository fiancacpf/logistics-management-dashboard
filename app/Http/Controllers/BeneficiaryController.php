<?php

namespace App\Http\Controllers;

use App\Models\Beneficiary;

class BeneficiaryController extends Controller
{

    public function beneficiaryChartData()
    {
        $beneficiaries = Beneficiary::query()
            ->where('type', 1)
            ->select('gender', 'dob')
            ->get();

        $chartData = [
            'labels' => ['0-9', '10-19', '20-29', '30-39', '40-49', '50-59', '60-69', '70+'],
            'male' => array_fill(0, 8, 0),
            'female' => array_fill(0, 8, 0),
        ];

        foreach ($beneficiaries as $beneficiary) {
            if ($beneficiary->dob) {
                $age = \Carbon\Carbon::parse($beneficiary->dob)->age;
                $gender = strtolower($beneficiary->gender);

                $ageRangeIndex = -1;
                if ($age >= 0 && $age <= 9) $ageRangeIndex = 0;
                elseif ($age >= 10 && $age <= 19) $ageRangeIndex = 1;
                elseif ($age >= 20 && $age <= 29) $ageRangeIndex = 2;
                elseif ($age >= 30 && $age <= 39) $ageRangeIndex = 3;
                elseif ($age >= 40 && $age <= 49) $ageRangeIndex = 4;
                elseif ($age >= 50 && $age <= 59) $ageRangeIndex = 5;
                elseif ($age >= 60 && $age <= 69) $ageRangeIndex = 6;
                elseif ($age >= 70) $ageRangeIndex = 7;

                if ($ageRangeIndex !== -1 && isset($chartData[$gender])) {
                    $chartData[$gender][$ageRangeIndex]++;
                }
            }
        }

        return response()->json($chartData);
    }

}
