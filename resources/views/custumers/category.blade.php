 <div class="container flex justify-between py-4">
     <div class="flex items-center gap-3">
         <a href="index.html" class="text-base text-primary">
             <i class="fas fa-home"></i>
         </a>
         <span class="text-sm text-gray-400"><i class="fas fa-chevron-right"></i></span>
         <p class="font-medium text-gray-600">Shop</p>
     </div>
 </div>
 <!-- breadcrum end -->

 <!-- shop wrapper -->
 <div class="container relative grid items-start gap-6 pt-4 pb-16 lg:grid-cols-4">
     <!-- sidebar -->
      <div
         class="absolute z-10 col-span-1 px-4 pt-4 pb-6 overflow-hidden bg-white rounded shadow lg:static left-4 top-16 w-72 lg:w-full lg:block">
         <div class="relative space-y-5 divide-y divide-gray-200">
          
             <div class="relative">
                 <div class="absolute top-0 right-0 text-lg text-gray-400 cursor-pointer lg:hidden hover:text-primary">
                     <i class="fas fa-times"></i>
                 </div>
                 <h3 class="mb-3 text-xl font-medium text-gray-800 uppercase">Categories</h3>
                 <div class="space-y-2">
                     <!-- single category -->
                     <div class="flex items-center">
                         <input type="checkbox" id="Bedroom"
                             class="rounded-sm cursor-pointer text-primary focus:ring-0">
                         <label for="Bedroom" class="ml-3 text-gray-600 cursor-pointer">Bedroom</label>
                         <div class="ml-auto text-sm text-gray-600">(15)</div>
                     </div>
                     <!-- single category end -->
                     <!-- single category -->
                     <div class="flex items-center">
                         <input type="checkbox" id="Sofa" class="rounded-sm cursor-pointer text-primary focus:ring-0">
                         <label for="Sofa" class="ml-3 text-gray-600 cursor-pointer">Sofa</label>
                         <div class="ml-auto text-sm text-gray-600">(05)</div>
                     </div>
                     <!-- single category end -->
                     <!-- single category -->
                     <div class="flex items-center">
                         <input type="checkbox" id="Office" class="rounded-sm cursor-pointer text-primary focus:ring-0">
                         <label for="Office" class="ml-3 text-gray-600 cursor-pointer">Office</label>
                         <div class="ml-auto text-sm text-gray-600">(09)</div>
                     </div>
                     <!-- single category end -->
                     <!-- single category -->
                     <div class="flex items-center">
                         <input type="checkbox" id="Outdoor"
                             class="rounded-sm cursor-pointer text-primary focus:ring-0">
                         <label for="Outdoor" class="ml-3 text-gray-600 cursor-pointer">Outdoor</label>
                         <div class="ml-auto text-sm text-gray-600">(19)</div>
                     </div>
                     <!-- single category end -->
                 </div>
             </div>
             <!-- category filter end -->
             <!-- brand filter -->
             <div class="pt-4">
                 <h3 class="mb-3 text-xl font-medium text-gray-800 uppercase">Brands</h3>
                 <div class="space-y-2">
                     <!-- single brand name -->
                     <div class="flex items-center">
                         <input type="checkbox" id="Dominik"
                             class="rounded-sm cursor-pointer text-primary focus:ring-0">
                         <label for="Dominik" class="ml-3 text-gray-600 cursor-pointer">Dominik</label>
                         <div class="ml-auto text-sm text-gray-600">(15)</div>
                     </div>
                    
                 </div>
             </div>
             <!-- brand filter end -->
             <!-- price filter -->
             <div class="pt-4">
                 <h3 class="mb-3 text-xl font-medium text-gray-800 uppercase">Price</h3>
                 <div class="flex items-center mt-4">
                     <input type="text"
                         class="w-full px-3 py-1 text-sm text-gray-600 border-gray-300 rounded shadow-sm focus:ring-0 focus:border-primary"
                         placeholder="min">
                     <span class="mx-3 text-gray-500">-</span>
                     <input type="text"
                         class="w-full px-3 py-1 text-sm text-gray-600 border-gray-300 rounded shadow-sm focus:ring-0 focus:border-primary"
                         placeholder="mix">
                 </div>
             </div>
             <!-- price filter end -->
             <!-- size filter -->
             <div class="pt-4">
                 <h3 class="mb-3 text-xl font-medium text-gray-800 uppercase">size</h3>
                 <div class="flex items-center gap-2">
                     <!-- single size -->
                     <div class="size-selector">
                         <input type="radio" name="size" class="hidden" id="size-xs">
                         <label for="size-xs"
                             class="flex items-center justify-center w-6 h-6 text-xs text-gray-600 border border-gray-200 rounded-sm shadow-sm cursor-pointer">
                             XS
                         </label>
                     </div>
                     <!-- single size end -->
                     <!-- single size -->
                     <div class="size-selector">
                         <input type="radio" name="size" class="hidden" id="size-s">
                         <label for="size-s"
                             class="flex items-center justify-center w-6 h-6 text-xs text-gray-600 border border-gray-200 rounded-sm shadow-sm cursor-pointer">
                             S
                         </label>
                     </div>
                     <!-- single size end -->
                     <!-- single size -->
                     <div class="size-selector">
                         <input type="radio" name="size" class="hidden" id="size-m" checked>
                         <label for="size-m"
                             class="flex items-center justify-center w-6 h-6 text-xs text-gray-600 border border-gray-200 rounded-sm shadow-sm cursor-pointer">
                             M
                         </label>
                     </div>
                     <!-- single size end -->
                     <!-- single size -->
                     <div class="size-selector">
                         <input type="radio" name="size" class="hidden" id="size-l">
                         <label for="size-l"
                             class="flex items-center justify-center w-6 h-6 text-xs text-gray-600 border border-gray-200 rounded-sm shadow-sm cursor-pointer">
                             L
                         </label>
                     </div>
                     <!-- single size end -->
                     <!-- single size -->
                     <div class="size-selector">
                         <input type="radio" name="size" class="hidden" id="size-xl">
                         <label for="size-xl"
                             class="flex items-center justify-center w-6 h-6 text-xs text-gray-600 border border-gray-200 rounded-sm shadow-sm cursor-pointer">
                             XL
                         </label>
                     </div>
                     <!-- single size end -->
                 </div>
             </div>
             <!-- size filter end -->
             <!-- color filter -->
             <div class="pt-4">
                 <h3 class="mb-3 text-xl font-medium text-gray-800 uppercase">color</h3>
                 <div class="flex items-center gap-2">
                     <!-- single color -->
                     <div class="color-selector">
                         <input type="radio" name="color" class="hidden" id="color-red" checked>
                         <label for="color-red" style="background-color : #fc3d57"
                             class="flex items-center justify-center w-5 h-5 text-xs border border-gray-200 rounded-sm shadow-sm cursor-pointer">
                         </label>
                     </div>
                     <!-- single color end -->
                     <!-- single color -->
                     <div class="color-selector">
                         <input type="radio" name="color" class="hidden" id="color-white">
                         <label for="color-white" style="background-color : #fff"
                             class="flex items-center justify-center w-5 h-5 text-xs border border-gray-200 rounded-sm shadow-sm cursor-pointer">
                         </label>
                     </div>
                     <!-- single color end -->
                     <!-- single color -->
                     <div class="color-selector">
                         <input type="radio" name="color" class="hidden" id="color-black">
                         <label for="color-black" style="background-color : #000"
                             class="flex items-center justify-center w-5 h-5 text-xs border border-gray-200 rounded-sm shadow-sm cursor-pointer">
                         </label>
                     </div>
                     <!-- single color end -->
                 </div>
             </div>
             <!-- color filter end --> 
         </div>
     </div> 
     <!-- sidebar end -->
     <div class="col-span-3">
         <!-- sorting -->
         <div class="flex items-center mb-4">
             <button="showFilter=!showFilter"
                 class="px-10 py-3 mr-3 text-sm font-medium text-white uppercase transition border rounded bg-primary border-primary hover:bg-transparent hover:text-primary lg:hidden focus:outline-none">
                 Filter
                 </button>
                 <select
                     class="px-4 py-3 text-sm text-gray-600 border-gray-300 rounded shadow-sm w-44 focus:ring-primary focus:border-primary">
                     <option>Default sorting</option>
                     <option>Price low-high</option>
                     <option>Price high-low</option>
                     <option>Latest product</option>
                 </select>
                 <div class="flex gap-2 ml-auto">
                     <div
                         class="flex items-center justify-center w-10 text-white border rounded cursor-pointer border-primary h-9 bg-primary">
                         <i class="fas fa-th"></i>
                     </div>
                     <div
                         class="flex items-center justify-center w-10 text-gray-600 border border-gray-300 rounded cursor-pointer h-9">
                         <i class="fas fa-list"></i>
                     </div>
                 </div>
         </div>
         <!-- sorting end -->
         <!-- product wrapper -->
         <div class="grid gap-6 lg:grid-cols-2 xl:grid-cols-3 sm:grid-cols-2">
             <!-- single product -->

             @foreach ($products as $product)
                 <div class="overflow-hidden bg-white rounded shadow group">
                     <!-- product image -->
                     <div class="relative">
                         <img src="{{ $product->image }}" class="w-full">
                         <div
                             class="absolute inset-0 flex items-center justify-center gap-2 transition bg-black opacity-0 bg-opacity-40 group-hover:opacity-100">
                             <a href="{{ url('category/' . $category->name . '/' . $product->name) }}"
                                 class="flex items-center justify-center text-lg text-white transition rounded-full w-9 h-9 bg-primary hover:bg-gray-800">
                                 <i class="fas fa-search"></i>
                             </a>
                             <a href="#"
                                 class="flex items-center justify-center text-lg text-white transition rounded-full w-9 h-9 bg-primary hover:bg-gray-800">
                                 <i class="far fa-heart"></i>
                             </a>
                         </div>
                     </div>
                     <!-- product image end -->
                     <!-- product content -->
                     <div class="px-4 pt-4 pb-3">
                         <a href="{{ url('category/' . $category->name . '/' . $product->name) }}">
                             <h4
                                 class="mb-2 text-xl font-medium text-gray-800 uppercase transition hover:text-primary">
                                 {{ $product->name }}
                             </h4>
                         </a>
                         <div class="flex items-baseline mb-1 space-x-2">
                             <p class="text-xl font-semibold text-primary font-roboto">${{ $product->price }}</p>
                             <p class="text-sm text-gray-400 line-through font-roboto">${{ $product->price }}</p>
                         </div>
                         <div class="flex items-center">
                             <div class="flex gap-1 text-sm text-yellow-400">
                                 @for ($i = 0; $i < 5; $i++)
                                     <span:key="n"><i class="fas fa-star"></i></span>
                                 @endfor
                             </div>
                             <div class="ml-3 text-xs text-gray-500">(150)</div>
                         </div>
                     </div>
                     <!-- product content end -->
                   
                 </div>
             @endforeach
             <!-- single product end -->
         </div>
         <!-- product wrapper end -->
     </div>
     <!-- products end -->
 </div>
 <!-- shop wrapper end -->
