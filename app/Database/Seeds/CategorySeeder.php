<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id'          => 1,
                'name'        => 'Tinutuan Spesial',
                'slug'        => 'tinutuan-spesial',
                'description' => 'Menu utama Tinutuan (Bubur Manado) kaya sayuran segar dan rempah alami khas Minahasa',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'id'          => 2,
                'name'        => 'Paket Komplit Manado',
                'slug'        => 'paket-komplit-manado',
                'description' => 'Paket komplit Tinutuan dipadu cakalang fufu, perkedel jagung hangat, dan sambal roa',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'id'          => 3,
                'name'        => 'Gorengan & Pelengkap',
                'slug'        => 'gorengan-pelengkap',
                'description' => 'Camilan dan pelengkap gurih renyah khas Sulawesi Utara',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'id'          => 4,
                'name'        => 'Minuman & Dessert',
                'slug'        => 'minuman-dessert',
                'description' => 'Pelepas dahaga manis segar dan dessert legendaris khas Manado',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('categories')->insertBatch($data);
    }
}
