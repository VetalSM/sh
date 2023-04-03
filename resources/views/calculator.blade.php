
<!DOCTYPE html>
<html>
<head>
{{--    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--}}

    <title>Laravel</title>
    <!-- Подключение Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function openCalculator() {
            var calculatorModal = new bootstrap.Modal(document.getElementById('calculatorModal'))
            calculatorModal.show()
        }
    </script>
    <a href="#" onclick="openCalculator()">Открыть калькулятор</a>

</head>

<!-- Модальное окно калькулятора -->

<!-- Модальное окно калькулятора -->
<div class="modal fade" id="calculatorModal" tabindex="-1" aria-labelledby="calculatorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="calculatorModalLabel">Калькулятор соотношения воска и ароматизатора</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="calculatorForm">
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label for="wax" class="form-label">Воск (г):</label>
                        <input type="number" step="0.01" name="wax" id="wax" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="fragrance_percentage" class="form-label">Процент ароматизатора:</label>
                        <input type="number" step="0.01" name="fragrance_percentage" id="fragrance_percentage" class="form-control" required>
                    </div>
{{--                    <div class="mb-3">--}}
{{--                        <label for="fragrance" class="form-label">Ароматизатор (г):</label>--}}
{{--                        <input type="number" step="0.01" name="fragrance" id="fragrance" class="form-control" required>--}}
{{--                    </div>--}}
{{--                    <div class="mb-3">--}}
{{--                        <label for="total_mixture" class="form-label">Общее количество смеси (г):</label>--}}
{{--                        <input type="number" step="0.01" name="total_mixture" id="total_mixture" class="form-control" required>--}}
{{--                    </div>--}}
                    <button type="submit" class="btn btn-primary">Рассчитать</button>
                    <p>Result: <span id="result"></span></p>

                </div>
                <div class="modal-footer">
{{--                    <button type="submit" class="btn btn-primary">Рассчитать</button>--}}
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Обработчик события submit для формы
    document.getElementById('calculatorForm').addEventListener('submit', function (event) {
        // Отменяем перенаправление на другую страницу
        event.preventDefault();

        // Получаем значения из полей ввода
        var wax = parseFloat(document.getElementById('wax').value);
        // var fragrance = parseFloat(document.getElementById('fragrance').value);
        var percentage = parseFloat(document.getElementById('fragrance_percentage').value);

        // Выполняем расчет
        var result = (wax * percentage) / 100;

        // Отображаем результаты в модальном окне
        document.getElementById('result').innerHTML =
            "<br/>"+"Wax: " + wax + "g"+" " +
            "<br/>"+" Percentage: "  + percentage + "%" +
            "<br/>"+" fragrance: " + result + "g";


        // Закрываем модальное окно после выполнения расчета

    });
</script>

</body>
</html>
