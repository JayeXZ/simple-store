<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin Dashboard
        </h2>
    </x-slot>

```
<div class="py-10">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

            <div class="bg-white p-6 rounded-xl shadow">
                <p class="text-sm text-gray-500">Total Orders</p>
                <h3 class="text-2xl font-bold text-indigo-600">{{ $totalOrders }}</h3>
            </div>

            <div class="bg-white p-6 rounded-xl shadow">
                <p class="text-sm text-gray-500">Total Products</p>
                <h3 class="text-2xl font-bold text-green-600">{{ $totalProducts }}</h3>
            </div>

            <div class="bg-white p-6 rounded-xl shadow">
                <p class="text-sm text-gray-500">Customers</p>
                <h3 class="text-2xl font-bold text-yellow-600">{{ $totalUsers }}</h3>
            </div>

            <div class="bg-white p-6 rounded-xl shadow">
                <p class="text-sm text-gray-500">Categories</p>
                <h3 class="text-2xl font-bold text-pink-600">{{ $totalCategories }}</h3>
            </div>

        </div>

        <!-- Revenue -->
        <div class="bg-white p-6 rounded-xl shadow">
            <p class="text-sm text-gray-500">Total Revenue</p>
            <h3 class="text-3xl font-bold text-green-700 mt-2">
                ₱{{ number_format($totalRevenue, 2) }}
            </h3>
        </div>

        <!-- Orders by Status -->
        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="text-lg font-semibold mb-4">Orders by Status</h3>
            <div class="flex flex-wrap gap-4">
                @foreach($ordersByStatus as $status => $count)
                    <div class="px-4 py-2 bg-gray-100 rounded-lg">
                        <span class="font-medium capitalize">{{ $status }}</span>: 
                        <span class="font-bold">{{ $count }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Recent Orders -->
        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="text-lg font-semibold mb-4">Recent Orders</h3>

            <table class="w-full text-sm">
                <thead>
                    <tr class="text-left text-gray-500 border-b">
                        <th class="py-2">Order ID</th>
                        <th>User</th>
                        <th>Status</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentOrders as $order)
                        <tr class="border-b">
                            <td class="py-2">#{{ $order->id }}</td>
                            <td>{{ $order->user->name ?? 'N/A' }}</td>
                            <td class="capitalize">{{ $order->status }}</td>
                            <td>₱{{ number_format($order->total_amount, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Low Stock Products -->
        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="text-lg font-semibold mb-4 text-red-600">
                Low Stock Products
            </h3>

            @if($lowStockProducts->isEmpty())
                <p class="text-gray-500">No low stock products.</p>
            @else
                <ul class="space-y-2">
                    @foreach($lowStockProducts as $product)
                        <li class="flex justify-between bg-red-50 p-3 rounded-lg">
                            <span>{{ $product->name }}</span>
                            <span class="font-bold text-red-600">
                                {{ $product->stock }} left
                            </span>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

    </div>
</div>
```

</x-app-layout>
