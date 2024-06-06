<?php

namespace Admin;

use App\Models\Admin;
use App\Models\Category;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ItemsTest extends TestCase
{

    public function testItem(){

        $this->actingAs(Admin::first(), 'admin');

        //Create category
        $response = $this->post('/api/admin/categories/add', [
            'name' => 'Test category'
        ]);

        $response->assertJson(['status' => true]);

        $category = $response->json('response');

        //Create item
        $response = $this->post('/api/admin/items/add', [
            'name' => 'Test',
            'description' => 'Test',
            'category_id' => Category::first()->id
        ]);

        $response->assertJson(['status' => true]);

        $response->dump();

        $item = $response->json('response');

        //Edit
        $response = $this->post('/api/admin/items/edit/' . $item['id'], [
            'name' => 'Test2',
            'description' => 'Test2'
        ]);

        $response->assertJson(['status' => true]);

        //Change status
        $response = $this->post('/api/admin/items/change-status/' . $item['id'] . '/0');
        $response->assertJson(['status' => true]);

        //Upload photo
        $file = UploadedFile::fake()->image('test_image.jpg', 100, 100)->size(100);

        $response = $this->post('/api/admin/items/upload-picture/' . $item['id'], [
            'picture' => $file,
        ]);

        $response->assertJson(['status' => true]);

        //List
        $response = $this->post('/api/admin/items/list', ['page' => 1]);
        $response->assertJson(['status' => true]);
        $response->dump();

    }

}
