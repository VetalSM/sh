<div x-data="{ open: false, selectedOption: '' }" x-init="checkModalStatus()" style="display: none;">
    <div x-show="open" class="fixed inset-0 flex items-center justify-center" style="
       position: fixed;
    z-index: 9999; /* Задайте более высокий z-index для модального окна */
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    ">
        <div class="modal-content" style=" background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            max-width: 400px;">
            <span class="modal-close" style=" cursor: pointer;
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 18px;
            font-weight: bold;" @click="closeModal()">&times;</span>
            <h2>Опрос</h2>

            <p>Выберите один из вариантов:</p>

            <form action="{{url('/'.app()->getLocale().'/save-survey')}}" method="post">
                @csrf
                <div>

                    <label>
                        <input type="checkbox" value="option1" name="product_rating[]">
                        Вариант 1
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox" value="option2" name="product_rating[]">
                        Вариант 2
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox" value="option3" name="product_rating[]">
                        Вариант 3
                    </label>
                </div>
                <div>
                    <label>
                        <input type="number" value="option4" name="contact">
                     тел
                    </label>
                </div>
                <div>
                    <label>
                        <textarea type="text" placeholder="поле под текст" name="comment"></textarea>
                    </label>
                </div>
                <button type="submit" @click="submitSurvey()"
                        class="bg-blue-500 text-white uppercase font-semibold text-xl lg:text-sm py-2.5 px-8 rounded-2xl hover:bg-blue-600">
                    {{  __("Оцінити")}}
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    function checkModalStatus() {
        const modalShown = localStorage.getItem('modalSurvey');
        if (!modalShown) {
            setTimeout(() => {
                document.querySelector('[x-data]').style.display = 'block';
                openModal();
                localStorage.setItem('modalSurvey', true);
            }, 3000);
        } else {
            document.querySelector('[x-data]').style.display = 'block';
        }
    }

    function openModal() {
        document.querySelector('[x-data]').__x.$data.open = true;
    }

    function closeModal() {
        document.querySelector('[x-data]').__x.$data.open = false;
    }
    function submitSurvey() {
        closeModal();
    }
</script>
