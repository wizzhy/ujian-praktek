<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MenuModel;
use App\Models\CategoryModel;

class Menu extends BaseController
{
    protected $menuModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->menuModel     = new MenuModel();
        $this->categoryModel = new CategoryModel();
        helper(['form', 'url', 'text']);
    }

    public function index()
    {
        $search = $this->request->getGet('search');
        $categoryId = $this->request->getGet('category_id');

        $menus = $this->menuModel->filterMenus($search, $categoryId);
        $categories = $this->categoryModel->findAll();

        $data = [
            'title'       => 'Kelola Menu Makanan - Admin Tinutuan',
            'menus'       => $menus,
            'categories'  => $categories,
            'search'      => $search,
            'categoryId'  => $categoryId,
            'totalMenus'  => count($menus),
        ];

        return view('admin/menu/index', $data);
    }

    public function create()
    {
        $data = [
            'title'      => 'Tambah Menu Baru - Aprilianto\'s Tinutuan',
            'categories' => $this->categoryModel->findAll(),
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/menu/create', $data);
    }

    public function store()
    {
        $rules = [
            'name' => [
                'rules'  => 'required|min_length[3]|max_length[150]',
                'errors' => [
                    'required'   => 'Nama menu wajib diisi.',
                    'min_length' => 'Nama menu minimal 3 karakter.',
                    'max_length' => 'Nama menu maksimal 150 karakter.',
                ],
            ],
            'category_id' => [
                'rules'  => 'required|is_not_unique[categories.id]',
                'errors' => [
                    'required'      => 'Kategori menu wajib dipilih.',
                    'is_not_unique' => 'Kategori yang dipilih tidak valid.',
                ],
            ],
            'price' => [
                'rules'  => 'required|numeric|greater_than[0]',
                'errors' => [
                    'required'     => 'Harga wajib diisi.',
                    'numeric'      => 'Harga harus berupa angka.',
                    'greater_than' => 'Harga harus lebih dari Rp 0.',
                ],
            ],
            'description' => [
                'rules'  => 'required|min_length[10]',
                'errors' => [
                    'required'   => 'Deskripsi makanan wajib diisi.',
                    'min_length' => 'Deskripsi minimal 10 karakter.',
                ],
            ],
            'ingredients' => [
                'rules'  => 'required|min_length[5]',
                'errors' => [
                    'required'   => 'Komposisi bahan wajib diisi.',
                    'min_length' => 'Komposisi bahan minimal 5 karakter.',
                ],
            ],
            'spiciness_level' => [
                'rules'  => 'permit_empty|in_list[0,1,2,3]',
                'errors' => [
                    'in_list' => 'Tingkat kepedasan harus antara 0 sampai 3.',
                ],
            ],
            'calories' => [
                'rules'  => 'permit_empty|integer',
                'errors' => [
                    'integer' => 'Estimasi kalori harus berupa angka bulat.',
                ],
            ],
            'image' => [
                'rules'  => 'permit_empty|max_size[image,3072]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]',
                'errors' => [
                    'max_size' => 'Ukuran berkas gambar maksimal 3MB.',
                    'is_image' => 'Berkas yang diunggah harus berupa gambar.',
                    'mime_in'  => 'Format gambar harus JPG, JPEG, PNG, atau WEBP.',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $name = $this->request->getPost('name');
        $slug = url_title($name, '-', true);
        
        // Ensure slug is unique
        $checkSlug = $this->menuModel->where('slug', $slug)->first();
        if ($checkSlug) {
            $slug .= '-' . time();
        }

        // Handle Image Upload
        $imageName = 'default_menu.jpg';
        $imageFile = $this->request->getFile('image');

        if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
            $imageName = $imageFile->getRandomName();
            $uploadPath = ROOTPATH . 'public/uploads/menu';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
            $imageFile->move($uploadPath, $imageName);
        } elseif ($this->request->getPost('image_select')) {
            $imageName = $this->request->getPost('image_select');
        }

        $this->menuModel->save([
            'category_id'     => $this->request->getPost('category_id'),
            'name'            => $name,
            'slug'            => $slug,
            'description'     => $this->request->getPost('description'),
            'price'           => $this->request->getPost('price'),
            'spiciness_level' => $this->request->getPost('spiciness_level') ?? 0,
            'ingredients'     => $this->request->getPost('ingredients'),
            'calories'        => $this->request->getPost('calories') ?: 0,
            'is_favorite'     => $this->request->getPost('is_favorite') ? 1 : 0,
            'is_available'    => $this->request->getPost('is_available') ? 1 : 0,
            'image'           => $imageName,
        ]);

        return redirect()->to(base_url('admin/menu'))->with('success', 'Menu "' . esc($name) . '" berhasil ditambahkan!');
    }

    public function edit($id = null)
    {
        $menu = $this->menuModel->find($id);

        if (!$menu) {
            return redirect()->to(base_url('admin/menu'))->with('error', 'Menu makanan tidak ditemukan.');
        }

        $data = [
            'title'      => 'Edit Menu - ' . esc($menu['name']),
            'menu'       => $menu,
            'categories' => $this->categoryModel->findAll(),
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/menu/edit', $data);
    }

    public function update($id = null)
    {
        $menu = $this->menuModel->find($id);

        if (!$menu) {
            return redirect()->to(base_url('admin/menu'))->with('error', 'Menu makanan tidak ditemukan.');
        }

        $rules = [
            'name' => [
                'rules'  => 'required|min_length[3]|max_length[150]',
                'errors' => [
                    'required'   => 'Nama menu wajib diisi.',
                    'min_length' => 'Nama menu minimal 3 karakter.',
                    'max_length' => 'Nama menu maksimal 150 karakter.',
                ],
            ],
            'category_id' => [
                'rules'  => 'required|is_not_unique[categories.id]',
                'errors' => [
                    'required'      => 'Kategori menu wajib dipilih.',
                    'is_not_unique' => 'Kategori yang dipilih tidak valid.',
                ],
            ],
            'price' => [
                'rules'  => 'required|numeric|greater_than[0]',
                'errors' => [
                    'required'     => 'Harga wajib diisi.',
                    'numeric'      => 'Harga harus berupa angka.',
                    'greater_than' => 'Harga harus lebih dari Rp 0.',
                ],
            ],
            'description' => [
                'rules'  => 'required|min_length[10]',
                'errors' => [
                    'required'   => 'Deskripsi makanan wajib diisi.',
                    'min_length' => 'Deskripsi minimal 10 karakter.',
                ],
            ],
            'ingredients' => [
                'rules'  => 'required|min_length[5]',
                'errors' => [
                    'required'   => 'Komposisi bahan wajib diisi.',
                    'min_length' => 'Komposisi bahan minimal 5 karakter.',
                ],
            ],
            'spiciness_level' => [
                'rules'  => 'permit_empty|in_list[0,1,2,3]',
                'errors' => [
                    'in_list' => 'Tingkat kepedasan harus antara 0 sampai 3.',
                ],
            ],
            'calories' => [
                'rules'  => 'permit_empty|integer',
                'errors' => [
                    'integer' => 'Estimasi kalori harus berupa angka bulat.',
                ],
            ],
            'image' => [
                'rules'  => 'permit_empty|max_size[image,3072]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]',
                'errors' => [
                    'max_size' => 'Ukuran berkas gambar maksimal 3MB.',
                    'is_image' => 'Berkas yang diunggah harus berupa gambar.',
                    'mime_in'  => 'Format gambar harus JPG, JPEG, PNG, atau WEBP.',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $name = $this->request->getPost('name');
        $slug = url_title($name, '-', true);

        // Check if slug conflicts with other menu
        $checkSlug = $this->menuModel->where('slug', $slug)->where('id !=', $id)->first();
        if ($checkSlug) {
            $slug .= '-' . time();
        }

        $imageName = $menu['image'];
        $imageFile = $this->request->getFile('image');

        if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
            $imageName = $imageFile->getRandomName();
            $uploadPath = ROOTPATH . 'public/uploads/menu';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
            $imageFile->move($uploadPath, $imageName);

            // Optional: delete old image if stored in uploads
            $oldFilePath = $uploadPath . '/' . $menu['image'];
            if (!empty($menu['image']) && file_exists($oldFilePath)) {
                @unlink($oldFilePath);
            }
        } elseif ($this->request->getPost('image_select')) {
            $imageName = $this->request->getPost('image_select');
        }

        $this->menuModel->update($id, [
            'category_id'     => $this->request->getPost('category_id'),
            'name'            => $name,
            'slug'            => $slug,
            'description'     => $this->request->getPost('description'),
            'price'           => $this->request->getPost('price'),
            'spiciness_level' => $this->request->getPost('spiciness_level') ?? 0,
            'ingredients'     => $this->request->getPost('ingredients'),
            'calories'        => $this->request->getPost('calories') ?: 0,
            'is_favorite'     => $this->request->getPost('is_favorite') ? 1 : 0,
            'is_available'    => $this->request->getPost('is_available') ? 1 : 0,
            'image'           => $imageName,
        ]);

        return redirect()->to(base_url('admin/menu'))->with('success', 'Menu "' . esc($name) . '" berhasil diperbarui!');
    }

    public function delete($id = null)
    {
        $menu = $this->menuModel->find($id);

        if (!$menu) {
            return redirect()->to(base_url('admin/menu'))->with('error', 'Menu makanan tidak ditemukan.');
        }

        // Delete image if exists in uploads
        $filePath = ROOTPATH . 'public/uploads/menu/' . $menu['image'];
        if (!empty($menu['image']) && file_exists($filePath)) {
            @unlink($filePath);
        }

        $this->menuModel->delete($id);

        return redirect()->to(base_url('admin/menu'))->with('success', 'Menu "' . esc($menu['name']) . '" berhasil dihapus!');
    }
}
