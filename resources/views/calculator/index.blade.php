<x-layout>
    @if(App::currentLocale() ==='ua')
        @section('title')Калькулятори для свічковаріння, калькулятори для кендлмейкерів, калькулятори для розрахунку воску та віддушки.@endsection
        @section('description')Правильний розрахунок введення віддушки у віск, як розрахувати кількість аромаолії для свічки, розрахунок воску, розрахунок аромаолії, кількість віддушки для соєвого воску.Калькулятори для свічок, калькулятори для аромаолії, свічний калькулятор@endsection
    @else
        @section('title')Калькуляторы для свечения, калькуляторы для кендлмейкеров, калькуляторы для расчета воска и отдушки.@endsection
        @section('description')Правильный расчет ввода отдушки в воск, как рассчитать количество аромаоли для свечи, расчет воска, расчет аромаоли, количество отдушки для соевого воска.Калькуляторы для свечей, калькуляторы для ароматических масел, свечной калькулятор@endsection

    @endif

    <!-- start  fragranceWax-->
    <figure class="shadow-lg pin-r pin-y px-10 text-center">
        <h5 style="margin-bottom: 1rem; margin-top: 20px;">
            {{__(" Вам підійде цей калькулятор, якщо у вас є дані: ")}}
        </h5>
        <div class=" calcul_bord">
            <figcaption class=" blockquote-footer" style="margin-bottom: 1rem; color: #13b003">
                {{__("Вага чистого воску")}}
            </figcaption>
            <figcaption class="blockquote-footer" style="margin-bottom: 0rem; color: #13b003">
                {{__("Бажаний % віддушки")}}
            </figcaption>
        </div>
        <blockquote class="blockquote">
            <p><a href="#" onclick="fragranceWax()">{{__(("Відкрити калькулятор"))}}</a></p>
        </blockquote>
    </figure>
    <!-- end  fragranceWax-->
    <!-- start  allWax-->
    <figure class="shadow-lg pin-r pin-y px-10 text-center">
        <h5 style="margin-bottom: 1rem; margin-top: 20px;">
            {{__(" Вам підійде цей калькулятор, якщо у вас є дані: ")}}
        </h5>
        <div class=" calcul_bord">
            <figcaption class="blockquote-footer" style="margin-bottom: 1rem;color: #13b003">
                {{__("Вага суміші (віск + віддушка)")}}
            </figcaption>
            <figcaption class="blockquote-footer" style="margin-bottom: 0rem;color: #13b003">
                {{__("Бажаний % віддушки")}}
            </figcaption>
        </div>
        <blockquote class="blockquote">
            <p><a href="#" onclick="allWax()">{{__(("Відкрити калькулятор"))}}</a></p>
        </blockquote>
    </figure>
    <!-- end  allWax-->

    {{--    <figure class="shadow-lg pin-r pin-y px-10 text-center">--}}
    {{--        <h5  style="margin-bottom: 1rem; margin-top: 20px;">--}}
    {{--            {{__(" Вам підійде цей калькулятор, якщо у вас є дані: ")}}--}}
    {{--        </h5>--}}
    {{--        <figcaption class="blockquote-footer" style="margin-bottom: 1rem;">--}}
    {{--            {{__("Вага суміші (віск + віддушка)")}}--}}
    {{--        </figcaption>--}}
    {{--        <figcaption class="blockquote-footer" style="margin-bottom: 0rem;">--}}
    {{--            {{__("Бажаний % віддушки")}}--}}
    {{--        </figcaption>--}}

    {{--        <blockquote class="blockquote" >--}}
    {{--            <p><a href="#" onclick="allWax()">{{__(("Відкрити калькулятор"))}}</a></p>--}}
    {{--        </blockquote>--}}
    {{--    </figure>--}}
    {{--    <figure class="shadow-lg pin-r text-center">--}}
    {{--        <blockquote class="blockquote">--}}
    {{--            <p>A well-known quote, contained in a blockquote element.</p>--}}
    {{--        </blockquote>--}}
    {{--        <figcaption class="blockquote-footer">--}}
    {{--            Someone famous in <cite title="Source Title">Source Title</cite>--}}
    {{--        </figcaption>--}}
    {{--    </figure>--}}
    {{--    <figure class="text-center">--}}
    {{--        <blockquote class="blockquote">--}}
    {{--            <p>A well-known quote, contained in a blockquote element.</p>--}}
    {{--        </blockquote>--}}
    {{--        <figcaption class="blockquote-footer">--}}
    {{--            Someone famous in <cite title="Source Title">Source Title</cite>--}}
    {{--        </figcaption>--}}
    {{--    </figure>--}}
    {{--    <figure class="text-center">--}}
    {{--        <blockquote class="blockquote">--}}
    {{--            <p>A well-known quote, contained in a blockquote element.</p>--}}
    {{--        </blockquote>--}}
    {{--        <figcaption class="blockquote-footer">--}}
    {{--            Someone famous in <cite title="Source Title">Source Title</cite>--}}
    {{--        </figcaption>--}}
    {{--    </figure>--}}








    <!-- start  fragranceWax-->
    <script>
        function fragranceWax() {
            var calculatorModal = new bootstrap.Modal(document.getElementById('fragranceWax'))
            calculatorModal.show()
        }
    </script>
    <div class="modal fade" id="fragranceWax" tabindex="-1" aria-labelledby="calculatorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"
                        id="calculatorModalLabel">{{__("Визначення ваги віддушки у відношенні до ваги воску")}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="fragranceWax">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="wax" class="form-label">{{__(("Віск"))}} (г):</label>
                            <input type="number" step="0.01" name="wax" id="fragranceWax_wax" class="form-control"
                                   required>
                        </div>
                        <div class="mb-3">
                            <label for="fragrance_percentage"
                                   class="form-label">{{__("Відсоток ароматизатору (від 3 до 10%):")}}</label>
                            <input type="number" step="0.01" min="3" max="10" name="fragrance_percentage"
                                   id="fragranceWax_fragrance_percentage" class="form-control" required>
                        </div>
                        {{--                    <div class="mb-3">--}}
                        {{--                        <label for="fragrance" class="form-label">Ароматизатор (г):</label>--}}
                        {{--                        <input type="number" step="0.01" name="fragrance" id="fragrance" class="form-control" required>--}}
                        {{--                    </div>--}}
                        {{--                    <div class="mb-3">--}}
                        {{--                        <label for="total_mixture" class="form-label">Общее количество смеси (г):</label>--}}
                        {{--                        <input type="number" step="0.01" name="total_mixture" id="total_mixture" class="form-control" required>--}}
                        {{--                    </div>--}}
                        <button type="submit" class="float-end btn btn-primary">{{__("Розрахувати")}}</button>
                        <p class="font-semibold">{{__("Результат")}}: </p><span id="result"></span>

                    </div>
                    <div class="modal-footer">
                        {{--                    <button type="submit" class="btn btn-primary">Рассчитать</button>--}}
                        <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">{{__("Закрити")}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        // Обработчик события submit для формы
        document.getElementById('fragranceWax').addEventListener('submit', function (event) {
            // Отменяем перенаправление на другую страницу
            event.preventDefault();

            // Получаем значения из полей ввода
            var wax = parseFloat(document.getElementById('fragranceWax_wax').value);
            // var fragrance = parseFloat(document.getElementById('fragrance').value);
            var percentage = parseFloat(document.getElementById('fragranceWax_fragrance_percentage').value);
            // Выполняем расчет
            var fragrance = (wax * percentage) / 100;
            var total = fragrance + wax;

            // Отображаем результаты в модальном окне
            document.getElementById('result').innerHTML =
                "{{__("Віск")}}: " + wax + " г" + " " +
                "<br/>" + " {{__("Відсоток")}}: " + percentage + "%" +
                "<br/>" + " {{__("Віддушка")}}: " + fragrance.toFixed(2) + " г" +
                "<br/>" + " {{__("Вага суміші (віск + віддушка)")}}: " + total + " г";


            // Закрываем модальное окно после выполнения расчета

        });
    </script>
    <!-- end  fragranceWax-->

    <!-- start  allWax-->
    <script>
        function allWax() {
            var calculatorModal = new bootstrap.Modal(document.getElementById('allWax'))
            calculatorModal.show()
        }
    </script>
    <div class="modal fade" id="allWax" tabindex="-1" aria-labelledby="calculatorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"
                        id="calculatorModalLabel">{{__("Визначення ваги віддушки у відношенні до ваги воску")}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="allWax">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="total_mixture" class="form-label">{{__("Загальна кількість суміші")}}
                                (г):</label>
                            <input type="number" step="0.01" name="total_mixture" id="allWax_total_mixture"
                                   class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="fragrance_percentage"
                                   class="form-label">{{__("Відсоток ароматизатору (від 3 до 10%):")}}</label>
                            <input type="number" step="0.01" min="3" max="10" name="fragrance_percentage"
                                   id="allWax_fragrance_percentage" class="form-control" required>
                        </div>
                        {{--                    <div class="mb-3">--}}
                        {{--                        <label for="fragrance" class="form-label">Ароматизатор (г):</label>--}}
                        {{--                        <input type="number" step="0.01" name="fragrance" id="fragrance" class="form-control" required>--}}
                        {{--                    </div>--}}

                        <button type="submit" class="float-end btn btn-primary">{{__("Розрахувати")}}</button>
                        <p class="font-semibold">{{__("Результат")}}: </p><span id="result1"></span>

                    </div>
                    <div class="modal-footer">
                        {{--                    <button type="submit" class="btn btn-primary">Рассчитать</button>--}}
                        <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">{{__("Закрити")}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        // Обработчик события submit для формы
        document.getElementById('allWax').addEventListener('submit', function (event) {
            // Отменяем перенаправление на другую страницу
            event.preventDefault();

            // Получаем значения из полей ввода
            var total_mixture = parseFloat(document.getElementById('allWax_total_mixture').value);
            // var fragrance = parseFloat(document.getElementById('fragrance').value);
            var percentage = parseFloat(document.getElementById('allWax_fragrance_percentage').value);
            // Выполняем расчет
            var fragrance = (total_mixture / (100 + percentage)) * percentage;
            var wax = (total_mixture / (100 + percentage)) * 100;


            // Отображаем результаты в модальном окне
            document.getElementById('result1').innerHTML =
                "{{__("Віск")}}: " + wax.toFixed(2) + " г" + " " +
                "<br/>" + " {{__("Відсоток")}}: " + percentage + "%" +
                "<br/>" + " {{__("Віддушка")}}: " + fragrance.toFixed(2) + " г" +
                "<br/>" + " {{__("Вага суміші (віск + віддушка)")}}: " + total_mixture + " г";


            // Закрываем модальное окно после выполнения расчета

        });
    </script>
    <!-- end  allWax-->


</x-layout>
