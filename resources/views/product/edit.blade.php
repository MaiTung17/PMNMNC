<!DOCTYPE html>
<html>
<head><title>Sửa Sản phẩm</title></head>
<body>
    <h1>Cập nhật Sản phẩm</h1>
    
    @if($errors->any())
        <div style="color: red;">
            <ul>@foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif

    <form action="{{ route('product.update', $product->id) }}" method="POST">
        @csrf
        <p>
            <label>Tên sản phẩm (*):</label><br>
            <input type="text" name="name" value="{{ $product->name }}" required>
        </p>

        <p>
            <label>Danh mục:</label><br>
            <select name="category_id">
                <option value="">--- Chọn Danh mục ---</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </p>

        <p>
            <label>Giá bán (*):</label><br>
            <input type="number" name="price" value="{{ $product->price }}" min="0" step="0.01" required>
        </p>

        <p>
            <label>Giá khuyến mãi (nếu có):</label><br>
            <input type="number" name="sale_price" value="{{ $product->sale_price }}" min="0" step="0.01">
        </p>

        <p>
            <label>Tồn kho (*):</label><br>
            <input type="number" name="stock" value="{{ $product->stock }}" min="0" required>
        </p>

        <button type="submit">Cập nhật sản phẩm</button>
    </form>
</body>
</html>