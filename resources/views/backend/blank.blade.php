<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Month-Year Picker Dropdown</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <style>
        .dropdown-menu {
            width: 300px;
        }
        .year-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #f0ad4e;
            padding: 10px;
            color: white;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .months-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            padding: 10px;
        }
        .month-item {
            padding: 10px;
            text-align: center;
            background-color: #f7f7f7;
            border: 1px solid #ddd;
            border-radius: 5px;
            cursor: pointer;
        }
        .month-item:hover, .month-item.active {
            background-color: #ffd700;
            color: black;
            font-weight: bold;
        }
        .year-nav span {
            cursor: pointer;
        }
        .year-input {
            border: none;
            background: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        .year-input:focus {
            outline: none;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="monthYearSelectStart">Select Start Month and Year <span style="color: red;">*</span></label>
                    <div class="dropdown">
                        <input class="dropdown-toggle form-control" type="text" name="startmonthYear" id="monthYearDropdownStart" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" readonly placeholder="Month and Year" />
                        <div class="dropdown-menu" aria-labelledby="monthYearDropdownStart">
                            <div class="year-nav" id="yearNavStart">
                                <span id="currentYearStart" class="year-input">Year 2024</span>
                            </div>
                            <div class="months-grid" id="monthsGridStart">
                                <div class="month-item" data-month="01">Jan</div>
                                <div class="month-item" data-month="02">Feb</div>
                                <div class="month-item" data-month="03">Mar</div>
                                <div class="month-item" data-month="04">Apr</div>
                                <div class="month-item" data-month="05">May</div>
                                <div class="month-item" data-month="06">June</div>
                                <div class="month-item" data-month="07">July</div>
                                <div class="month-item" data-month="08">Aug</div>
                                <div class="month-item" data-month="09">Sep</div>
                                <div class="month-item" data-month="10">Oct</div>
                                <div class="month-item" data-month="11">Nov</div>
                                <div class="month-item" data-month="12">Dec</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="monthYearSelectEnd">Select End Month and Year <span style="color: red;">*</span></label>
                    <div class="dropdown">
                        <input class="dropdown-toggle form-control" type="text" name="endmonthYear" id="monthYearDropdownEnd" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" readonly placeholder="Month and Year" />
                        <div class="dropdown-menu" aria-labelledby="monthYearDropdownEnd">
                            <div class="year-nav" id="yearNavEnd">
                                <span id="currentYearEnd" class="year-input">Year 2024</span>
                            </div>
                            <div class="months-grid" id="monthsGridEnd">
                                <div class="month-item" data-month="01">Jan</div>
                                <div class="month-item" data-month="02">Feb</div>
                                <div class="month-item" data-month="03">Mar</div>
                                <div class="month-item" data-month="04">Apr</div>
                                <div class="month-item" data-month="05">May</div>
                                <div class="month-item" data-month="06">June</div>
                                <div class="month-item" data-month="07">July</div>
                                <div class="month-item" data-month="08">Aug</div>
                                <div class="month-item" data-month="09">Sep</div>
                                <div class="month-item" data-month="10">Oct</div>
                                <div class="month-item" data-month="11">Nov</div>
                                <div class="month-item" data-month="12">Dec</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function initMonthYearPicker(startOrEnd) {
                const currentYearElement = document.getElementById(`currentYear${startOrEnd}`);
                const monthItems = document.querySelectorAll(`#monthsGrid${startOrEnd} .month-item`);
                const dropdownToggle = document.getElementById(`monthYearDropdown${startOrEnd}`);
                let currentYear = new Date().getFullYear();

                function updateYearDisplay() {
                    currentYearElement.textContent = `Year ${currentYear}`;
                }

                function handleClick(event) {
                    event.stopPropagation(); // Prevents the dropdown from closing
                    currentYearElement.contentEditable = true;
                    currentYearElement.focus();
                }

                document.getElementById(`yearNav${startOrEnd}`).addEventListener('click', function(event) {
                    handleClick(event);
                });

                currentYearElement.addEventListener('keydown', function(event) {
                    if (event.key === 'Enter') {
                        event.preventDefault();
                        const newYear = parseInt(currentYearElement.textContent);
                        if (!isNaN(newYear) && newYear >= 1900 && newYear <= 2100) {
                            currentYear = newYear;
                            currentYearElement.textContent = `Year ${newYear}`;
                            currentYearElement.contentEditable = false;
                            updateYearDisplay();
                        } else {
                            alert('Please enter a valid year between 1900 and 2100.');
                            currentYearElement.textContent = `Year ${currentYear}`;
                            currentYearElement.contentEditable = false;
                        }
                    }
                });

                monthItems.forEach(item => {
                    item.addEventListener('click', function() {
                        document.querySelector(`#monthsGrid${startOrEnd} .month-item.active`)?.classList.remove('active');
                        this.classList.add('active');
                        const selectedMonth = this.getAttribute('data-month');
                        const selectedYear = currentYear;
                        dropdownToggle.value = `${this.textContent} - ${selectedYear}`;
                    });
                });

                updateYearDisplay();
            }

            initMonthYearPicker('Start');
            initMonthYearPicker('End');
        });
    </script>
</body>
</html>
