   <?php 
        use Carbon\Carbon;
        $now = Carbon::now();
        // echo "Now: " . $now . "<br>";

        $startMonthDate = $now->copy()->firstOfMonth();
        // echo "Start of Month: " . $startMonthDate . "<br>";

        $lastMonthDate = $now->copy()->lastOfMonth();
        // echo "End of Month: " . $lastMonthDate . "<br>";

        $currentDate = $startMonthDate->copy();
        // echo "currentDate " . $currentDate . "<br>";

        $cars = [
            (object)[
                'id' => 1,
                'name' => 'Toyota',
                'color' => 'Red',
                'plate' => 'ABC-123'
            ],
            (object)[
                'id' => 2,
                'name' => 'Honda',
                'color' => 'Blue',
                'plate' => 'XYZ-789'
            ]
        ];
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .calendar-scroll::-webkit-scrollbar {
            width: 5px;
        }

        .calendar-scroll::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px #ffffff;
            border-radius: 10px;
        }

        .calendar-scroll::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 10px;
            cursor: pointer;
        }

        .calendar-scroll::-webkit-scrollbar-thumb:hover {
            background: #ccc;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>

<body>
    <div class="w-full">
        <div class="w-full py-5 px-5 my-0 mx-auto max-w-[1200px]">
            <div
                class="site-header w-full flex items-center justify-between py-4 px-6 bg-gray-100 border-b border-gray-300">
                <h3 class="text-2xl font-semibold text-gray-800">Calendar</h3>
                <div class="space-x-2">
                    <button class="text-sm px-3 py-1 bg-blue-500 text-white rounded">Previous</button>
                    <button class="text-sm px-3 py-1 bg-blue-500 text-white rounded">Next</button>
                </div>
            </div>
             <div class="w-full py-5 my-0 mx-auto overflow-scroll calendar-scroll">
           <?php foreach ($cars as $car): ?>
          <?php $currentDate = $startMonthDate->copy(); ?>
         <div class="py-2 px-5 border-b border-gray-300">
            <h4 class="font-semibold text-lg text-gray-700 mb-2">
                <?= $car->name ?> (<?= $car->plate ?>)
            </h4>
            <ul class="flex gap-2 items-center">
                <?php while ($currentDate <= $lastMonthDate): ?>
                    <li>
                        <button 
                            class="date_btn flex items-center justify-center w-8 h-8 bg-gray-300 text-white rounded-full text-center"
                            data-date="<?= $currentDate->toDateString(); ?>" 
                            data-car-id="<?= $car->id ?>">
                            <?= $currentDate->day ?>
                        </button>
                    </li>
                    <?php $currentDate->addDay(); ?>
                <?php endwhile; ?>
            </ul>
        </div>
        <?php endforeach; ?>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
    $(".date_btn").flatpickr({
        mode: "range",
        dateFormat: "Y-m-d",
        disable: [],
        onChange: function(selectedDates, dateStr, instance) {
         if (selectedDates.length === 2) {
            const start = selectedDates[0];
            const end = selectedDates[1];
            getDates(start, end);
        } else {
            console.log('Waiting for full range selection...');
        }
        }
    });

    function getDates(start,end){
        const formatDate = (date) => {
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    };

    console.log('Start:', formatDate(start));
    console.log('End:', formatDate(end));
    }

    </script>
</body>

</html>