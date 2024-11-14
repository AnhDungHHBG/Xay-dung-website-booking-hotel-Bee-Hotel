<?php
        // Dữ
        $fakeData = [
            'title' => 'Latest on the Property Listing',
            'rooms' => [
                [
                    'image' => './public/images/default-property.jpg',
                    'title' => 'Modern Apartment with Sea View',
                    'address' => '123 Ocean Drive, Miami, FL',
                    'bedrooms' => 2,
                    'bathrooms' => 2,
                    'area' => '1,100',
                    'price' => 2500
                ],
                [
                    'image' => './public/images/default-property.jpg',
                    'title' => 'Luxury Penthouse Downtown',
                    'address' => '456 City Center, New York, NY',
                    'bedrooms' => 3,
                    'bathrooms' => 3,
                    'area' => '2,200',
                    'price' => 4500
                ],
                [
                    'image' => './public/images/default-property.jpg',
                    'title' => 'Cozy Studio in Historic District',
                    'address' => '789 Heritage St, Boston, MA',
                    'bedrooms' => 1,
                    'bathrooms' => 1,
                    'area' => '650',
                    'price' => 1800
                ],
                [
                    'image' => './public/images/default-property.jpg',
                    'title' => 'Family Home with Garden',
                    'address' => '321 Suburban Ave, LA, CA',
                    'bedrooms' => 4,
                    'bathrooms' => 3,
                    'area' => '2,800',
                    'price' => 3500
                ],
                [
                    'image' => './public/images/default-property.jpg',
                    'title' => 'Mountain View Cottage',
                    'address' => '159 Highland Road, Denver, CO',
                    'bedrooms' => 2,
                    'bathrooms' => 2,
                    'area' => '1,400',
                    'price' => 2200
                ],
                [
                    'image' => './public/images/default-property.jpg',
                    'title' => 'Urban Loft Space',
                    'address' => '753 Downtown Blvd, Chicago, IL',
                    'bedrooms' => 1,
                    'bathrooms' => 2,
                    'area' => '1,000',
                    'price' => 2800
                ],
                [
                    'image' => './public/images/default-property.jpg',
                    'title' => 'Beachfront Villa',
                    'address' => '951 Coastal Way, San Diego, CA',
                    'bedrooms' => 5,
                    'bathrooms' => 4,
                    'area' => '3,500',
                    'price' => 6000
                ],
                [
                    'image' => './public/images/default-property.jpg',
                    'title' => 'Contemporary Townhouse',
                    'address' => '357 Modern Lane, Seattle, WA',
                    'bedrooms' => 3,
                    'bathrooms' => 2,
                    'area' => '1,800',
                    'price' => 3200
                ]
                ],

        ];
        ?>

<div>
    <!-- banner -->
    <div class="w-full flex justify-center items-center h-[600px] bg-[#F5F5F5]">
        <span class="text-center">Banner</span>
    </div>
    <div>
    <?php $viewApp->requestComponents('home_page.components.list_card', ['data' => array_merge($fakeData, ['key' => 'carousel1'])]); ?>
    </div>
    <div>
        <?php $viewApp->requestComponents('home_page.components.list_card', ['data' => array_merge($fakeData, ['key' => 'carousel2'])]); ?>
    </div>
    <div>
        <?php $viewApp->requestComponents('home_page.components.list_card', ['data' => array_merge($fakeData, ['key' => 'carousel3'])]); ?>
    </div>
    <div class="container mx-auto my-8 bg-[#F5F5F5] h-[400px] flex justify-between items-center px-5" >
        <div class="max-w-lg ">
            <h1 class="text-5xl font-bold text-gray-800 mb-4">Browse For More Properties</h1>
            <p class="text-gray-600 text-lg mb-8">Explore properties by their categories/types...</p>
            <button class="bg-gray-700 text-white px-8 py-3 rounded-full hover:bg-gray-800 transition-colors">
                Find A Property
            </button>
        </div>
        <div class="text-[200px] font-bold text-gray-300">
            BANNER
        </div>
    </div>
    <div>
        
    </div>
</div>




































<!-- pop up notification promotion -->
<?php
// fake data
$promotion = [
    'promotion_id' => 1,
    'promotion_name' => 'Giảm giá mùa hè',
    'discount_rate' => 20.00,
    'start_date' => '2023-12-01',
    'end_date' => '2023-12-31'
];
?>
<div id="promotion-popup" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 transition-opacity duration-500 ease-out">
    <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6 relative transform transition-transform duration-500 ease-out scale-90 opacity-0">
        <button id="close-popup" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
            <i class="fas fa-times"></i>
        </button>
        <h2 class="text-2xl font-bold mb-4"><?= htmlspecialchars($promotion['promotion_name']) ?></h2>
        <p class="text-gray-700 mb-2">Tỷ lệ giảm giá: <span class="font-semibold"><?= htmlspecialchars($promotion['discount_rate']) ?>%</span></p>
        <p class="text-gray-700 mb-4">Thời gian: <span class="font-semibold"><?= htmlspecialchars($promotion['start_date']) ?></span> đến <span class="font-semibold"><?= htmlspecialchars($promotion['end_date']) ?></span></p>
        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition-colors">
            Xem chi tiết
        </button>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const popup = document.getElementById('promotion-popup');
    const closePopup = document.getElementById('close-popup');
    const popupContent = popup.querySelector('div');

    // Hiển thị popup với hiệu ứng
    setTimeout(() => {
        popup.classList.remove('hidden');
        popup.classList.add('opacity-100');
        popupContent.classList.add('scale-100', 'opacity-100');
    }, 500); 

    closePopup.addEventListener('click', function() {
        popup.classList.add('hidden');
        popup.classList.remove('opacity-100');
        popupContent.classList.remove('scale-100', 'opacity-100');
    });

    popup.addEventListener('click', function(event) {
        if (event.target === popup) {
            popup.classList.add('hidden');
            popup.classList.remove('opacity-100');
            popupContent.classList.remove('scale-100', 'opacity-100');
        }
    });
});
</script>