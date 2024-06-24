<?php

namespace App\Imports;

use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProvinsiImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        // foreach ($rows as $row) {
        //     Kabupaten::create([
        //         'id_kabupaten' => (int)$row[0],
        //         'provinsi_id' => $row[1],
        //         'name' => $row[2],
        //     ]);
        // }
        // foreach ($rows as $row) {
        //     Provinsi::create([
        //         'id_provinsi' => (int)$row[0],
        //         'name' => $row[1],
        //     ]);
        // }
        // dd($rows);

        // foreach ($rows as $row) {
        //     Kecamatan::create([
        //         'id_kecamatan' => (int) $row[0],
        //         'kabupaten_id' => (int) $row[1],
        //         'name' => $row[2],
        //     ]);
        // }
        // foreach ($rows as $row) {
        //     Kelurahan::create([
        //         'id_kelurahan' => (int)$row[0],
        //         'kecamatan_id' => (int)$row[1],
        //         'name' => $row[2]
        //     ]);
        // }
        // jika data banyak kita bisa menggunakan proccessing bath
        $batchSize = 1000;
        $dataBatch = [];

        foreach ($rows as $key => $row) {
            // buat array assosiatif untuk setiap baris data
            $dataBatch[] = [
                'id_kelurahan' => (int)$row[0],
                'kecamatan_id' => (int)$row[1],
                'name' => $row[2],
            ];

            // jika ukuran batch mencapai batas, simpan batch ke database
            if (count($dataBatch) >= $batchSize) {
                $this->insertBatch($dataBatch);
                $dataBatch = []; //kosongkan batch setelah disimpan
            }
        };
    }

    protected function insertBatch(array $dataBatch)
    {
        try {
            DB::beginTransaction();
            Kelurahan::insert($dataBatch); //mass insert untuk efisiensi
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e; // 
        }
    }
}
