<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MenuGroup;
use App\Models\MenuItem;

class MenuGeneralSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $general = MenuGroup::create([
            'name' => 'General',
            'permission_name' => 'general',
            'posision' => 1,
        ]);

        MenuItem::create([
            'name' => 'Dashboard',
            'icon' => 'ri-dashboard-2-line',
            'route' => 'dashboard.index',
            'permission_name' => 'dashboard_index',
            'menu_group_id' => $general->id,
            'posision' => 1,
        ]);
        MenuItem::create([
            'name' => 'Author Management',
            'icon' => 'ri-user-star-line',
            'route' => 'author.index',
            'permission_name' => 'author_index',
            'menu_group_id' => $general->id,
            'posision' => 2,
        ]);
        MenuItem::create([
            'name' => 'Book Management',
            'icon' => 'ri-book-3-fill',
            'route' => 'book.index',
            'permission_name' => 'book_index',
            'menu_group_id' => $general->id,
            'posision' => 3,
        ]);
    }
}
