const taskSelect = document.getElementById('task');
const display = document.getElementById('timer');
const startButton = document.getElementById('start');
const pauseButton = document.getElementById('pause');
const resetButton = document.getElementById('reset');

if (display && startButton && pauseButton && resetButton && taskSelect) {

    const SESSION_MINUTES = 25;

    let time = SESSION_MINUTES * 60;

    let timer = null;

    let startedAt = null;


    function updateTimer()
    {
        let minutes = Math.floor(time / 60);

        let seconds = time % 60;

        display.textContent =
            `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
    }


    startButton.addEventListener('click', function () {

        if (timer !== null)
            return;

        if (!startedAt) {
            startedAt = new Date();
        }

        timer = setInterval(function () {

            if (time <= 0)
            {
                clearInterval(timer);

                timer = null;

                axios.post('/focus/sessions', {

                    task_id: taskSelect.value,

                    duration: SESSION_MINUTES,

                    started_at: startedAt.toISOString(),

                    completed_at: new Date().toISOString()

                })
                .then(function () {

                    alert('🎉 Focus session completed!');

                    time = SESSION_MINUTES * 60;

                    startedAt = null;

                    updateTimer();

                })
                .catch(function (error) {

                    console.error(error);

                    alert('Failed to save focus session.');

                });

                return;
            }

            time--;

            updateTimer();

        }, 1000);

    });


    pauseButton.addEventListener('click', function () {

        clearInterval(timer);

        timer = null;

    });


    resetButton.addEventListener('click', function () {

        clearInterval(timer);

        timer = null;

        time = SESSION_MINUTES * 60;

        startedAt = null;

        updateTimer();

    });

}