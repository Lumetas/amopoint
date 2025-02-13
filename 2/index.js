(function() {
    // Функция для скрытия/показа полей
    function toggleFields(selectedValue) {
        // Получаем все элементы p на странице
        const paragraphs = document.querySelectorAll('p');

        paragraphs.forEach(p => {
            // Исключаем параграф, содержащий select
            if (p.querySelector('select')) {
                return; // Пропускаем этот параграф
            }

            // Проверяем, содержит ли параграф input с нужным атрибутом name
            const input = p.querySelector('input');
            if (input && input.name.includes(selectedValue)) {
                p.style.display = 'block'; // Показываем параграф
            } else {
                p.style.display = 'none'; // Скрываем параграф
            }
        });
    }

    // Получаем элемент select с типом
    const typeSelect = document.querySelector('select[name="type_val"]');

    // Добавляем обработчик события на изменение значения
    typeSelect.addEventListener('change', function() {
        const selectedValue = this.value;
        toggleFields(selectedValue);
    });

	//Скрываем все поля при выполнении кода например при загрузке страницы
    toggleFields(typeSelect.value);
})();
