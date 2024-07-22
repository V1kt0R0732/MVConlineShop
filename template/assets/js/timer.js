// Функция для парсинга даты в формате "YYYY-MM-DD HH:MM:SS"
var parseDate = function(dateString) {
    var parts = dateString.split(/[- :]/);
    return new Date(parts[0], parts[1] - 1, parts[2], parts[3], parts[4], parts[5]);
};

// Устанавливаем время создания купона
var creationDate = parseDate(creationTime);


// Рассчитываем конечное время (время создания + время жизни)
var endTime = new Date(creationDate.getTime() + lifetime * 24 * 60 * 60 * 1000);

var updateTimer = function() {
    var now = new Date().getTime();
    var timeLeft = endTime - now;

    if (timeLeft < 0) {
        clearInterval(timerInterval);
        document.getElementById("time").innerText = "EXPIRED";
        return;
    }

    var hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

    document.getElementById("time").innerText =
        hours.toString().padStart(2, '0') + ":" +
        minutes.toString().padStart(2, '0') + ":" +
        seconds.toString().padStart(2, '0');
};

// Запускаем таймер сразу для обновления отображения времени
updateTimer();

var timerInterval = setInterval(updateTimer, 1000);