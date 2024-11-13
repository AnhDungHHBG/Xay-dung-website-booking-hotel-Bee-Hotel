<div class="p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-bold mb-4 text-center text-gray-800">Quản lý Khuyến mãi</h1>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600">Tên Khuyến mãi</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600">Tỷ lệ giảm giá (%)</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600">Ngày bắt đầu</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600">Ngày kết thúc</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600">Hành động</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php foreach ($promotions as $promotion): ?>
                <tr class="hover:bg-gray-50">
                    <td class="py-3 px-4 text-sm text-gray-700"><?= htmlspecialchars($promotion['promotion_name']) ?></td>
                    <td class="py-3 px-4 text-sm text-gray-700"><?= htmlspecialchars($promotion['discount_rate']) ?></td>
                    <td class="py-3 px-4 text-sm text-gray-700"><?= htmlspecialchars($promotion['start_date']) ?></td>
                    <td class="py-3 px-4 text-sm text-gray-700"><?= htmlspecialchars($promotion['end_date']) ?></td>
                    <td class="py-3 px-4 text-sm">
                        <a href="/admin/promotions/edit/<?= $promotion['promotion_id'] ?>" class="text-blue-500 hover:text-blue-700 hover:underline">Chỉnh sửa</a>
                        <a href="/admin/promotions/delete/<?= $promotion['promotion_id'] ?>" class="ml-2 text-red-500 hover:text-red-700 hover:underline">Xóa</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
