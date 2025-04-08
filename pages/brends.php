<div class=" pt-[120px] ">
    <div class=" shadow-lg px-5 py-2 text-[20px] rounded-full fixed top-5 left-[100px]">
        Бренды
    </div>
    <div class="flex flex-wrap px-6 gap-[40px]">
        <div class="neu  rounded-[10px] p-5 px-8 max-w-[400px]">
            <h3 class="text-center text-xl mb-2 font-semibold">Добавить бренд</h3>
            <div class="mb-1">Название бренда</div>
            <input class="block text-black w-full rounded px-3 py-1" type="text" name="name" id="name" />
            <hr class="my-3" />
            <div class="mb-1">Выберите фото</div>
            <label for="img" class="w-[120px] h-[120px] bg-[#666] rounded mx-auto block bg-cover bg-center bg-[url(bg.jpg)] neu"> </label>
            <input onchange="showPicture($(this));" class="hidden" type="file" name="img" id="img" accept="image/*" />
            <hr class="my-3" />
            <div class="btn">Добавить</div>
        </div>
        <div>
            <div class="neu2 rounded-[10px] p-5 flex gap-4 items-center">
                <div>
                    <label for="img2" class="w-[80px] h-[80px] bg-[#666] rounded mx-auto block bg-cover bg-center bg-[url(bg.jpg)] neu"> </label>
                    <input onchange="showPicture($(this));" class="hidden" type="file" name="img2" id="img2" accept="image/*" />
                </div>
                <div>
                    <input class="block text-black w-full rounded px-3 py-1" type="text" name="name" id="name" value="Toyota" />
                </div>
                <div class="btn text-[24px] text-white bg-black rounded-[8px] w-[48px] h-[48px] flex justify-center items-center"><i class="fa-solid fa-floppy-disk"></i></div>
                <div class="btn text-[24px] text-white bg-black rounded-[8px] w-[48px] h-[48px] flex justify-center items-center"><i class="fa-solid fa-trash"></i></div>
            </div>
        </div>
    </div>
</div>