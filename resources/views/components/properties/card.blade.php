<div class="flex bg-white rounded-xl drop-shadow-sm hover:drop-shadow-xl transition-all space-x-4 px-6 py-4">
    <div class="relative w-2/12">
        <div class="absolute top-2 right-2 text-white hover:text-red-600 transition-all">
            @include('icons.heart', ['attributes' => 'h-8 w-8 cursor-pointer', 'fill' => '#ff000033'])
        </div>
        <img src="https://images.unsplash.com/photo-1523217582562-09d0def993a6" alt="" class="rounded-xl">
    </div>
    <div class="w-8/12">
        <div class="flex items-center space-x-3">
            <h2 class="text-2xl font-semibold">Lorem ipsum dolor sit amet</h2>
            <div class="flex">
                @include('icons.star', ['attributes' => 'h-6 w-6 text-yellow-500', 'fill' => '#ffff00'])
                @include('icons.star', ['attributes' => 'h-6 w-6 text-yellow-500', 'fill' => '#ffff00'])
                @include('icons.star', ['attributes' => 'h-6 w-6 text-yellow-500', 'fill' => '#ffff00'])
                @include('icons.star', ['attributes' => 'h-6 w-6 text-yellow-500', 'fill' => '#ffff00'])
                @include('icons.star', ['attributes' => 'h-6 w-6 text-yellow-500', 'fill' => 'none'])
            </div>
        </div>
        <div class="flex text-sm text-gray-800 my-2">
            <p>City</p>
            <span class="mx-2">&bull;</span>
            <p>Show on map</p>
            <span class="mx-2">&bull;</span>
            <p>1.1km from city center</p>
            <span class="mx-2">&bull;</span>
            <!-- Optional -->
            <p>Nearby place</p>
        </div>
        <div class="flex items-center space-x-2 my-2">
            @include('icons.building', ['attributes' => 'w-6 h-6'])
            <p>900 m  from Skopje</p>
        </div>
        <p class="line-clamp-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem in molestiae molestias placeat porro soluta tempore? Aliquid dolores, enim, excepturi incidunt inventore ipsam iste labore nostrum, pariatur placeat quaerat quidem sed voluptas! A ab illum ipsum mollitia nisi reprehenderit veniam. Commodi consequatur debitis dolor iusto quos tempore veritatis vitae! Adipisci architecto asperiores aspernatur consequuntur debitis dicta dolor dolores doloribus earum eos error esse eum exercitationem expedita hic, id labore magnam molestiae molestias mollitia necessitatibus nisi non obcaecati quam quasi quibusdam recusandae sequi, sint sit sunt tenetur velit vero voluptate. Culpa cumque doloribus exercitationem molestiae nesciunt rem tempora. Assumenda, at cupiditate dolore dolorem ducimus enim est ex exercitationem fugit id illo laboriosam magnam maiores modi nam, non, officia provident quaerat qui quos reiciendis sed sint voluptatem! Adipisci dolorem, earum eligendi necessitatibus possimus quidem vero. Accusantium architecto asperiores beatae commodi consequuntur cumque, deleniti dolor dolore doloribus error esse excepturi harum hic id illum impedit in iusto maxime minima modi mollitia nulla odit officia quas quo reiciendis rem sapiente sed sequi similique sit tempore ut veritatis. Ducimus, eaque earum est ex laboriosam nisi nobis odit officiis, possimus quas quisquam suscipit temporibus. Adipisci autem distinctio dolorum eos eum exercitationem magni nam quisquam quos reiciendis.</p>
    </div>
    <div class="flex flex-col justify-items-end w-2/12">
        <div class="flex flex-row justify-end items-center space-x-3">
            <div class="flex flex-col text-right">
                <span class="font-bold text-xl -mb-1">Exceptional</span>
                <span class="text-sm">474 reviews</span>
            </div>
            <div class="bg-blue-600 text-white font-bold text-2xl p-3 rounded-xl">9.6</div>
        </div>
        <span class="text-right mt-2 mb-6">Location 9.7</span>
        <div class="flex justify-end">
            <button class="bg-blue-600 hover:bg-blue-700 transition-all text-white rounded-md w-fit px-4 py-2">Show prices</button>
        </div>
    </div>
</div>
