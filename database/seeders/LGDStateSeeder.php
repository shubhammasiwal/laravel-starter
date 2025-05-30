<?php

namespace Database\Seeders;

use App\Models\LGDState;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Storage;
use League\Csv\Reader;
use PhpOffice\PhpSpreadsheet\IOFactory;

class LGDStateSeeder extends Seeder
{

    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = [
            [
                'l_g_d_code' => 35,
                'name_en' => 'Andaman And Nicobar Islands',
                'name_local' => 'ANDAMAN AND NICOBAR ISLANDS',
                'type' => 'union_territory',
            ],
            [
                'l_g_d_code' => 28,
                'name_en' => 'Andhra Pradesh',
                'name_local' => 'ANDHRA PRADESH',
                'type' => 'state',
            ],
            [
                'l_g_d_code' => 12,
                'name_en' => 'Arunachal Pradesh',
                'name_local' => 'ARUNACHAL PRADESH',
                'type' => 'state',
            ],
            [
                'l_g_d_code' => 18,
                'name_en' => 'Assam',
                'name_local' => 'ASSAM',
                'type' => 'state',
            ],
            [
                'l_g_d_code' => 10,
                'name_en' => 'Bihar',
                'name_local' => 'BIHAR',
                'type' => 'state',
            ],
            [
                'l_g_d_code' => 4,
                'name_en' => 'Chandigarh',
                'name_local' => 'CHANDIGARH',
                'type' => 'union_territory',
            ],
            [
                'l_g_d_code' => 22,
                'name_en' => 'Chhattisgarh',
                'name_local' => 'छत्तीसगढ़',
                'type' => 'state',
            ],
            [
                'l_g_d_code' => 7,
                'name_en' => 'Delhi',
                'name_local' => 'DELHI',
                'type' => 'union_territory',
            ],
            [
                'l_g_d_code' => 30,
                'name_en' => 'Goa',
                'name_local' => 'GOA',
                'type' => 'state',
            ],
            [
                'l_g_d_code' => 24,
                'name_en' => 'Gujarat',
                'name_local' => 'GUJARAT',
                'type' => 'state',
            ],
            [
                'l_g_d_code' => 6,
                'name_en' => 'Haryana',
                'name_local' => 'HARYANA',
                'type' => 'state',
            ],
            [
                'l_g_d_code' => 2,
                'name_en' => 'Himachal Pradesh',
                'name_local' => 'HIMACHAL PRADESH',
                'type' => 'state',
            ],
            [
                'l_g_d_code' => 1,
                'name_en' => 'Jammu And Kashmir',
                'name_local' => 'JAMMU AND KASHMIR',
                'type' => 'union_territory',
            ],
            [
                'l_g_d_code' => 20,
                'name_en' => 'Jharkhand',
                'name_local' => 'झारखंड',
                'type' => 'state',
            ],
            [
                'l_g_d_code' => 29,
                'name_en' => 'Karnataka',
                'name_local' => 'ಕರ್ನಾಟಕ',
                'type' => 'state',
            ],
            [
                'l_g_d_code' => 32,
                'name_en' => 'Kerala',
                'name_local' => 'KERALA',
                'type' => 'state',
            ],
            [
                'l_g_d_code' => 37,
                'name_en' => 'Ladakh',
                'name_local' => 'Ladakh',
                'type' => 'union_territory',
            ],
            [
                'l_g_d_code' => 31,
                'name_en' => 'Lakshadweep',
                'name_local' => 'LAKSHADWEEP',
                'type' => 'union_territory',
            ],
            [
                'l_g_d_code' => 23,
                'name_en' => 'Madhya Pradesh',
                'name_local' => 'MADHYA PRADESH',
                'type' => 'state',
            ],
            [
                'l_g_d_code' => 27,
                'name_en' => 'Maharashtra',
                'name_local' => 'महाराष्ट्र',
                'type' => 'state',
            ],
            [
                'l_g_d_code' => 14,
                'name_en' => 'Manipur',
                'name_local' => 'MANIPUR',
                'type' => 'state',
            ],
            [
                'l_g_d_code' => 17,
                'name_en' => 'Meghalaya',
                'name_local' => 'MEGHALAYA',
                'type' => 'state',
            ],
            [
                'l_g_d_code' => 15,
                'name_en' => 'Mizoram',
                'name_local' => 'MIZORAM',
                'type' => 'state',
            ],
            [
                'l_g_d_code' => 13,
                'name_en' => 'Nagaland',
                'name_local' => 'NAGALAND',
                'type' => 'state',
            ],
            [
                'l_g_d_code' => 21,
                'name_en' => 'Odisha',
                'name_local' => 'ODISHA',
                'type' => 'state',
            ],
            [
                'l_g_d_code' => 34,
                'name_en' => 'Puducherry',
                'name_local' => 'PUDUCHERRY',
                'type' => 'union_territory',
            ],
            [
                'l_g_d_code' => 3,
                'name_en' => 'Punjab',
                'name_local' => 'PUNJAB',
                'type' => 'state',
            ],
            [
                'l_g_d_code' => 8,
                'name_en' => 'Rajasthan',
                'name_local' => 'RAJASTHAN',
                'type' => 'state',
            ],
            [
                'l_g_d_code' => 11,
                'name_en' => 'Sikkim',
                'name_local' => 'SIKKIM',
                'type' => 'state',
            ],
            [
                'l_g_d_code' => 33,
                'name_en' => 'Tamil Nadu',
                'name_local' => 'TAMIL NADU',
                'type' => 'state',
            ],
            [
                'l_g_d_code' => 36,
                'name_en' => 'Telangana',
                'name_local' => 'తెలంగాణ',
                'type' => 'state',
            ],
            [
                'l_g_d_code' => 38,
                'name_en' => 'The Dadra And Nagar Haveli And Daman And Diu',
                'name_local' => 'THE DADRA AND NAGAR HAVELI AND DAMAN AND DIU',
                'type' => 'union_territory',
            ],
            [
                'l_g_d_code' => 16,
                'name_en' => 'Tripura',
                'name_local' => 'ত্রিপুরা',
                'type' => 'state',
            ],
            [
                'l_g_d_code' => 5,
                'name_en' => 'Uttarakhand',
                'name_local' => 'UTTARAKHAND',
                'type' => 'state',
            ],
            [
                'l_g_d_code' => 9,
                'name_en' => 'Uttar Pradesh',
                'name_local' => 'UTTAR PRADESH',
                'type' => 'state',
            ],
            [
                'l_g_d_code' => 19,
                'name_en' => 'West Bengal',
                'name_local' => 'WEST BENGAL',
                'type' => 'state',
            ],
        ];

        foreach ($states as $state) {
            LGDState::updateOrCreate(
                ['l_g_d_code' => $state['l_g_d_code']],
                [
                    'name_en' => $state['name_en'],
                    'name_local' => $state['name_local'],
                    'type' => $state['type'],
                ]
            );
        }
    }
}
