<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Store</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9fafb;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 40px 20px;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            display: flex;
            gap: 40px;
        }
        .product-image {
            flex: 1;
        }
        .product-image img {
            width: 100%;
            border-radius: 6px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .product-info {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .category {
            display: inline-block;
            font-size: 0.85rem;
            color: #4338ca;
            background-color: #e0e7ff;
            padding: 4px 10px;
            border-radius: 4px;
            margin-bottom: 10px;
        }
        h1 {
            margin: 0 0 15px;
            font-size: 2rem;
        }
        .price {
            font-size: 1.5rem;
            color: #2563eb;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .stock-info {
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        input[type="number"] {
            padding: 8px;
            width: 60px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #4f46e5;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: #4338ca;
        }
    </style>
</head>
<body>

    {{-- Define the fake products and get the current ID from the URL or fallback to the first item --}}
    @php
        $products = [
            1 => (object)[
                'id' => 1,
                'name' => 'Wireless Mouse',
                'description' => 'A smooth and responsive wireless mouse.',
                'price' => 25.99,
                'stock' => 45,
                'category' => 'Electronics',
                'image' => null
            ],
            2 => (object)[
                'id' => 2,
                'name' => 'Mechanical Keyboard',
                'description' => 'A highly responsive mechanical keyboard.',
                'price' => 59.99,
                'stock' => 20,
                'category' => 'Accessories',
                'image' => null
            ],
            3 => (object)[
                'id' => 3,
                'name' => 'Minimalist Backpack',
                'description' => 'A durable and waterproof daily backpack.',
                'price' => 35.50,
                'stock' => 15,
                'category' => 'Fashion',
                'image' => null
            ]
        ];

        // Read the product ID from the route, default to item 1
        $currentId = request()->route('id') ?? 1;
        $product = $products[$currentId] ?? $products[1];
    @endphp

    <div class="container">
        <div class="product-image">
            @if(isset($product->image) && $product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
            @else
                <div style="background: #e5e7eb; padding: 100px 0; text-align: center; border-radius: 6px;">
                    No image available
                </div>
            @endif
        </div>

        <div class="product-info">
            <div>
                <span class="category">
                    {{ $product->category }}
                </span>
                <h1>{{ $product->name }}</h1>
                <p class="price">${{ number_format($product->price, 2) }}</p>
                <p>{{ $product->description }}</p>
            </div>

            <div>
                <div class="stock-info">
                    <strong>Stock Available:</strong> 
                    <span style="color: {{ $product->stock > 0 ? 'green' : 'red' }}">
                        {{ $product->stock > 0 ? $product->stock : 'Out of stock' }}
                    </span>
                </div>

                <form action="#" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <input type="number" 
                               name="quantity" 
                               id="quantity" 
                               value="1" 
                               min="1" 
                               max="{{ $product->stock }}">
                    </div>

                    <button type="submit">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>