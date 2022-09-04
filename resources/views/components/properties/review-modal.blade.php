<div class="backdrop-blur-sm bg-opacity-20 bg-gray-200 fixed inset-0"
     @keyup.escape.window="reviewModal = false"
     x-cloak>
    <div class="flex items-center justify-center w-full h-full">
        <div
            x-show="reviewModal"
            x-transition
            @click.outside="reviewModal = false"
            class="bg-white shadow-2xl relative m-auto rounded-xl w-2/5 px-6 py-4">
            <div class="flex justify-between mb-3 mr-8">
                <div class="flex items-center space-x-3 mb-3">
                    <div
                        class="flex rounded-full bg-purple-600 text-white font-semibold items-center justify-center text-xl w-12 h-12">
                        I
                    </div>
                    <div class="">
                        <p class="font-lg font-semibold text-gray-900">Iva</p>
                        <p class="text-sm text-gray-600 -mt-1">Macedonia</p>
                    </div>
                </div>
                <div class="flex flex-row items-center space-x-3">
                    <div>
                        <span class="font-bold text-lg -mb-3">Exceptional</span>
                        <p class="text-sm text-right text-gray-700">12 hours ago</p>
                    </div>
                    <div class="bg-blue-600 text-white font-bold p-2 rounded-lg">9.6</div>
                </div>
            </div>
            <p class="mr-2">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid delectus dolorem iste itaque placeat
                provident reprehenderit veniam? Adipisci cum et fugit impedit nam. Adipisci et eum eveniet facilis fugit
                laboriosam obcaecati odio rem. Adipisci atque blanditiis, consequatur cumque cupiditate eaque, eos magni
                nisi nobis obcaecati qui quibusdam ratione recusandae rem reprehenderit sit vero voluptatem, voluptatibus.
                Ad assumenda, eos est exercitationem expedita hic iusto libero molestiae quis, quos reiciendis repudiandae
                tempore ut vel voluptatibus? Assumenda, atque consequuntur corporis dolor doloremque eaque harum ipsa iste
                iure labore nisi odit officia possimus quisquam velit, veritatis voluptas? Aliquid animi, aperiam deserunt,
                eaque error maiores perspiciatis placeat, praesentium quasi recusandae repellendus repudiandae! Accusantium
                at autem commodi, corporis cupiditate deleniti dicta distinctio eum expedita id illo ipsa ipsam itaque
                laborum maiores, minima officiis provident repellendus sequi sit ullam veritatis voluptatibus! Aliquid
                exercitationem nesciunt officia quisquam, sapiente temporibus velit? Aperiam aut eos et expedita inventore
                ipsum maxime quidem recusandae similique ullam! Aliquam beatae consequatur ipsam magnam magni officiis quia,
                quibusdam repudiandae sint?
            </p>
            <button
                @click="reviewModal = false"
                class="absolute top-3 right-3 p-1 hover:bg-gray-100 transition">
                @include('icons.x-mark', ['attributes' => 'w-6 h-6'])
            </button>
        </div>
    </div>
</div>
