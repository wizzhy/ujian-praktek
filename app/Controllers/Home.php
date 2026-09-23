<?php

namespace App\Controllers;

use App\Models\MenuModel;
use App\Models\CategoryModel;

class Home extends BaseController
{
    protected $menuModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->menuModel     = new MenuModel();
        $this->categoryModel = new CategoryModel();
        helper(['url', 'form']);
    }

    /**
     * Homepage - Modern Restaurant Landing Page
     */
    public function index(): string
    {
        $categories = $this->categoryModel->findAll();
        $featuredMenus = $this->menuModel->where('is_favorite', 1)
                                          ->where('is_available', 1)
                                          ->findAll(6);
        
        $allMenus = $this->menuModel->getMenusWithCategory();

        $data = [
            'title'         => 'Aprilianto\'s Tinutuan - Restoran Bubur Manado Autentik Modern',
            'categories'    => $categories,
            'featuredMenus' => $featuredMenus,
            'allMenus'      => $allMenus,
        ];

        return view('front/home', $data);
    }

    /**
     * Menu Catalog Page with Interactive Filter & Search
     */
    public function menu(): string
    {
        $search = $this->request->getGet('q');
        $categoryId = $this->request->getGet('cat');
        $spiciness = $this->request->getGet('spicy');
        $sort = $this->request->getGet('sort');

        $categories = $this->categoryModel->findAll();
        $menus = $this->menuModel->filterMenus($search, $categoryId, $spiciness);

        // Sorting if requested
        if ($sort === 'price_asc') {
            usort($menus, fn($a, $b) => $a['price'] <=> $b['price']);
        } elseif ($sort === 'price_desc') {
            usort($menus, fn($a, $b) => $b['price'] <=> $a['price']);
        }

        $data = [
            'title'      => 'Katalog Menu - Aprilianto\'s Tinutuan',
            'menus'      => $menus,
            'categories' => $categories,
            'search'     => $search,
            'categoryId' => $categoryId,
            'spiciness'  => $spiciness,
            'sort'       => $sort,
            'total'      => count($menus),
        ];

        return view('front/menu_catalog', $data);
    }

    /**
     * Food Detail Page
     */
    public function detail(string $slug): string
    {
        $menu = $this->menuModel->getMenusWithCategory($slug);

        if (!$menu) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Menu makanan tidak ditemukan.');
        }

        // Get related recommendations
        $relatedMenus = $this->menuModel->where('id !=', $menu['id'])
                                        ->orderBy('is_favorite', 'DESC')
                                        ->limit(3)
                                        ->find();

        $data = [
            'title'        => esc($menu['name']) . ' - Aprilianto\'s Tinutuan',
            'menu'         => $menu,
            'relatedMenus' => $relatedMenus,
        ];

        return view('front/detail', $data);
    }

    /**
     * Fast Order Process with Strict Form Validation
     */
    public function orderProcess()
    {
        $rules = [
            'customer_name' => [
                'rules'  => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required'   => 'Nama pemesan wajib diisi.',
                    'min_length' => 'Nama minimal terdiri dari 3 karakter.',
                ],
            ],
            'whatsapp' => [
                'rules'  => 'required|numeric|min_length[10]|max_length[15]',
                'errors' => [
                    'required'   => 'Nomor WhatsApp wajib diisi.',
                    'numeric'    => 'Nomor WhatsApp harus berupa angka.',
                    'min_length' => 'Nomor WhatsApp minimal 10 digit.',
                ],
            ],
            'menu_id' => [
                'rules'  => 'required|is_not_unique[menus.id]',
                'errors' => [
                    'required'      => 'Menu yang dipesan wajib dipilih.',
                    'is_not_unique' => 'Menu tidak valid.',
                ],
            ],
            'quantity' => [
                'rules'  => 'required|integer|greater_than[0]',
                'errors' => [
                    'required'     => 'Jumlah porsi wajib diisi.',
                    'greater_than' => 'Jumlah porsi minimal 1.',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('order_errors', $this->validator->getErrors());
        }

        $menu = $this->menuModel->find($this->request->getPost('menu_id'));
        $name = $this->request->getPost('customer_name');
        $qty = (int) $this->request->getPost('quantity');
        $total = $qty * (float) $menu['price'];

        $successMsg = "Terima kasih Kak {$name}! Pesanan Anda untuk {$qty}x {$menu['name']} (Total: Rp " . number_format($total, 0, ',', '.') . ") telah kami terima dan sedang dipersiapkan tim dapur kami.";

        return redirect()->back()->with('order_success', $successMsg);
    }
}
