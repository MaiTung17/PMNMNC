<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('category_id')->nullable(); // Khóa ngoại liên kết danh mục
        $table->string('name');
        $table->string('sku')->nullable(); // Mã sản phẩm
        $table->decimal('price', 15, 2); // Giá bán
        $table->decimal('sale_price', 15, 2)->nullable(); // Giá khuyến mãi
        $table->integer('stock')->default(0); // Tồn kho
        $table->text('description')->nullable();
        $table->string('image')->nullable();
        $table->boolean('is_active')->default(1);
        $table->boolean('is_delete')->default(0); // Xóa mềm
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
