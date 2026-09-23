<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table            = 'menus';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'category_id',
        'name',
        'slug',
        'description',
        'price',
        'spiciness_level',
        'ingredients',
        'calories',
        'is_favorite',
        'is_available',
        'image',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules = [
        'category_id'     => 'required|is_not_unique[categories.id]',
        'name'            => 'required|min_length[3]|max_length[150]',
        'slug'            => 'required|max_length[150]|is_unique[menus.slug,id,{id}]',
        'description'     => 'required|min_length[10]',
        'price'           => 'required|numeric|greater_than[0]',
        'spiciness_level' => 'permit_empty|integer|greater_than_equal_to[0]|less_than_equal_to[3]',
        'ingredients'     => 'required|min_length[5]',
    ];

    protected $validationMessages = [
        'name' => [
            'required'   => 'Nama menu wajib diisi.',
            'min_length' => 'Nama menu minimal terdiri dari 3 karakter.',
        ],
        'category_id' => [
            'required'      => 'Kategori menu wajib dipilih.',
            'is_not_unique' => 'Kategori yang dipilih tidak valid.',
        ],
        'description' => [
            'required'   => 'Deskripsi makanan wajib diisi.',
            'min_length' => 'Deskripsi minimal 10 karakter.',
        ],
        'price' => [
            'required'     => 'Harga makanan wajib diisi.',
            'numeric'      => 'Harga harus berupa angka.',
            'greater_than' => 'Harga harus lebih besar dari Rp 0.',
        ],
        'ingredients' => [
            'required'   => 'Komposisi bahan makanan wajib diisi.',
            'min_length' => 'Komposisi bahan minimal 5 karakter.',
        ],
    ];

    /**
     * Get menu along with category details
     */
    public function getMenusWithCategory($slug = null)
    {
        $builder = $this->select('menus.*, categories.name as category_name, categories.slug as category_slug')
                        ->join('categories', 'categories.id = menus.category_id', 'left');

        if ($slug !== null) {
            return $builder->where('menus.slug', $slug)->first();
        }

        return $builder->orderBy('menus.is_favorite', 'DESC')
                       ->orderBy('menus.id', 'ASC')
                       ->findAll();
    }

    /**
     * Filter menus by search keyword, category, and spiciness level
     */
    public function filterMenus($search = null, $categoryId = null, $spiciness = null)
    {
        $builder = $this->select('menus.*, categories.name as category_name, categories.slug as category_slug')
                        ->join('categories', 'categories.id = menus.category_id', 'left');

        if (!empty($search)) {
            $builder->groupStart()
                    ->like('menus.name', $search)
                    ->orLike('menus.description', $search)
                    ->orLike('menus.ingredients', $search)
                    ->groupEnd();
        }

        if (!empty($categoryId) && $categoryId !== 'all') {
            $builder->where('menus.category_id', $categoryId);
        }

        if ($spiciness !== null && $spiciness !== '' && $spiciness !== 'all') {
            $builder->where('menus.spiciness_level', (int) $spiciness);
        }

        return $builder->orderBy('menus.is_favorite', 'DESC')
                       ->orderBy('menus.id', 'ASC')
                       ->findAll();
    }
}
